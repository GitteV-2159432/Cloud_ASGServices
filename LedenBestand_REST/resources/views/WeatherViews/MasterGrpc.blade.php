<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('pagetitle1') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/gRPC.css')}}"/>

    </head>

    <body>
        <div class="header"> 
            <h1>Welcome to my gRPC Service</h1> 
        </div>
        <div class="navbar"> 
            <ul> 
                <li>|</li>
                <li><a href="/">Home</a></li> 
                <li>|</li>
                <li><a href="/grpc">Find Weather</a></li>
                <li>|</li>
            </ul> 
        </div>
        <div class="content"> 
            @yield('pageContents')
        </div>


    </body>
</html>