<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifica Utente</title>
</head>
<body>

<form action="" method="get">

    <?php showInfo();?>

    --------------------------------------------------------------------------
    <br>
    Modifica Username: <input type="text" name = "username" value = "">  <br>
    Modifica Nome:  <input type="text" name = "nome" value = "">  <br>
    Modifica Cognome: <input type="text" name = "cognome" value = "">  <br>
    //INSERIRE UNA COMBOBOX CON I PUNTI VENDITA ESISTENTI <br>
    Punto vendita:  <input type="text" name = "puntoVendita" value = "">  <br>
    Modifica Password: <input type="password" name="password">  <br>
    <input type="submit" name="struca qua">  <br>

</form>

<?php

if(isset($_GET["submit"]))
{
    changeInfo();
}

function showInfo()
{
    session_start();
    echo $_SESSION["username"];
    $connessione = mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306);
    $query = "SELECT * FROM account where username = '".$_SESSION["username"]."'";
    $app = mysqli_query($connessione, $query);

    while ($riga = $app -> fetch_assoc())
    {
        echo "Username attuale: " . $riga["username"] . "<br>" .
            "Nome attuale: " . $riga["nome"] . "<br>" .
            "Cognome attuale: " . $riga["cognome"] . "<br>" .
            "Password attuale: " . $riga["password"] . "<br>";
    }
}

//RIPRENDERE FUNZIONE DELLA VIAL
function checkUsername()
{
    if(true)
    {
        changeUsername();
    }
    else
    {
        echo "Username già esistente";
    }
}

function changeInfo()
{
    $connessione = mysqli_connect("151.69.121.220","martina.vial","Password2020","martina_vial_mtf", 3306);
    if(!empty($_GET["username"]))
    {
        checkUsername();
    }
    if(!empty($_GET["nome"]))
    {
        changeName($connessione);
    }
    if(!empty($_GET["cognome"]))
    {
        changeSurname($connessione);
    }
    if(!empty($_GET["puntoVendita"]))
    {
        changePuntoVendita($connessione);
    }
    if(!empty($_GET["password"]))
    {
        changePassword($connessione);
    }
}
function changeName($connessione)
{
    $query = "UPDATE account SET nome = '".$_GET["nome"]."'";
    $app = mysqli_query($connessione, $query);
}

function changeUsername($connessione)
{
    $query = "UPDATE account SET username = '".$_GET["username"]."'";
    $app = mysqli_query($connessione, $query);
}

function changeSurname($connessione)
{
    $query = "UPDATE account SET cognome = '".$_GET["cognome"]."'";
    $app = mysqli_query($connessione, $query);
}

function changePuntoVendita($connessione)
{
    //INVENTARSI QUALCOSA
}

function changePassword($connessione)
{
    $query = "UPDATE account SET password = '".$_GET["password"]."'";
    $app = mysqli_query($connessione, $query);
}

?>
</body>
</html>