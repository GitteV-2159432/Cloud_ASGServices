@extends("AttendanceViews\MasterSoap")
@section("pagetitle","Aanwezigheids service")
@section("pageContents")
    <h1 class="pagetitle">Nieuwe activiteit</h1>
    <form action="{{url('/add-activity')}}" method="post">
    @csrf
        <label for="addActivityName">Activiteit naam:</label>
        <input type="text" id="addActivityName" name="name" required>
        <label for="addActivityDate">Datum:</label>
        <input type="date" id="addActivityDate" name="date" required>
        <label for="AddActivityPrice">Prijs:</label>
        <!--https://stackoverflow.com/questions/19011861/is-there-a-float-input-type-in-html5-->
        <input type="number" step="0.01" id="AddActivityPrice" name="price" required>
        <label for="AddActivityAttendee">Aanwezige:</label>
        <input type="text" id="AddActivityAttendee" name="attendee" required>
        <button type="submit" class="btn">
                <span class="btn-text">Voeg toe</span>
        </button>
    </form>
@endsection