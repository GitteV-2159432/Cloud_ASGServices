from weather_pb2 import *
import weather_pb2_grpc
import grpc
from flask import Flask, request

app = Flask(__name__)

@app.route('/weather', methods=['GET'])
def weather():
    date = request.args.get('date')
    location = request.args.get('location')

    location = location.capitalize()


    if check_value_in_file(location):
        with grpc.insecure_channel('localhost:8080') as channel:
            stub = weather_pb2_grpc.WeatherServiceStub(channel)


            response = stub.getWeather(WeatherRequest(date=date,location=location))
            print("Temperature: " + str(response.Temp) + " Neerslag: " + str(response.neerslag) + " windsnelheid: " + str(response.windspeed))
            temp = response.Temp
            wind_speed = response.windspeed
            neerslag = response.neerslag
        print(f"'{location}' was found in the file.")
        return {"location": location, "temp": temp, "wind_speed": wind_speed, "neerslag": neerslag}
        
    else:
        print(f"'{location}' was not found in the file.")
        return{"location":"Locatie niet gevonden"}

        

def check_value_in_file(value):
    with open('locations.txt', 'r') as file:
        file_contents = file.read()
    
    return value in file_contents


if __name__ == "__main__":
    app.run(debug=True)
    