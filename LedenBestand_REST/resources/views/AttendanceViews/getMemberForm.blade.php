@extends("AttendanceViews\MasterSoap")
@section("pagetitle1","Attendance service")
@section("pageContents")

    <h1>Member</h1>

    <form action="{{ url('/get-member') }}" method="post">
    @csrf
        <label for="getUserName">User name:</label>
        <input type="text" id="getuserName" name="userName" required>
        <button type="submit">Get member</button>
    </form>
@endsection