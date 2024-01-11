<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bluerhinos\PHPMQTT;

class UpdatesController extends Controller
{
     
    public function subscribe()
    {
        return view('UpdatesViews/Update');
    }

    public function updateForm(){
        return view('UpdatesViews/sendUpdate');
    }


    public function sendUpdate(Request $request){
        $title = $request->input('title');
        $message = $request->input('text');
        $url = "http://localhost:5000/send_update";
        $data = array(
            'title' => $title,
            'message' => $message
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array('Content-Type: application/json')
        ));  
        $response = curl_exec($curl);
        if(!$response){
            die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        }
        curl_close($curl);
        return view('UpdatesViews/sendUpdate');
    }
}