<?php
session_start();
if ($_SESSION["connecter"] != "yes") {
    header("location:../../fr/login.php");
    exit();
}
if (date("H") < 18)
    $bienvenue = "Bonjour et bienvenue " .
        $_SESSION["prenom_nom"];
else
    $bienvenue = "Bonsoir et bienvenue " .
        $_SESSION["prenom_nom"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link rel="stylesheet" href="../style/style.css">
        <!-- Icons -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <!-- Javascript -->
        <script src="../script/app.js" defer></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!-- Logo et titre -->
        <link rel="shortcut icon" href="../scr/book-alt-solid-24.png" />
        <title>Le Monde du Livre</title>
</head>
<body onLoad="document.fo.login.focus()">
    <h2><?php echo $bienvenue ?></h2>
    <a href="deconnexion.php">Se déconnecter</a>
</body>
</html>



