@extends("WeatherViews\MasterGrpc")
@section("pagetitle1","Event weather service")
@section("pageContents")
<div class="content">
    <form action="{{ url('/weather') }}" method="post">
    @csrf
        <label for="getdate">Date:</label>
        <input type="date" id="getdate" name="date" required>
        <label for="getlocation">Location:</label>
        <input type="text" id="getlocation" name="location" required>
        <button type="submit" class="btn">
                <span class="btn-text">Get weather</span>
        </button>
    </form>
</div>
@endsection