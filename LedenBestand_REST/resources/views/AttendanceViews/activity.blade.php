@extends("AttendanceViews\MasterSoap")
@section("pagetitle","Aanwezigheids service")
@section("pageContents")

<div class="container">
        <h1 class="naam">Activiteit: {{$eventName}}</h1>
        <br/>
        @if($date == "01/01/0001")
            <p>Datum: Geen datum gevonden </p>
        @else
            <p>Datum: {{$date}}</p>
        @endif
        
        <br/>
        @if($price == 0.0)
            Prijs: Gratis
        @elseif($price != 0.0)
            Prijs: €{{$price}}
        @endif
</div>
@endsection