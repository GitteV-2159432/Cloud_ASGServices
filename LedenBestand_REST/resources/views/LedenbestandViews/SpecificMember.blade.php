@extends("LedenbestandViews\MasterMember")
@section("pagetitle1", ($member->firstName))
@section("pagetitle2", ($member->lastName))
@section("pageContents")
    <h3>{{$member->firstName}} {{$member->lastName}}</h3>
    <br/>Lidnummer {{$member->id}}
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
@stop