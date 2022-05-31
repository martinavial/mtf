<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riepilogo Ordini</title>
</head>
<body>

<?php

getUsername();
createConnection();

function getUsername()
{
    echo "Benvenuto " . $_GET["username"] . "<br>";
}

function createConnection()
{
    //connessione al db
    $hostname = "151.69.121.220";
    $username = "martina.vial";
    $password = "Password2020";
    $database = "martina_vial_mtf";
    $connessione = mysqli_connect($hostname,$username,$password,$database, 3306);
    showOrdini($connessione);
}

function showOrdini($connessione)
{
    //Ottengo gli ordini in base all'username
    $domanda = "select * from ordini where username '".$_GET["username"]."'";
    $app = mysqli_query($connessione, $domanda);
    while ($riga = $app -> fetch_assoc())
    {
        echo $riga["username"] . " ";
        echo $riga["quantita"] . " ";
        echo $riga["nome_espositore"] . " ";
        echo $riga["punto_vendita"] . " ";
    }
}
?>

</body>
</html>
