@extends("AttendanceViews\MasterSoap")
@section("pagetitle1","Attendance service")
@section("pageContents")

    <h1>Activity</h1>

    <form action = "{{url('/get-activity')}}" method="post">
    @csrf
        <label for="getactivityName">Activity name:</label>
        <input type="text" id="getactivityName" name="eventName" required>
        <button type="submit">Get activity</button>
    </form>
@endsection