package be.cloud;

import be.cloud.WeatherServiceGrpc.WeatherServiceImplBase;

import java.io.IOException;

import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class WeatherServiceImpl extends WeatherServiceImplBase {

    public void getWeather(be.cloud.WeatherRequest request, io.grpc.stub.StreamObserver<be.cloud.WeatherResponse> responseObserver) {

            //deconstrueer de parameter
        String date = request.getDate();
        String location = request.getLocation();
        String apiKey = "fdd9df64903b5aae87a1c0e2e8ef0add";
        String baseUrl = "http://api.openweathermap.org/data/2.5/weather?q=";



       /* OkHttpClient client = new OkHttpClient();

        Request request2 = new Request.Builder()
        .url(baseUrl + location + "&appid=" + apiKey)
        .build();

        try (Response response = client.newCall(request2).execute()) {
            if (!response.isSuccessful()) {
                throw new IOException("Unexpected code " + response);
            }

            String responseBody = response.body().string();
            // In a real-world application, you would parse the JSON responseBody and extract the required weather data.
            // For this example, we'll just use a placeholder string.
            String weather = "placeholder weather data";*/

            WeatherResponse weatherResponse = WeatherResponse.newBuilder()
                .setWeather("test")
                .build();

            responseObserver.onNext(weatherResponse);
        /*/} catch (IOException e) {
            e.printStackTrace();
        } finally {
        responseObserver.onCompleted();
        }*/
 }
        
    
        public void getAvgWeather(be.cloud.avgWeatherRequest request,
        io.grpc.stub.StreamObserver<be.cloud.avgWeatherResponse> responseObserver) {}
}
