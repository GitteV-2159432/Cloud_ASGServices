<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('pagetitle') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/gRPC.css')}}"/>

    </head>

    <body>
        <div class="header"> 
            <h1>Weerbericht: Powered by gRPC</h1> 
        </div>
        <div class="navbar"> 
            <ul> 
                <li>|</li>
                <li><a href="/">Home</a></li> 
                <li>|</li>
                <li><a href="/grpc">Weerbericht</a></li>
                <li>|</li>
                <li class="dropdown">
                        <a href="#" class="dropbtn">Services</a>
                        <div class="dropdown-content">
                            <a href="/leden">Ledenbestand</a>
                            <a href="/ws">Live Chat</a>
                            <a href="/soap">Aanwezigheidsregistratie</a>
                            <a href="/grpc">Weerbericht</a>
                            <a href="/updates">Updates</a>
                            <a href="/events">Feestbegeleiding</a>
                        </div>
                </li>
                <li>|</li>
            </ul> 
        </div>
        <div class="content"> 
            @yield('pageContents')
        </div>


    </body>
</html>