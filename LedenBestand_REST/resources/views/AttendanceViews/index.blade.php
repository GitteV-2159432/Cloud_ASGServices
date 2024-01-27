@extends("AttendanceViews\MasterSoap")
@section("pagetitle","Aanwezigheids service")
@section("pageContents")
<h2 class = "pagetitle">Leden</h2>
<a href="/soapAddMember" class="btn">
    <span class="btn-text">Nieuw Lid</span>
    <span class="btn-icon">+</span>
</a>
<input typ="text" id="search" onkeyup="search()" placeholder="Zoek lid">
<table id="people">
        <tr class = "header">
            <th>Naam</th>
        </tr>

        @foreach ($members as $member)
            <tr>
            <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            </script>
            
            <form action="{{ url('/get-member') }}" method="post" id="getMemberForm{{$member}}">
                @csrf
                <input type="hidden" name="userName" value="{{$member}}">
                <td><a href="javascript:document.getElementById('getMemberForm{{$member}}').submit()">{{$member}}</a></td>
            </form>
            </tr>
        @endforeach
</table>
<script src="{{asset('/js/soapSearchbar.js')}}"></script>
@endsection
