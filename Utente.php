<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Area Utente</title>
</head>

<body class="bg-light">

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Le mie credenziali</h6>
    <div class="d-flex text-muted pt-3">
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">Username</strong>
                <a href="modificaUtente.php">Modifica</a>
            </div>
            <span class="d-block"> <?php getInfoAccount("username");?> </span>
        </div>
    </div>

    <div class="d-flex text-muted pt-3">
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">Nome</strong>
                <a href="modificaUtente.php">Modifica</a>
            </div>
            <span class="d-block"> <?php getInfoAccount("nome"); ?> </span>
        </div>
    </div>

    <div class="d-flex text-muted pt-3">
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">Cognome</strong>
                <a href="modificaUtente.php">Modifica</a>
            </div>
            <span class="d-block"><?php getInfoAccount("cognome"); ?></span>
        </div>
    </div>

    <div class="d-flex text-muted pt-3">
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">Password</strong>
                <a href="modificaUtente.php">Modifica</a>
            </div>
            <span class="d-block"><?php getInfoAccount("password"); ?></span>
        </div>
    </div>

    <div class="d-flex text-muted pt-3">
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">Regione</strong>
                <a href="modificaUtente.php">Modifica</a>
            </div>
            <span class="d-block"><?php getInfoAccount("nome_regione"); ?></span>
        </div>
    </div>

</div>
</main>

<?php


function getInfoAccount($info)
{
    $connessione = mysqli_connect("151.69.121.220", "martina.vial", "Password2020", "martina_vial_mtf", 3306);
    session_start();
    $query = "select * from account where username = '".$_SESSION["username"]."'";
    $app = mysqli_query($connessione,$query);

    while($riga = $app -> fetch_assoc())
    {
        echo "@" . $riga[$info];
        session_abort();
        return;
    }
}

?>

</body>
</html>