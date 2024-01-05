@extends("WeatherViews\MasterGrpc")
@section("pagetitle1","Event weather service")
@section("pageContents")

    <form action="{{ url('/weather') }}" method="post">
    @csrf
        <label for="getdate">Date:</label>
        <input type="date" id="getdate" name="date" required>
        <label for="getlocation">Location:</label>
        <input type="text" id="getlocation" name="location" required>
        <button type="submit">Get weather</button>
    </form>
@endsection