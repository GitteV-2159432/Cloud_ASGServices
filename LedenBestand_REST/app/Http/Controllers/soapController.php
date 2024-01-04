<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RicorocksDigitalAgency\Soap\Facades\Soap;

class soapController extends Controller
{
   
    public function showMember(Request $request){
        $name = $request->input('userName');

        //$attendencePercentage = $this->calculateAttendencePercentage($name);
        //$attendedActivities = $this->getAmountAttended($name);
        $activities = $this->getActivitiesofMember($name);

        //Bron: https://stackoverflow.com/questions/18576762/php-stdclass-to-array
        $activitiesArray = json_decode(json_encode($activities), true);

        if(isset($activitiesArray['Activity'])){
            return view('soapMember', [
                'name'=>$name,
                'activities'=>$activitiesArray['Activity'],
                'percentage'=>$attendencePercentage,
                'attendedActivities'=>$attendedActivities,
            ]);
        }else{
            //TODO: ADD VIEW NO USER FOUND
        }
    }  

    
    public function showActivity(Request $request){
        $name = $request->input('activityName');

        $date = $this->getDate($name);
        $price = $this->getPrice($name);
        $attendees = $this->getAttendees($name);

        $attendeesArray = json_decode(json_encode($attendees), true);

        if(isset($attendeesArray['string'])){
            return view('Activity',[
                'name'=>$name,
                'date'=>$date,
                'price'=>$price,
                'attendees'=>$attendeesArray['string'],
            ]);
        }else{
            //TODO: ADD VIEW ACTIVITY NOT FOUND
        }
    }

    public function showAllMembers(){
        $members = $this->getMembers();
        $activities = $this->getActivities();

        $membersArray = json_decode(json_encode($members), true);
        $activitiesArray = json_decode(json_encode($activities), true);

        if(isset($membersArray['string'])){
            return view('Attendence', [
                'members'=>$membersArray['string'],
                'activities'=>$activitiesArray['Activity']
            ]);
        }else{
            //TODO: ADD VIEW NO ACTIVITIES OR MEMBERS FOUND

        }
    }



    //-------------HULPFUNCTIES-------------

   
    private function getActivitiesofMember($name){
        $soapClient = Soap::to('http://localhost:5249/attendance.asmx');
        return $soapClient->GetActivitiesofMember(['name' =>$name])->response->GetActivitesOfMemberResponse;
    }

    private function getAttendees($name){
        $soapClient = Soap::to("http://localhost:5249/attendance.asmx");
        return $soapClient->GetAttendees(['name' =>$name])->response->GetAttendeesResponse;
    }

    private function getMembers(){
        $soapClient = Soap::to("http://localhost:5249/attendance.asmx");
        return $soapClient->GetMembers()->response->GetMembersResponse;   
    }

    private function getActivities(){
        $soapClient = Soap::to("http://localhost:5249/attendance.asmx");
        return $soapClient->GetActivities()->response->GetActivitiesResponse;
    }
}
