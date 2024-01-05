package be.cloud;

import java.io.IOException;

import io.grpc.Server;
import io.grpc.ServerBuilder;


public class App 
{
    public static void main( String[] args )
    {
        Server server = ServerBuilder
            .forPort(8080)
            .addService(new WeatherServiceImpl()).build();

        try {
            server.start();
            server.awaitTermination();
        } catch (IOException | InterruptedException e) {
            System.out.println("Exception waar ik me niks van aantrek.");
            e.printStackTrace();
        }
    }
}
