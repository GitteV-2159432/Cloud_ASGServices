<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('pagetitle') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/graphQL.css')}}"/>

    </head>

    <body>
        <div class="header"> 
            <h1>Feestbegeleiding: Powered by graphQL</h1> 
        </div>
            <div class="navbar"> 
                <ul> 
                    <li>|</li>
                    <li><a href="/">Home</a></li> 
                    <li>|</li>
                    <li><a href="/associations">Verenigingen</a></li>
                    <li>|</li>
                    <li><a href="/events">Evenementen</a></li>
                    <li>|</li>
                    <li><a href="/people">Personen</a></li>
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