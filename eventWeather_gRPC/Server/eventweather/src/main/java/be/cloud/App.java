package be.cloud;

import java.io.IOException;

import io.grpc.Server;
import io.grpc.ServerBuilder;

public class App 
{
    public static void main( String[] args )
    {
        System.out.println( "Hello World!" );
        Server server = ServerBuilder.forPort(1234).addService(new WeatherServiceImpl()).build();

        try {
            server.start();
            server.awaitTermination();
        } catch (IOException | InterruptedException e) {
            // TODO Auto-generated catch block
            System.out.println("Errorrrrr");
            e.printStackTrace();
        }
        
    }
}
