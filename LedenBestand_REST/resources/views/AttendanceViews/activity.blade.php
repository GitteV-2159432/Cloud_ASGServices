@extends("AttendanceViews\MasterSoap")
@section("pagetitle1","Activity $eventName")
@section("pageContents")
    <h2>Activity: {{$eventName}}</h2>

    @if($date == "01/01/0001")
        <p>Date: Geen datum gevonden </p>
    @else
        <p>Date: {{$date}}</p>
    @endif

    <br/>
    @if($price == 0.0)
        Price: Gratis
    @elseif($price != 0.0)
        Price: €{{$price}}
    @endif


@endsection