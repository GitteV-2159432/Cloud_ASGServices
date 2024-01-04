@extends("AttendanceViews\MasterSoap")
@section("pagetitle1","Attendance service")
@section("pageContents")
    <h1> Add Activity</h1>
    <form action="{{url('/add-activity')}}" method="post">
    @csrf
        <label for="addActivityName">Activity Name:</label>
        <input type="text" id="addActivityName" name="name" required>
        <label for="addActivityDate">Activity Date:</label>
        <input type="date" id="addActivityDate" name="date" required>
        <label for="AddActivityPrice">Activity Price:</label>
        <input type="doubleval" id="AddActivityPrice" name="price" required>
        <label for="AddActivityAttendee">attendees:</label>
        <input type="text" id="AddActivityAttendee" name="attendee" required>
        <button type="submit">Add activity</button>
    </form>
@endsection