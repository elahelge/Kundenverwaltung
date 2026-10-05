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
                <th>Aktionen</th>
            </tr>
        </thead>

        <tbody id="kundenTabelleNeu"> 
            <tr>
                <td>001</td>
                <td>Helge Gepp</td>
                <td>helge.gepp@container.de</td>
                <td class="aktionen"> 
                    <a 
                        href="kunden-details.php">Details
                    </a>

                    <a 
                        href="kunden-bearbeiten.php">Bearbeiten
                    </a>
                
                </td>
            </tr>
            <!-- Kunden werden später eingefügt --> 
        </tbody>

    </table>



</body>
</html>