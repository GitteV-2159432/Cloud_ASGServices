<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('pagetitle1') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/mqtt.css')}}"/>

    </head>

    <body>
        <div class="header"> 
            <h1>Welcome to my MQTT Service</h1> 
        </div>
            <div class="navbar"> 
                <ul> 
                    <li>|</li>
                    <li><a href="/">Home</a></li> 
                    <li>|</li>
                    <li><a href="/updates">See updates</a></li>
                    <li>|</li>
                </ul> 
            </div>
        <div class="content"> 
            @yield('pageContents')
        </div>
    </body>
</html>

  
