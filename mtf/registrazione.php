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

if (isset($_POST['registrati'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $regione = $_POST['regioni'];
}
if(!empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['password']) && !empty($_POST['username'])) {

    if (ControlloUsername($connessione, "SELECT username FROM account WHERE username = '$username'") && ControlloUsername($connessione, "SELECT username FROM capi_area  WHERE username = '$username'") && ControlloUsername($connessione, "SELECT username FROM referenti  WHERE username = '$username'")) {
        $connessione->query("INSERT INTO account(username,nome,cognome,password,nome_regione) VALUES('$username','$nome','$cognome','$password','$regione')");
        $connessione->query("UPDATE regioni SET disponibilita = 0 WHERE nome = '$regione'");
        session_start();
        $_SESSION['registrato'] = true;
        header("Location: login.php");
    } else {
        echo "<div class='alert'><div class='closebtn' onclick=this.parentElement.style.display='none';>&times;</div><strong>Username già esistente</strong> Riprova </div>";
    }
}

?>

<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/registrazione-style.css" media="screen">
</head>
<body class="u-body u-xl-mode">
<section class="u-clearfix u-section-1" id="sec-ae10">
    <div class="u-align-left u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-expanded-width-xs u-group u-opacity u-opacity-75 u-radius-30 u-shape-round u-white u-group-1">
            <div class="u-container-layout u-valign-top u-container-layout-1">
                <div class="u-align-left u-container-style u-custom-color-5 u-expanded-width u-group u-shape-rectangle u-group-2" style="border-top-right-radius: 30px; border-top-left-radius: 30px">
                    <div class="u-container-layout u-container-layout-2">
                        <img class="u-image u-image-default u-image-1" src="imgs/logo-lindt.png" alt="" data-image-width="1200" data-image-height="331">
                    </div>
                </div>
                <h2 class="u-text u-text-default u-text-palette-5-dark-2 u-text-1">Crea un nuovo account</h2>
                <div class="u-form u-form-1">
                    <form action="" method="POST" class="u-clearfix u-form-spacing-30 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                        <div class="u-form-group u-form-name">
                            <label for="name-6c9d" class="u-form-control-hidden u-label u-label-1"></label>
                            <!-- nome utente-->
                            <input type="text" placeholder="Username" id="name-6c9d" name="username" class="u-input u-input-rectangle u-radius-15 u-white u-input-1" required>
                        </div>
                        <div class="u-form-group u-form-group-2">
                            <label for="text-7194" class="u-form-control-hidden u-label u-label-2"></label>
                            <!-- nome -->
                            <input type="text" placeholder="Nome" id="text-7194" name="nome" class="u-input u-input-rectangle u-radius-15 u-white u-input-2" required>
                        </div>
                        <div class="u-form-group u-form-group-3">
                            <label for="text-1329" class="u-form-control-hidden u-label u-label-3"></label>
                            <!-- cognome -->
                            <input type="text" placeholder="Cognome" id="text-1329" name="cognome" class="u-input u-input-rectangle u-radius-15 u-white u-input-3" required>
                        </div>
                        <div class="u-form-group u-form-group-4">
                            <label for="text-85eb" class="u-form-control-hidden u-label u-label-4"></label>
                            <!-- password -->
                            <input type="password" placeholder="Password" id="text-85eb" name="password" class="u-input u-input-rectangle u-radius-15 u-white u-input-4" required>
                        </div>
                        <div class="u-form-group u-form-select u-form-group-5">
                            <label for="select-0a01" class="u-form-control-hidden u-label u-label-5"></label>
                            <div class="u-form-select-wrapper">
                                <?php
                                $sql = "SELECT nome, disponibilita FROM regioni";
                                $app = mysqli_query($connessione, $sql);
                                echo '<select id="select-0a01" name="regioni" class="u-input u-input-rectangle u-radius-15 u-white u-input-5" required>';
                                while ($riga = $app -> fetch_assoc())
                                {
                                    if($riga["disponibilita"] == "1")
                                        echo '<option>' . $riga["nome"] . '</option>';
                                }
                                echo '</select>';
                                ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                            </div>
                        </div>
                        <div class="u-align-right u-form-group u-form-submit">
                            <button type="submit" value="submit" name="registrati" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-5 u-radius-20 u-text-white u-btn-1">Registrati</button>
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
                            <h6 class="u-align-center-sm u-align-center-xs u-align-right-lg u-align-right-md u-align-right-xl u-custom-font u-font-open-sans u-text u-text-palette-5-dark-2 u-text-2">Possiedi già un account?</h6>
                        </div>
                    </div>
                    <div class="u-container-style u-layout-cell u-size-25 u-layout-cell-2">
                        <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-4">
                            <a href="login.php" class="u-align-left u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-custom-font u-font-open-sans u-none u-text-custom-color-5 u-btn-2">Accedi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

<?php

function ControlloUsername($connessione, $query) {
    $ris = $connessione->query("$query");
    if($ris->num_rows > 0) {
        return false;
    } else { return true; }
}

?>