@extends("AttendanceViews\MasterSoap")
@section("pagetitle","Lid $name")
@section("pageContents")
    <div class="container">
        <h1 class="naam">Lid: {{$name}}</h1>
        <br/>Aanwezigheids percentage: {{$percentage}}%
        <br/>Aantal activiteiten aanwezig: {{$attendedActivities}}
        
        <br/>
        @if($percentage >= 70)
            <div class="stemrecht"> Deze persoon heeft stemrecht</div>        
        @endif
    </div>

@endsection