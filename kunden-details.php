<?php

include "db.php";

//Abrufen des ausgewählten Kunden

$kundennummer = $_GET["kundennummer"];

$sql = "
SELECT * 
FROM kunden
WHERE kundennummer = $kundennummer
";

$result = mysqli_query($conn, $sql); 


$gefundenerKunde = mysqli_fetch_assoc($result);


//Kunde löschen (DELETE)

if(isset($_POST["loeschen"]))
{
    $sqlDEL = "
    DELETE 
    FROM kunden
    WHERE kundennummer = $kundennummer
    ";

    mysqli_query($conn, $sqlDEL);

    header("Location: kunden.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="de-DE">
 
<head >
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
                <?php 
                    if($gefundenerKunde["geschlecht"] == "m")
                        {
                            echo "Männlich";
                        }
                    elseif($gefundenerKunde["geschlecht"] == "w")
                        {
                            echo "Weiblich";
                        }
                    elseif($gefundenerKunde["geschlecht"] == "d")
                        {
                            echo "Divers";
                        } 
                    else
                        {
                            echo "Keine Angabe";
                        }
                ?>
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
        <div>
            <span id="kundenstatus">
                <?php
                    if($gefundenerKunde['kundenstatus'] == 'Aktiv') {
                        echo '<span class="status-badge aktiv">Aktiv</span>';
                    } else {
                        echo '<span class="status-badge inaktiv">Inaktiv</span>';
                    }
                ?>
            </span>
        </div>
    </fieldset>

    <fieldset>
        <legend>Notizen</legend>
        <div id="notizen">
            <?= $gefundenerKunde["notizen"] ?>
        </div>
    </fieldset>

        
    
    <form method="post">

        <div class="button">

            <button id="kundeBearbeiten" type="button" onclick="window.location.href='kunden-bearbeiten.php?kundennummer=<?= $gefundenerKunde["kundennummer"] ?>'">
                    Kunde Bearbeiten
            </button>
    
        
            <button 
                id="kundeLoeschen" 
                name="loeschen"
                type="submit"
                onclick="return confirm('Kunde wirlich löschen?');"
                >
                Kunde Löschen
                
            </button>
        </div>
    </form>


</body>

</html>