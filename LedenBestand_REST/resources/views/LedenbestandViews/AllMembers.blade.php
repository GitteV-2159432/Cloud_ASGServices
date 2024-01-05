@extends("LedenbestandViews\MasterMember")
@section("pagetitle1","Leden")
@section("pageContents")

    <a href="/voegToe" class="btn">
        <span class="btn-text">Nieuw Lid</span>
        <span class="btn-icon">+</span>
    </a>

    <input typ="text" id="search" onkeyup="search()" placeholder="Zoek lid">
    <table id="members">
        <tr class = "header">
            <th>Lidnummer</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
        </tr>

        @foreach ($members as $member)
            <tr>
                <td><a href="/{{ $member->id }}">{{ $member->id }}</a></td>
                <td>{{ $member->firstName }}</td>
                <td>{{ $member->lastName }}</td>
            </tr>
        @endforeach
    </table>
    <script src="{{asset('/js/searchbar.js')}}"></script>
@endsection


