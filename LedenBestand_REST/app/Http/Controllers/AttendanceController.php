<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RicorocksDigitalAgency\Soap\Facades\Soap;

class AttendanceController extends Controller{

    public function index(){
        $membersArray = $this->getMembers();

        if (isset($membersArray['string'])) {
            if (is_array($membersArray['string'])) {
                return view('AttendanceViews\index', [
                    'members' => $membersArray['string'],
                ]);
            } else {
                return view('AttendanceViews\index', [
                    'members' => $membersArray,
                ]);
            }
        } else {
            return view('AttendanceViews\NoMembers');
        }
    }

    public function activityForm(){
        return view('AttendanceViews\getActivityForm');
    }

    public function addActivityForm(){
        return view('AttendanceViews\addActivityForm');
    }

    public function addMemberForm(){
        return view('AttendanceViews\addMemberForm');
    }

    public function showMember(Request $request){
        $name = $request->input("userName");
        //https://www.w3schools.com/php/func_string_ucfirst.asp
        $name = ucfirst($name); 
        /*print_r($name);
        print("<hr/><br/>");*/
        $members = $this->getMembers();
        
        
        if($this->memberExists($members, $name)){
            $attendancePercentage = $this->calculateAttendancePercentage($name);
            /*print_r($attendencePercentage);
            print("<hr/><br/>");*/
    
            $activitiesAttended = $this->getAmountOfActivitiesAttended($name);
            /*print_r($activitiesAttended);
            print("<hr/><br/>");*/
    
            return view('AttendanceViews\member', [
                'name'=>$name,
                'percentage'=>$attendancePercentage,
                'attendedActivities'=> $activitiesAttended,
            ]);
        }else{
            return view('AttendanceViews\memberNotFound');
        }
    }

    public function showActivity(Request $request){
        $eventName = $request->input("eventName");
        /*print_r($eventName);
        print("<hr/><br/>");*/
        $eventName = ucfirst($eventName);
        $activities = $this->getActivities();

        if(isset($activities['Activity'])){
                if($this->activityExists($activities, $eventName)){
                    $eventDate=$this->getDate($eventName);
                    $formattedDate = date('d/m/Y', strtotime($eventDate));
                    /*if($eventDate == "0001-01-01T00:00:00"){
                        print("geen datum"); 
                    }else{
                        $formattedDate = date('d/m/Y', strtotime($eventDate));
                        print($formattedDate);
                    }
                    print("<hr/><br/>");*/
            
                    $eventprice=$this->getPrice($eventName);
                /* if($eventprice=='0.0'){
                        print("gratis");
                    }else{
                        print_r($eventprice);
                    }
                    print("<hr/><br/>");*/
            
                    return view('AttendanceViews\activity', [
                        'eventName'=>$eventName,
                        'date'=>$formattedDate,
                        'price'=> $eventprice,
                    ]);
                }else{
                    return view('AttendanceViews\eventNotFound');
                }
        }else{
            return view('AttendanceViews\eventNotFound');
        }
    }

    public function NewActivity(Request $request){
        $eventName = $request->input('name');
        $eventName = ucfirst($eventName);
        $date = $request->input('date');
        $price = $request->input('price');

        $attendeeName = $request->input('attendee');

        $formattedDate = date('d/m/Y', strtotime($date));

        $soapClient = Soap::to('http://localhost:5000/Service.asmx');
        $soapClient->AddActivity(["eventName"=>$eventName, "date"=>$date, "price"=>$price, "attendee"=>$attendeeName]);

        return view('AttendanceViews\activity', [
            'eventName'=>$eventName,
            'date'=>$formattedDate,
            'price'=> $price
        ]);
    }
    
    public function newMember(Request $request){
        $name = $request->input('name');
        $name = ucfirst($name);

        $attendancePercentage = 0;
        $activitiesAttended = 0;
        
        $soapClient = Soap::to('http://localhost:5000/Service.asmx');
        $soapClient->AddPerson(["name"=>$name,]);

        return view('AttendanceViews\member', [
            'name'=>$name,
            'percentage'=>$attendancePercentage,
            'attendedActivities'=> $activitiesAttended,
        ]);

    }

    public function addPersonToActivity(){
        $personName = $request->input('name');
        $activityName = $request->input('eventName');

        $activities = $this->getActivities();

        if(isset($activities['Activity'])){
            if($this->activityExists($activities, $eventName)){
                $soapClient = Soap::to('http://localhost:5000/Service.asmx');
                $soapClient->AddActivityToPerson(["personName"=>$personName, "eventName"=>$activityName]);

                $eventDate=$this->getDate($eventName);
                $eventprice=$this->getPrice($eventName);

                return view('AttendanceViews\activity', [
                    'eventName'=>$eventName,
                    'date'=>$formattedDate,
                    'price'=> $price
                ]);
            }else{
                return view('AttendanceViews\eventNotFound');
            }
        }else{
            return view('AttendanceViews\eventNotFound');
        }
    }

    //-------------HULPFUNCTIES-------------

    private function calculateAttendancePercentage($name){
        $soapClient = Soap::to('http://localhost:5000/Service.asmx');
        $response = $soapClient->GetAttendancePercentage(["name"=>$name]);
        return $response->response->GetAttendancePercentageResult;
    }

    private function getAmountOfActivitiesAttended($name){
        $soapClient = Soap::to('http://localhost:5000/Service.asmx');
        $response = $soapClient->ActivitiesAttended(["name"=>$name]);
        return $response->response->ActivitiesAttendedResult;
    }

    private function getDate($eventName){
        $soapClient = Soap::to('http://localhost:5000/Service.asmx');
        $response = $soapClient->GetActivityDate(["activityName"=>$eventName]);
        return $response->response->GetActivityDateResult;
    }

    private function getPrice($eventName){
        $soapClient = Soap::to('http://localhost:5000/Service.asmx');
        $response = $soapClient->GetActivityPrice(["activityName"=>$eventName]);
        return $response->response->GetActivityPriceResult;
    }   
    
    private function getMembers(){
        $soapClient = Soap::to('http://localhost:5000/Service.asmx');
        $members = $soapClient->GetMembers()->response->GetMembersResult;
        $membersArray = json_decode(json_encode($members), true);
        return $membersArray;
    }

    private function getActivities(){
        $soapClient = Soap::to('http://localhost:5000/Service.asmx');
        $activities = $soapClient->GetActivities()->response->GetActivitiesResult;
        $activitiesArray = json_decode(json_encode($activities), true);
        return $activitiesArray;
    }

    private function activityExists($activities, $activityName){
        foreach ($activities as $activity) {
            foreach($activity as $event){
                if(is_array($event)){
                    if ($event['Name'] == $activityName) {
                        return TRUE;
                    }
                }
                else if ($activity['Name'] == $activityName) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    private function memberExists($members, $memberName){
        foreach ($members as $member => $index) {
            if (is_array($index)) {
                foreach ($index as $i => $name) {
                    if ($name == $memberName) {
                        return TRUE;
                    }
                }
            }else{
                //https://www.php.net/manual/en/function.array-search.php
                $key = array_search($memberName, $members);
                if($key != FALSE){
                    return TRUE;
                }
            }
        }
        return FALSE;
    }
}