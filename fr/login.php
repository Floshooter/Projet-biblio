<?php
session_start();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];
$password = $_POST['password'];
$confPassword = $_POST["confpassword"];
$pass_crypt = md5($_POST["password"]);
$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
    include('../assets/database/db.php');
    $verify = $db->prepare("SELECT * FROM users WHERE email=? AND pw=? limit 1");
    $verify->execute(array($email, $pass_crypt));
    $user = $verify->fetchAll();
    if (count($user) > 0) {
        $_SESSION["fname_lname"] = ucfirst(strtolower($user[0]["fname"])) .
            " " . strtoupper($user[0]["lname"]);
        $_SESSION["connecter"] = "yes";
        header("location:./livres.php");
    } else
        $erreur = "Mauvais login ou mot de passe!";
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link rel="stylesheet" href="../assets/style/login.css">
        <!-- Icons -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <!-- Javascript -->
        <script src="../assets/script/app.js" defer></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <link rel="shortcut icon" href="../assets/scr/book-alt-solid-24.png" />
        <title>Le Monde du Livre - S'enregistrer</title>
    </head>
<body>
<main>
    <div class="login_main">
        <h1>Login</h1>
        <div class="erreur"><?php echo $erreur ?></div>
        <form action="" method="post">
            <div class="input_form">
                <input type="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="input_form">
                <input type="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="f-password">Mot de passe oublié ?</div>
            <input type="submit" name="valider" value="login">
            <div class="signup_link">
                Pas encore membre ? <a href="signup.php">Sign up</a>
                | <a href="index.php">Accueil</a>
            </div>
        </form>
    </div>    
</main> 
</body>
</html>

