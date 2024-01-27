<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('pagetitle1') @yield('pagetitle2') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/basic.css')}}"/>
    </head>

    <body>
        <div class="header"> 
            <h1>Ledenbestand: Powered by REST</h1> 
        </div>
            <div class="navbar"> 
                <ul> 
                    <li>|</li>
                    <li><a href="/">Home</a></li> 
                    <li>|</li>
                    <li><a href="/leden">Leden</a></li>
                    <li>|</li>
                    <li><a href="/voegToe">Nieuw Lid</a></li>
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

  
