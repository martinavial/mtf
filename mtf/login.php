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
    print "Connesso" . "<br>";
    mysqli_select_db($connessione, $db);
}

session_start();
if ($_SESSION['registrato']) {
    MostraMessaggioErrore("");
}

if(isset($_POST['accedi'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if(!empty($_POST['username']) && !empty($_POST['password'])){

    $ris = $connessione->query("SELECT * FROM account WHERE username = '{$username}'");

    if ($ris->num_rows == 0){
        MostraMessaggioErrore("utente inesistente");
    }
    else if ($ris->fetch_row()[3] == $password){
        $_SESSION['username'] = $username;
        $_SESSION['nome'] = $ris->fetch_row()[1];
        $_SESSION['cognome'] = $ris->fetch_row()[2];
        $_SESSION['regione'] = $ris->fetch_row()[4];
        header("Location: index.php");
    }
    else{
        MostraMessaggioErrore("password errata");
    }
}

function MostraMessaggioErrore(string $errore){
    $messaggio = "";
    $bckcolor = "";
    if ($errore == "utente inesistente"){
        $messaggio = "<strong>Utente non esistente!</strong> Riprova";
        $bckcolor = "#f44336";
    } else if ($errore == "password errata"){
        $messaggio = "<strong>Password errata!</strong> Riprova";
        $bckcolor = "#fcb603";
    } else if($_SESSION['registrato'] == true){
        $messaggio = "Registrazione avvenuta con successo";
        $bckcolor = "#58c0fc";
    }
    echo "<div class='alert' style='background-color: $bckcolor'><div class='closebtn' onclick=this.parentElement.style.display='none';>&times;</div> $messaggio </div>";
}

?>

<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/login-style.css" media="screen">
</head>

<body class="u-body u-xl-mode">
<section class="u-clearfix u-section-1" id="sec-9163">
    <div class="u-align-left u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-expanded-width-xs u-group u-opacity u-opacity-75 u-radius-30 u-shape-round u-white u-group-1">
            <div class="u-container-layout u-container-layout-1">
                <div class="u-align-left u-container-style u-custom-color-5 u-expanded-width u-group u-shape-rectangle u-group-2" style="border-top-right-radius: 30px; border-top-left-radius: 30px">
                    <div class="u-container-layout u-container-layout-2">
                        <img class="u-image u-image-default u-image-1" src="imgs/logo-lindt.png" alt="" data-image-width="1200" data-image-height="331">
                    </div>
                </div>
                <h2 class="u-text u-text-default u-text-palette-5-dark-2 u-text-1">Accedi al tuo account</h2>
                <div class="u-form u-form-1">
                    <form action="" method="POST" class="u-clearfix u-form-spacing-30 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                        <div class="u-form-group u-form-name">
                            <label for="name-6c9d" class="u-form-control-hidden u-label u-label-1"></label>
                            <input type="text" placeholder="Username" id="name-6c9d" name="username" class="u-input u-input-rectangle u-radius-15 u-white u-input-1" required="">
                        </div>
                        <div class="u-form-group u-form-group-2">
                            <label for="text-7194" class="u-form-control-hidden u-label u-label-2"></label>
                            <input type="password" placeholder="Password" id="text-7194" name="password" class="u-input u-input-rectangle u-radius-15 u-white u-input-2" required="required">
                        </div>
                        <div class="u-align-right u-form-group u-form-submit">
                            <button type="submit" value="submit" name="accedi" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-5 u-radius-20 u-text-white u-btn-1">Accedi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="u-clearfix u-expanded-width-xs u-gutter-0 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-layout-row">
                    <div class="u-container-style u-layout-cell u-size-35 u-layout-cell-1">
                        <div class="u-container-layout u-container-layout-3">
                            <h6 class="u-align-center-sm u-align-center-xs u-align-right-lg u-align-right-md u-align-right-xl u-custom-font u-font-open-sans u-text u-text-palette-5-dark-2 u-text-2">Non possiedi un account?</h6>
                        </div>
                    </div>
                    <div class="u-container-style u-layout-cell u-size-25 u-layout-cell-2">
                        <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-4">
                            <a href="registrazione.php" class="u-align-left u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-custom-font u-font-open-sans u-none u-text-custom-color-5 u-btn-2">Registrati<span style="font-size: 1.125rem;">
                      <span style="font-weight: 700;">
                        <span style="font-weight: 400;"></span>
                      </span>
                    </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>