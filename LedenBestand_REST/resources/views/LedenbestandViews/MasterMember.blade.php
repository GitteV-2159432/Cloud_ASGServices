<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('pagetitle1') @yield('pagetitle2') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/basic.css')}}"/>

    </head>

    <body>
        <div class="header"> 
            <h1>Welcome to my REST Service</h1> 
        </div>
            <div class="navbar"> 
                <ul> 
                    <li>|</li>
                    <li><a href="/">Home</a></li> 
                    <li>|</li>
                    <li><a href="/leden">Alle leden</a></li>
                    <li>|</li>
                    <li><a href="/voegToe"> Voeg nieuw lid toe</a></li>
                    <li>|</li>
                </ul> 
            </div>
        <div class="content"> 
            @yield('pageContents')
        </div>

    </body>
</html>

  
