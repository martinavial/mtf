<?php

$db = "martina_vial_mtf";
$db_host = "151.69.121.220";
$db_user = "martina.vial";
$db_password = "Password2020";

$connessione = mysqli_connect($db_host, $db_user, $db_password);
if (!$connessione) {
    print "Errore" . "<br>";
    exit;
} else {
    mysqli_select_db($connessione, $db);
}

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/account-style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar open">
    <div class="logo-details">
        <img src="imgs/chocolate.png" class="icon">
        <div class="logo_name">&nbsp; Lindt </div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="index.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="#" style="background-color: #383838">
                <i class='bx bx-user' ></i>
                <span class="links_name">Account</span>
            </a>
            <span class="tooltip">Account</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cart-alt' ></i>
                <span class="links_name">Carrello</span>
            </a>
            <span class="tooltip">Carrello</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Impostazioni</span>
            </a>
            <span class="tooltip">Impostazioni</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-shopping-bag' ></i>
                <span class="links_name">I miei ordini</span>
            </a>
            <span class="tooltip">I miei ordini</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <span style="font-size: 22px; font-weight: 400; margin-top: 5px; color: #ff4545">Logout</span>
                <a href="login.php">
                    <i class='bx bx-log-out' id="log_out" ></i>
                </a>
            </div>
        </li>
    </ul>
</div>
<section class="home-section">

    <div class="containerr">
        <a href="#" class="profilo">
            <?php echo'<span class="user">'.$_SESSION['username'].'</span>'?>
            <img src="imgs/profilo.svg" class="img">
        </a>
    </div>

    <center>
    <div class="contenitore">
        <center>
            <div class="account-cont">
                <img src="imgs/profilo.svg" class="immagineaccount">
                <div class="informazioni">

                </div>
                <a href=""></a>
                <button type="button" class="modifica" href="index.php"><i class="bx bxs-cart-add"></i> Modifica profilo</button>
            </div>
        </center>
    </div>
    </center>

    <div class="footer">
        <center><img class="logo-footer" src="imgs/logo-lindt.png"><br>
            <span class="copyright">Copyright © 2022 - MTF Industries</span></center>
    </div>

</section>

<script src="scripts/script.js"></script>


</body>
</html>