<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Cloud</title>
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
            display: flex; 
            background-color: #97bbcc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            margin: 10px;
            text-align: center;
            flex-direction: column;
        }

        .box p {
            margin-top: 0px;
            margin-bottom: 5px;
        }

        .box a {
            color: #383838;
            text-decoration: none;
            margin-top: auto;
            text-decoration: underline;
        }

        .box a:hover {
            color: #4E8098;
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
        <h1>Welkom op mijn website</h1>
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
            <p>In deze service vindt je het ledenbestand van de fictieve vereniging. Je kan leden toevoegen, een tabel van leden zien en de informatie van alle leden apart bekijken.</p>
            <a href="/leden">Ga naar Ledenbestand</a>
        </div>

        <div class="box">
            <h2>Live chat</h2>
            <p>Deze service is een live chat. Na het ingeven van je naam kan je deze chat gebruiken. Je chat met een andere persoon (een ander tablad). </p>
            <a href="/ws">Ga naar Live chat</a>
        </div>

        <div class="box">
            <h2>Aanwezigheidsregistratie</h2>
            <p>Deze service dient voor Aanwezigheidsregistratie. Je kan een evenement toevoegen, met een datum, prijs, en naam. Bij elke activiteit kan je ook een persoon die aanwezig was ingeven.</p>
            <a href="/soap">Ga naar Aanwezigheidsregistratie</a>
        </div>

        <div class="box">
            <h2>Weerbericht</h2>
            <p>In deze service kan je na het ingeven van de datum en locatie van je evenement het weerbericht opvragen voor dit evenement.</p>
            <a href="/grpc">Ga naar Weerbericht</a>
        </div>

        <div class="box">
            <h2>Updates</h2>
            <p>In deze service kan je updates, gestuurd door bv. het praesidium zien.</p>
            <a href="/updates">Ga naar Updates</a>
        </div>

        <div class="box">
            <h2>Feestbegeleiding</h2>
            <p>Deze service dient voor het bijhouden welke verenigingen en personen feestbegeleiding gedaan hebben op een evenement.</p>
            <a href="/events">Ga naar Feestbegeleiding</a>
        </div>
    </div>
</body>
</html>