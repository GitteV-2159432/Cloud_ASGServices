<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Home Screen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background-color: #4E8098;
            padding: 20px;
            text-align: center;
            color: black;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .box {
            background-color: #97bbcc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            margin: 10px;
            text-align: center;
        }

        .box a {
            color: #333;
            text-decoration: none;
        }

        .box a:hover {
            text-decoration: underline;
        }

        /* Navbar Styles */
        .navbar{
            background-color:#00A9A5;
            height: 40px;
            border-top: 2px solid #0B5351; 
            border-bottom: 2px solid #0B5351
        }

        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .navbar li {
            display: inline;
            margin-right: 10px;
            color: #0B5351;
        }

        .navbar li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to Our Website</h1>
    </div>
    <div class="navbar"> 
            <ul> 
                <li>|</li>
                <li><a href="/">Home</a></li> 
                <li>|</li>
                <li><a href="/leden">Ledenbestand</a></li>
                <li>|</li>
                <li><a href="/ws">Live Chat</a></li>
                <li>|</li>
                <li><a href="/soap">Aanwezigheidsregistratie</a></li>
                <li>|</li>
                <li><a href="/grpc">Weerbericht</a></li>
                <li>|</li>
                <li><a href="/updates">Updates</a></li>
                <li>|</li>
                <li><a href="/events">Feestbegeleiding</a></li>
                <li>|</li>
            </ul> 
        </div>

    <div class="container">
        <div class="box">
            <h2>Ledenbestand</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elit lectus, lobortis ac justo non, pulvinar tempor ante.</p>
            <a href="/leden">Go to Service 1</a>
        </div>

        <div class="box">
            <h2>Live chat</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elit lectus, lobortis ac justo non, pulvinar tempor ante.</p>
            <a href="/ws">Go to Service 2</a>
        </div>

        <div class="box">
            <h2>Aanwezigheidsregistratie</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elit lectus, lobortis ac justo non, pulvinar tempor ante.</p>
            <a href="/soap">Go to Service 3</a>
        </div>

        <div class="box">
            <h2>Weerbericht</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elit lectus, lobortis ac justo non, pulvinar tempor ante.</p>
            <a href="/grpc">Go to Service 4</a>
        </div>

        <div class="box">
            <h2>Updates</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elit lectus, lobortis ac justo non, pulvinar tempor ante.</p>
            <a href="/updates">Go to Service 5</a>
        </div>

        <div class="box">
            <h2>Feestbegeleiding</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elit lectus, lobortis ac justo non, pulvinar tempor ante.</p>
            <a href="/events">Go to Service 6</a>
        </div>
    </div>
</body>
</html>