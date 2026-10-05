<!DOCTYPE html>
<html lang="de-DE">

<head>
    <meta charset="utf-8">
    <title>Kundendetails</title>

    <link rel="stylesheet" href="main.css">
    <script src="main.js" defer></script>
</head>

<body id="kundeDetails">
        
    <nav>
        <a href="kunden.php">Kundenübersicht</a>
        <a href="kunden-anlegen.php">Kunde anlegen</a>
        <a href="login.php">Logout</a>
    </nav>

    <h1>Kundenverwaltung</h1>

    <h2>Kundendetails</h2>

    <fieldset>
        <legend>Stammdaten</legend>

        <div>
            Kundennummer:
            <span id="kundennummer"></span>
        </div>

        <div>
            Vorname:
            <span id="vorname"></span>
        </div>

        <div>
            Nachname:
            <span id="nachname"></span>
        </div>

        <div>
            Geburtsdatum:
            <span id="geburtsdatum"></span>
        </div>

        <div>
            Geschlecht:
            <span id="geschlecht"></span>
        </div>

        <div>
            E-Mail-Adresse:
            <span id="email"></span>
        </div>
    </fieldset>

    <fieldset>
        <legend>Adresse</legend>
    
        <div>
            Straße:
            <span id="strasse"></span>
        </div>

        <div>
            Hausnummer:
            <span id="hausnummer"></span>
        </div>

        <div>
            Postleitzahl:
            <span id="postleitzahl"></span>
        </div>

        <div>
            Ort:
            <span id="ort"></span>
        </div>
    </fieldset>

    <fieldset>
        <legend>Kundenstatus</legend>
        <span id="kundenstatus"></span>
    </fieldset>

    <fieldset>
        <legend>Notizen</legend>
        <div id="notizen"></div>
    </fieldset>

    <div class="button">

        <button id="kundeBearbeiten" type="button">
            Kunde bearbeiten
        </button>

        <button id="kundeLoeschen" type="button">
            Kunde löschen
        </button>

    </div>

</body>

</html>