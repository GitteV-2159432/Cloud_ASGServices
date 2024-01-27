@extends("WeatherViews\MasterGrpc")
@section("pagetitle","Evenement weerbericht service")
@section("pageContents")
    <div class="container">
        @if($weatherData)
            <div class="weather-card">
                    <div class="location">{{$weatherData['location'] }}</div>
                    <div class="date">Datum: {{$formattedDate}}</div>
                    <div class="details">
                        <div class="detail">Neerslag: {{ $weatherData['neerslag'] }}</div>
                        <div class="detail">Temperatuur: {{ $weatherData['temp'] }}</div>
                        <div class="wind-speed">Wind snelheid: {{ $weatherData['wind_speed'] }} km/h</div>
                    </div>
            </div>
        @else
            <div class="error-card">
                <div class="no-data">Geen weergegevens beschikbaar</div>
            </div>
        @endif
    </div>
@endsection