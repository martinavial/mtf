<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Area Utente</title>
</head>
<body>

<form action = "" method="get">

    Benvenuto: <?php if(isset($_GET["username"])) getUsername();
    ?>
    <br>
    Regione: <?php if(isset($_GET["username"])) getRegione() ?>
    <br>
    Punto vendita: <?php getPuntoVendita() ?>
    <br>

    Modifica informazioni profilo: <input type="submit" name = "modifica"> <br>
    Elimina profilo: <input type="submit" name = "elimina"> <br>

    <br>
    LISTA
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Disponibilita</th>
        </tr>
        <br>
        <?php showEspositori(); ?>
    </table>
</form>

<?php

main();

function main()
{
    if(isset($_GET['modifica']) && isset($_GET["username"]))
    {
        session_start();
        $_SESSION["username"] = $_GET["username"];
        header("location: modificaUtente.php");
    }

    if(isset($_GET['elimina']) && isset($_GET["username"]))
    {
        eliminaUtente(mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306));
    }
}



function getUsername()
{
    if(isset($_GET["username"]))
    {
        echo $_GET["username"];
    }
}

function getRegione()
{
    $connessione = mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306);
    $query = "SELECT nome_regione FROM account where username = '".$_GET["username"]."'";
    $app = mysqli_query($connessione, $query);

    while ($riga = $app -> fetch_assoc())
    {
        echo $riga["nome_regione"] . " ";
    }
}

//TROVARE MODO PER AVERE TABELLE CON CUI RICAVARE IL PUNTO VENDITA
function getPuntoVendita()
{

}

function showEspositori()
{
    $connessione = mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306);
    $query = "select * from espositori";
    $app = mysqli_query($connessione, $query);

    if ($app -> num_rows > 0)
    {
        while ($riga = $app -> fetch_assoc())
        {
            echo  "<tr><td>" . $riga["ID"] . "</td><td>" . $riga["nome"] . "</td><td>" . $riga["disponibilita"] . "</td></tr>";
        }
    }
    else
    {
        echo "Catalogo espositori attualmente non disponibile";
    }
}

//CONTROLLARE PERCHè NON FUNZIONA LA QUERY
function eliminaUtente($connessione)
{
    $query = "DELETE FROM account where username = '".$_GET["username"]."'";

    if ($connessione->query($query) === TRUE)
    {
        echo "Utente eliminato con successo";
    }
    else
    {
        echo "Errore nell'eliminare l'utente: " . $connessione->error;
    }
    //header("location: login.php");
}
?>

</body>
</html>
