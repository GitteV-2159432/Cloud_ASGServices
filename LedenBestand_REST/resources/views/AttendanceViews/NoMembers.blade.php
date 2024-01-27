@extends("AttendanceViews\MasterSoap")
@section("pagetitle","Aanwezigheids service")
@section("pageContents")
<h2 class = "pagetitle">Leden</h2>
<a href="/soapAddMember" class="btn">
    <span class="btn-text">Nieuw Lid</span>
    <span class="btn-icon">+</span>
</a>
<a href="/addSamples" class="btn">
    <span class="btn-text">VoorbeeldLeden</span>
</a>
<div class="container">
    <h1 class="notFound">Geen leden gevonden!</h1>
</div>
@endsection
