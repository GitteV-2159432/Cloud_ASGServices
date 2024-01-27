@extends("WeatherViews\MasterGrpc")
@section("pagetitle","Evenement weerbericht service")
@section("pageContents")
<div class="content">
    <form action="{{ url('/weather') }}" method="post">
    @csrf
        <label for="getdate">Datum:</label>
        <input type="date" id="getdate" name="date" required>
        <label for="getlocation">Locatie:</label>
        <input type="text" id="getlocation" name="location" required>
        <button type="submit" class="btn">
                <span class="btn-text">Zoek</span>
        </button>
    </form>
</div>
@endsection