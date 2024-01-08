<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('pagetitle') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/graphQL.css')}}"/>

    </head>

    <body>
        <div class="header"> 
            <h1>Welcome to my GraphQL Service</h1> 
        </div>
            <div class="navbar"> 
                <ul> 
                    <li>|</li>
                    <li><a href="/">Home</a></li> 
                    <li>|</li>
                    <li><a href="/associations">Associations</a></li>
                    <li>|</li>
                    <li><a href="/events">Events</a></li>
                    <li>|</li>
                    <li><a href="/people">See All people</a></li>
                    <li>|</li>
                    
                </ul> 
            </div>
        <div class="content"> 
            @yield('pageContents')
        </div>

    </body>
</html>