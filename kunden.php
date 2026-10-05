<?php

$kunden = [
    [
        "nummer" => 1,
        "vorname" => "Helge",
        "nachname" => "Gepp",
        "email" => "helge.gepp@container.de"
    ],
    [
        "nummer" => 2,
        "vorname" => "Max",
        "nachname" => "Mustermann",
        "email" => "max.mustermann@container.de"
    ],
    [
        "nummer" => 3,
        "vorname" => "Tom",
        "nachname" => "Schmidt",
        "email" => "tom.schmidt@container.de"
    ]
]

?>





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
        <a href="login.php">Logout</a>
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
                <th></th>
            </tr>
        </thead>

        <tbody id="kundenTabelleNeu"> 

        <?php foreach($kunden as $kunde): ?>
            <tr>
                <td><?= str_pad($kunde["nummer"], 3, "0", STR_PAD_LEFT) ?></td>
                <td><?= $kunde["vorname"] . " " . $kunde["nachname"] ?></td>
                <td><?= $kunde["email"] ?></td>
        
                <td class="aktion">
                    <a 
                        href="kunden-details.php">Details
                    </a>

                    <a 
                        href="kunden-bearbeiten.php">Bearbeiten
                    </a>
                
                </td>
                
            </tr>
        
            <?php endforeach; ?>
            
        </tbody>

    </table>



</body>
</html>