@extends("AttendanceViews\MasterSoap")
@section("pagetitle","Aanwezigheids service")
@section("pageContents")

<h1 class="pagetitle">Zoek Activiteit </h1>

    <form action = "{{url('/get-activity')}}" method="post">
    @csrf
        <label for="getactivityName">Activiteit naam:</label>
        <input type="text" id="getactivityName" name="eventName" required>
        <button type="submit" class="btn">
                <span class="btn-text">Zoek</span>
        </button>
    </form>
@endsection