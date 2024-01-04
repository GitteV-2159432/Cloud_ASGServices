<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('pagetitle1') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/basic.css')}}"/>

    </head>

    <body>
        <div class="header"> 
            <h1>Welcome to Our Website</h1> 
        </div>
        <div class="navbar"> 
            <ul> 
                <li><a href="/">Home</a></li> 
                <li><a href="/soap">All members</a></li>
                <li><a href="/soapMember">Find Member</a></li> 
                <li><a href="/soapActivity">Find Activity</a></li> 
                <li><a href="/soapAddActivity">Add Activity</a></li> 
            </ul> 
        </div>
        <hr>
        <div class="content"> 
            @yield('pageContents')
        </div>


    </body>
</html>

  
