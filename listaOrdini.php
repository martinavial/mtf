<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Riepilogo Ordini</title>


    <h2>Riepilogo Ordini di <?php getUsername(); ?> </h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col"> Espositore</th>
                <th scope="col"> Punto vendita</th>
                <th scope="col"> Data acquisto</th>
                <th scope="col"> Data consegna</th>
                <th scope="col"> Prezzo totale</th>
            </tr>
            </thead>
            <tbody>
            <?php createConnection(); ?>
            </tbody>
        </table>
    </div>
</head>
</div>
</div>



<?php


function getUsername()
{
    session_start();
    echo  " " . $_SESSION["username"];
    session_abort();
}

function createConnection()
{
    $connessione = mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306);
    if ($connessione->connect_error) {
        die("Connection failed: " . $connessione->connect_error);
    }
    showOrdini($connessione);
}

function showOrdini($connessione)
{
    session_start();
    $query = "select * from carrelli where account = '".$_SESSION["username"]."'";
    $app = mysqli_query($connessione, $query);
    while ($riga = $app -> fetch_assoc())
    {
        $query = "select * from ordini where carrello = '".$riga["id"]."'";
        $app = mysqli_query($connessione, $query);
        while ($riga2 = $app -> fetch_assoc())
        {
            echo "<tr>" .
            "<td>" . $riga2["espositore"] . "</td>" .
            "<td>" . $riga2["punto_vendita"] . "</td>" .
            "<td>" . $riga2["data_acquisto"] . "</td>" .
            "<td>" . $riga2["data_consegna"] . "</td>" .
            "<td>" . $riga2["prezzo_totale"] . "</td>" .
            "</tr>";        }
    }
    session_abort();
}
?>

</body>
</html>