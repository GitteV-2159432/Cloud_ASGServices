@extends("WeatherViews\MasterGrpc")
@section("pagetitle1","Event weather service")
@section("pageContents")
    <div class="container">
            <div class="error-card">
                <div class="no-data">De gevraagde datum is te lang geleden, de weergegevens van deze datum zijn niet meer beschikbaar</div>
            </div>
    </div>
@endsection