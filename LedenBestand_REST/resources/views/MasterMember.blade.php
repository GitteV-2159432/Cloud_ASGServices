<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('pagetitle1') @yield('pagetitle2') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/basic.css')}}"/>

    </head>

    <body>
        <div class="header"> 
            <h1>Welcome to Our Website</h1> 
        </div>
        <div class="navbar"> 
            <ul> 
                <li><a href="/">Home</a></li> 
                <li><a href="#">About</a></li> 
                <li><a href="#">Contact</a></li> 
            </ul> 
        </div>
        <hr>
        <div class="content"> 
            @yield('pageContents')
        </div>

    </body>
</html>

  
