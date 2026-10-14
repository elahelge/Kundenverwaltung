<?php

session_start();

if(!isset($_SESSION["username"]))
{
    header("Location: login.php");
    exit();
}

include "db.php";

// Abrufen aller Kundendaten für Kundenübersicht

$sql = "SELECT *FROM kunden";

$result = mysqli_query($conn, $sql); 

$kunden = mysqli_fetch_all(
    $result,
    MYSQLI_ASSOC
);

?>



<!-- HTML Code -->

<!DOCTYPE html>
<html lang="de-DE">

<head>
    <meta charset="utf-8">
    <title>Kundenübersicht</title>

    <link rel="stylesheet" href="main.css">
    <script src="main.js" defer></script>
</head>

<body id="kundenUebersicht">
        
    <nav>
        <a href="kunden.php">Kundenübersicht</a>
        <a href="kunden-anlegen.php">Kunde anlegen</a>
        <a href="logout.php">Logout</a>
    </nav>

    <h1>Kundenverwaltung</h1>

    <h2>Kundenübersicht</h2>

    <!--Suchfunktion-->
    <div id="suche">
        <label for="suche"></label>
        <input 
            id="suche"
            name="suche"
            type="search"
            placeholder="Kunden suchen"
            >
    </div>
    <!--Kundentabelle-->
    <table class="kundenTabelle">

        <thead>
            <tr>
                <th>Kundennummer</th>
                <th>Name</th>
                <th>E-Mail-Adresse</th>
                <th>Status</th>
                
            </tr>
        </thead>

        <tbody id="kundenTabelleNeu"> 

        <?php foreach($kunden as $kunde): ?>
            <tr onclick="window.location.href='kunden-details.php?kundennummer=<?php echo $kunde['kundennummer']; ?>'">
                <td><?= str_pad($kunde["kundennummer"], 3, "0", STR_PAD_LEFT) ?></td>
                <td><?= $kunde["vorname"] . " " . $kunde["nachname"] ?></td>
                <td><?= $kunde["email"] ?></td>
                <td> 
                    <?php
                    if($kunde['kundenstatus'] == 'Aktiv') {
                        echo '<span class="status-badge aktiv">Aktiv</span>';
                    } else {
                        echo '<span class="status-badge inaktiv">Inaktiv</span>';
                    }
                    ?>
                </td>

       <!--   
                <td class="aktion">
        
                        <a href="kunden-details.php?kundennummer=<?php echo $kunde["kundennummer"]; ?>">
                            Details
                        </a>

                        <a href="kunden-bearbeiten.php?kundennummer=<?php echo $kunde["kundennummer"]; ?>">
                            Bearbeiten
                        </a>
                </td> -->
            </tr>
        
            <?php endforeach; ?>
            
        </tbody>

    </table>



</body>
</html>