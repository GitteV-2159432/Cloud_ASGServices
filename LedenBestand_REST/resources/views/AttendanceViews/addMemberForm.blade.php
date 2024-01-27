@extends("AttendanceViews\MasterSoap")
@section("pagetitle","Aanwezigheids service")
@section("pageContents")
    <h1 class="pagetitle">Niew Lid</h1>
    <form action="{{url('/add-member')}}" method="post">
    @csrf
        <label for="Addmember">Naam:</label>
        <input type="text" id="Addmember" name="name" required>
        <button type="submit" class="btn">
                <span class="btn-text">Voeg toe</span>
        </button>
    </form>
@endsection