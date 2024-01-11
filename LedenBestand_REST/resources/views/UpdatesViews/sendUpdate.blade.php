@extends("UpdatesViews\MQTTMaster")
@section("pagetitle1","Send update")
@section("pageContents")
<h2>Send new update</h2>
        <form action="{{ url('/sendtoMQTT')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="Title">Title:</label>
            <input type="text" id="Title" name="title" required>
        </div>
        <div class="form-group">
            <label for="gettext">Text:</label>
            <input type="text" id="gettext" name="text" required>
        </div>
            <button type="submit" class="btn">
                    <span class="btn-text">Send update</span>
            </button>
        </form>
@endsection