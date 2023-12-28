from Weather_pb2 import *
import Weather_pb2_grpc
import grpc

def run():
    print("run")
    with grpc.insecure_channel('localhost:1234') as channel:
        stub = Weather_pb2_grpc.WeatherServiceStub(channel)

     
        
        response = stub.getWeather('27-12-2023','Lummen')
        #response = stub.SayHello(helloworld_pb2.HelloRequest(name='you'))
        print("weer:" + str(response.score))

if __file__ == "__main__":
    run()