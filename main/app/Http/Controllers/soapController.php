<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RicorocksDigitalAgency\Soap\Facades\Soap;

class soapController extends Controller
{
    
    public function getAttendance(string $name){
        $endpoint = "http://localhost:5249/attendance.asmx";
        //$response2=Soap::to($endpoint)->AddSamples(6);
        $response3=Soap::to($endpoint)->GetMembers();
        $response=Soap::to($endpoint)->getAttendancePercentage($name);
        return view('soap_call', ['response' => $response3->response, 'Name' =>$name]);
    }


    public function doeSOAP(){
        $endpoint = "http://localhost:5249/attendance.asmx";
        
        $response=Soap::to($endpoint)->getAttendancePercentage('test');
        return view('soap_call', ['response' => $response->response]);
        //print_r($response->response);
        /*print("<hr/><br/>");*/

        /*$response3=Soap::to($endpoint)->AddMember('test');
        print_r($response3->response);
        print("<hr/><br/>");

        $response4=Soap::to($endpoint)->GetActivitiesWithPrice(15.3);
        print_r($response4->response);
        print("<hr/><br/>");*/
    }
}
