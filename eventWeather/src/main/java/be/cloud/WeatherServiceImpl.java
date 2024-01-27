package be.cloud;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import org.json.JSONObject;
import be.cloud.WeatherServiceGrpc.WeatherServiceImplBase;

public class WeatherServiceImpl extends WeatherServiceImplBase {
    
    public void getWeather(be.cloud.WeatherRequest request,
    io.grpc.stub.StreamObserver<be.cloud.WeatherResponse> responseObserver) {
        try{
            //-----Haal nodige data uit request-----
            String location = request.getLocation();


            //-----Haal JSON data op van https://openweathermap.org/current-----
            String apiKey = "fdd9df64903b5aae87a1c0e2e8ef0add";
            String apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" + location + ",BE&appid=" + apiKey + "&units=metric&lang=nl";
            URL url = new URL(apiUrl);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            
            connection.setRequestMethod("GET");
            connection.setRequestProperty("Accept", "application/json");

            if (connection.getResponseCode() != 200) {
                throw new RuntimeException("Failed : HTTP error code : " + connection.getResponseCode());
            }

            BufferedReader br = new BufferedReader(new InputStreamReader((connection.getInputStream())));
            String output;
            String data = "";

            while ((output = br.readLine()) != null) {
                System.out.println(output);
                data += output;
            }
            connection.disconnect();

            //-----Zet JSON om naar nuttige data-----//
            JSONObject jsonData = new JSONObject(data);
            // get temp
            double temp = jsonData.getJSONObject("main").getDouble("temp");
             // get wind speed
            double windSpeed = jsonData.getJSONObject("wind").getDouble("speed");
            // get weather main
            String neerslag = jsonData.getJSONArray("weather").getJSONObject(0).getString("main");


            //-----construeer de return-waarde-----
            WeatherResponse response = WeatherResponse.newBuilder()
                                        .setTemp(temp + "°C")
                                        .setNeerslag(neerslag)
                                        .setWindspeed(windSpeed)
                                        .build();

        //-----zet op de stream-----
        responseObserver.onNext(response);
        responseObserver.onCompleted();

        }catch (Exception e) {
            e.printStackTrace();
        }
    }
}
