<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Area Referente</title>
</head>
<body>

<form action = "" method= "post">

    <h2>Operatori</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col"> Username </th>
                <th scope="col"> Nome </th>
                <th scope="col"> Cognome </th>
                <th scope="col"> Regione </th>
            </tr>
            </thead>
            <tbody>
            <?php showOperatori(mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306)); ?>
            </tbody>
        </table>
    </div>

    <h2>Capi Area</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col"> Username </th>
                <th scope="col"> Nome </th>
                <th scope="col"> Cognome </th>
                <th scope="col"> Area </th>
            </tr>
            </thead>
            <tbody>
            <?php showCapiArea(mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306)); ?>
            </tbody>
        </table>
    </div>

    <h2>Punti vendita</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col"> id </th>
                <th scope="col"> Nome </th>
                <th scope="col"> Regione </th>
            </tr>
            </thead>
            <tbody>
            <?php showPuntiVendita(mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306)); ?>
            </tbody>
        </table>
    </div>

</form>

<?php

$connessione = mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306);

function showOperatori($connessione)
{
    $query = "SELECT * FROM account GROUP BY username ORDER BY nome_regione";
    $app = mysqli_query($connessione, $query);
    while($riga = $app -> fetch_assoc())
    {
        if (mysqli_num_rows($app) == 0)
        {
            echo "Non ci sono utenti";
        }
        else
        {
            echo "<tr>" .
                "<td>" . $riga["username"] . "</td>" .
                "<td>" . $riga["nome"] . "</td>" .
                "<td>" . $riga["cognome"] . "</td>" .
                "<td>" . $riga["nome_regione"] . "</td>" .
                "</tr>";
        }
    }
    echo "<br>";
}

function showCapiArea($connessione)
{
    $query = "SELECT * FROM capi_area GROUP BY username ORDER BY area";
    $app = mysqli_query($connessione, $query);
    while($riga = $app -> fetch_assoc())
    {
        if (mysqli_num_rows($app) == 0)
        {
            echo "Non ci sono capi area";
        }
        else
        {
            echo "<tr>" .
                "<td>" . $riga["username"] . "</td>" .
                "<td>" . $riga["nome"] . "</td>" .
                "<td>" . $riga["cognome"] . "</td>" .
                "<td>" . $riga["area"] . "</td>" .
                "</tr>";
        }
    }
    echo "<br>";
}

function showPuntiVendita($connessione)
{
    $query = "SELECT * FROM punti_vendita ORDER BY id";
    $app = mysqli_query($connessione, $query);
    while($riga = $app -> fetch_assoc())
    {
        if (mysqli_num_rows($app) == 0)
        {
            echo "Non ci sono negozi";
        }
        else
        {
            echo "<tr>" .
                "<td>" . $riga["id"] . "</td>" .
                "<td>" . $riga["nome"] . "</td>" .
                "<td>" . $riga["regione"] . "</td>" .
                "</tr>";
        }
    }
    echo "<br>";
}

?>
</body>
</html>