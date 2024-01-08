@extends("AttendanceViews\MasterSoap")
@section("pagetitle1","Attendance service")
@section("pageContents")

<h2>Members</h2>
<table id="members">
        <tr class = "header">
            <th>Name</th>
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
@endsection
