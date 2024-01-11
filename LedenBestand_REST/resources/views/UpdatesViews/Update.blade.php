@extends("UpdatesViews\MQTTMaster")
@section("pagetitle1","Updates")
@section("pageContents")

    <div class="container" id ="updates" >
        <script type="importmap">{ "imports": { "@urql/core":"https://cdn.jsdelivr.net/npm/@urql/core@4.2.0/+esm" } }</script>
        <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
        <script type="module" src='js/updates.js'></script>
    </div>
@endsection