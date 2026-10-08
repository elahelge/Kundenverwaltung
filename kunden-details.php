
<!-- Datenbank Verknüpfung -->
<?php

include "db.php";

$kundennummer = $_GET["kundennummer"];

$sql = "
SELECT * 
FROM kunden
WHERE kundennummer = $kundennummer
";

$result = mysqli_query($conn, $sql); 


$gefundenerKunde = mysqli_fetch_assoc($result);

?>



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
            <span id="kundennummer">
                <?= str_pad($gefundenerKunde["kundennummer"], 3, "0", STR_PAD_LEFT) ?>
            </span>
        </div>

        <div>
            Vorname:
            <span id="vorname">
                <?= $gefundenerKunde["vorname"] ?>
            </span>
        </div>

        <div>
            Nachname:
            <span id="nachname">
                <?= $gefundenerKunde["nachname"] ?>
            </span>
        </div>

        <div>
            Geburtsdatum:
            <span id="geburtsdatum">
                <?= $gefundenerKunde["geburtsdatum"] ?>
            </span>
        </div>

        <div>
            Geschlecht:
            <span id="geschlecht">
                <?= $gefundenerKunde["geschlecht"] ?>
            </span>
        </div>

        <div>
            E-Mail-Adresse:
            <span id="email">
                <?= $gefundenerKunde["email"] ?>
            </span>
        </div>
    </fieldset>

    <fieldset>
        <legend>Adresse</legend>
    
        <div>
            Straße:
            <span id="strasse">
                <?= $gefundenerKunde["strasse"] ?>
            </span>
        </div>

        <div>
            Hausnummer:
            <span id="hausnummer">
                <?= $gefundenerKunde["hausnummer"] ?>
            </span>
        </div>

        <div>
            Postleitzahl:
            <span id="postleitzahl">
                <?= $gefundenerKunde["postleitzahl"] ?>
            </span>
        </div>

        <div>
            Ort:
            <span id="ort">
                <?= $gefundenerKunde["ort"] ?>
            </span>
        </div>
    </fieldset>

    <fieldset>
        <legend>Kundenstatus</legend>
        <span id="kundenstatus">
            <?= $gefundenerKunde["kundenstatus"] ?>
        </span>
    </fieldset>

    <fieldset>
        <legend>Notizen</legend>
        <div id="notizen">
            <?= $gefundenerKunde["notizen"] ?>
        </div>
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