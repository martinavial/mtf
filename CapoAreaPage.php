<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Capo Area</title>


    <h2>Operatori che lavorano nella tua zona</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col"> Username</th>
                <th scope="col"> Nome</th>
                <th scope="col"> Cognome</th>
                <th scope="col"> Regione</th>
            </tr>
            </thead>
            <tbody>
            <?php showOperatori(mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306)); ?>
            </tbody>
        </table>
    </div>
</head>
</div>
</div>

<br> <br>

<h2>Punti vendita nella tua zona</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col"> Nome</th>
            <th scope="col"> Regione</th>
        </tr>
        </thead>
        <tbody>
        <?php showPuntiVendita(mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306)); ?>
        </tbody>
    </table>
</div>
</head>
</div>
</div>


<?php


function showOperatori($connessione)
{
    session_start();
    $query = "SELECT * FROM capi_area WHERE username = '".$_SESSION["username"]."'";
    $app = mysqli_query($connessione, $query);
    while($riga = $app -> fetch_assoc())
    {
        $query = "SELECT * FROM account inner JOIN regioni ON account.nome_regione = regioni.nome WHERE regioni.posizione = '".$riga["area"]."'";
        $app = mysqli_query($connessione, $query);
        while($riga = $app -> fetch_assoc())
        {
            echo "<tr>" .
                "<td>" . $riga["username"] . "</td>" .
                "<td>" . $riga["nome"] . "</td>" .
                "<td>" . $riga["cognome"] . "</td>" .
                "<td>" . $riga["nome_regione"] . "</td>" .
                "</tr>";
        }
    }
    session_abort();
}

function showPuntiVendita($connessione)
{
    session_start();
    $query = "SELECT * FROM capi_area WHERE username = '".$_SESSION["username"]."'";
    $app = mysqli_query($connessione, $query);
    while($riga = $app -> fetch_assoc())
    {
        $query = "SELECT punti_vendita.nome as punto_vendita, punti_vendita.regione FROM punti_vendita inner JOIN regioni ON punti_vendita.regione = regioni.nome WHERE regioni.posizione = '".$riga["area"]."'";
        $app = mysqli_query($connessione, $query);
        while($riga = $app -> fetch_assoc())
        {
            echo "<tr>" .
                 "<td>" . $riga["punto_vendita"] . "</td>" .
                 "<td>" . $riga["regione"] . "</td>" .
                 "</tr>";
        }
    }
    session_abort();
}
?>

</body>
</html>