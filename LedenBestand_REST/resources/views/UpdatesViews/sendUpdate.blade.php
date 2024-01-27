@extends("UpdatesViews\MQTTMaster")
@section("pagetitle","Verstuur update")
@section("pageContents")
<h2 class="pagetitle">Verstuur nieuwe update</h2>
        <form action="{{ url('/sendtoMQTT')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="Title">Titel:</label>
            <input type="text" id="Title" name="title" required>
        </div>
        <div class="form-group">
            <label for="gettext">Update:</label>
            <input type="text" id="gettext" name="text" required>
        </div>
            <button type="submit" class="btn">
                    <span class="btn-text">Verstuur</span>
            </button>
        </form>
@endsection