@extends("LedenbestandViews\MasterMember")
@section("pagetitle1", ($member->firstName))
@section("pagetitle2", ($member->lastName))
@section("pageContents")
    <div class="container">
        <h1 class="pagetitle">{{$member->firstName}} {{$member->lastName}}</h1>
        <br/>Lidnummer: {{$member->id}}
        <br/>
        @if($member->type == "Ps")
            Type: Praesidium
        @elseif($member->type == "Ouwe zak")
            Type: Ouwe zak
        @elseif($member->type == "Lid")
            Type: Lid
        @elseif($member->type == "PsAndere")
            Type: Praesidium andere vereniging
        @endif

        <br/>
        @if($member->andereVereniging != NULL)
            Praesidium Bij: {{$member->andereVereniging}}        
        @endif
    </div>
@endsection