<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class WeatherController extends Controller
{
    public function weatherform(){
        return view('WeatherViews\WeatherForm');
    }

    public function getWeather(Request $request){
        $date = $request->input("date");
        $location = $request->input("location");

        $formattedDate = date('d/m/Y', strtotime($date));
        if(date('Y', strtotime($date)) < 2024){
            return view('WeatherViews\DateError');
        }

        $weatherData = $this->getWeatherData($date, $location);
        if($weatherData['location']=="Locatie niet gevonden"){
            return view('WeatherViews\LocationError');
        }

        // Pass the weather data to the view
        return view('WeatherViews\Weather', compact('weatherData', 'formattedDate'));
    } 

    private function getWeatherData($date, $location){
        $url = "http://localhost:5002/weather?date=$date&location=$location";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));

        //Get JSON response from python gRPC client
        $response = curl_exec($curl);
        curl_close($curl);

        // Decode the JSON response
        $weatherData = json_decode($response, true);
        
        return $weatherData;
        
    }
}