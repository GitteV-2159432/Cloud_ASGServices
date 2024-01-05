<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('pagetitle1') - (c) Gitte </title>
        <link rel="stylesheet" href="{{URL::asset('css/soap.css')}}"/>

    </head>

    <body>
        <div class="header"> 
            <h1>Welcome to my SOAP service</h1> 
        </div>
            <div class="navbar"> 
                <ul> 
                    <li>|</li>
                    <li><a href="/">Home</a></li> 
                    <li>|</li>
                    <li><a href="/soap">All members</a></li>
                    <li>|</li>
                    <li><a href="/soapMember">Find Member</a></li> 
                    <li>|</li>
                    <li><a href="/soapActivity">Find Activity</a></li> 
                    <li>|</li>
                    <li><a href="/soapAddActivity">Add Activity</a></li>
                    <li>|</li> 
                </ul> 
            </div>
        <div class="content"> 
            @yield('pageContents')
        </div>


    </body>
</html>

  
