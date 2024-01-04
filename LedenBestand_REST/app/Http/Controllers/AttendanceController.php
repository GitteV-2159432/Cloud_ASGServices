<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RicorocksDigitalAgency\Soap\Facades\Soap;

class AttendanceController extends Controller{
    public function index(){
        $soapClient = Soap::to('http://localhost:5128/Service.asmx');
        $members = $soapClient->GetMembers()->response->GetMembersResult;
        $membersArray = json_decode(json_encode($members), true);

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

    public function memberForm(){
        return view('AttendanceViews\getMemberForm');
    }

    public function activityForm(){
        return view('AttendanceViews\getActivityForm');
    }

    public function addActivityForm(){
        return view('AttendanceViews\addActivityForm');
    }

    public function showMember(Request $request){
        $name = $request->input("userName");
        /*print_r($name);
        print("<hr/><br/>");*/
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
    }

    public function showActivity(Request $request){
        $eventName = $request->input("eventName");
        /*print_r($eventName);
        print("<hr/><br/>");*/

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
    }

    public function NewActivity(Request $request){
        $eventName = $request->input('name');
        $date = $request->input('date');
        $price = $request->input('price');

        $attendeeName = $request->input('attendee');

        $formattedDate = date('d/m/Y', strtotime($date));

        $soapClient = Soap::to('http://localhost:5128/Service.asmx');
        $soapClient->AddActivity(["eventName"=>$eventName, "date"=>$date, "price"=>$price, "attendee"=>$attendeeName]);

        return view('AttendanceViews\activity', [
            'eventName'=>$eventName,
            'date'=>$formattedDate,
            'price'=> $price
        ]);
    }

    //-------------HULPFUNCTIES-------------

    private function calculateAttendancePercentage($name){
        $soapClient = Soap::to('http://localhost:5128/Service.asmx');
        $response = $soapClient->GetAttendancePercentage(["name"=>$name]);
        return $response->response->GetAttendancePercentageResult;
    }

    private function getAmountOfActivitiesAttended($name){
        $soapClient = Soap::to('http://localhost:5128/Service.asmx');
        $response = $soapClient->ActivitiesAttended(["name"=>$name]);
        return $response->response->ActivitiesAttendedResult;
    }

    private function getDate($eventName){
        $soapClient = Soap::to('http://localhost:5128/Service.asmx');
        $response = $soapClient->GetActivityDate(["activityName"=>$eventName]);
        return $response->response->GetActivityDateResult;
    }

    private function getPrice($eventName){
        $soapClient = Soap::to('http://localhost:5128/Service.asmx');
        $response = $soapClient->GetActivityPrice(["activityName"=>$eventName]);
        return $response->response->GetActivityPriceResult;
    }    
}