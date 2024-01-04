@extends("AttendanceViews\MasterSoap")
@section("pagetitle1","Member $name")
@section("pageContents")
    <h2>Member: {{$name}}</h2>
    
    <p>Attendence percentage: {{$percentage}}%</p>
    <p>Amount of activities attended: {{$attendedActivities}}</p>

@endsection