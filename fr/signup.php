<?php
session_start();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];
$password = $_POST['password'];
$confPassword = $_POST["confpassword"];
$pass_crypt = md5($_POST["password"]);
$valider = $_POST["inscrire"];
$erreur = "";
if (isset($valider)) {
    if (empty($lname)) {
        $erreur = "Le champs 'nom de famille' est obligatoire!";
    } elseif (empty($fname))  {
        $erreur = "Le champs 'prénom' est obligatoire!";
    } elseif (empty($birthdate)) {
        $erreur = "Le champs 'date de naissance' est obligatoire!";
    } elseif (empty($email)) {
        $erreur = "Le champs 'email' est obligatoire!";
    } elseif (empty($password)) {
        $erreur = "Le champs 'password' est obligatoire!";
    } elseif ($password != $confPassword) {
        $erreur = "Mots de passe differents!";
    } else {
        include('../assets/database/db.php');
        $verify_email = $db->prepare("SELECT id FROM users WHERE email=? limit 1");
        $verify_email->execute(array($email));
        $user_email = $verify_email->fetchAll();
        if (count($user_email) > 0)
            $erreur = "Un compte avec cette email existe déjà!";
        else {
            $ins = $db->prepare("INSERT INTO users(firstname,lastname,birthdate,email,pw,created_at) VALUES (?,?,?,?,?,current_timestamp())");
            if ($ins->execute(array($lname, $fname, $birthdate, $email, md5($password))))
                header("location: ./login.php");
        }
    }
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
        <title>Le Monde du Livre - Inscription</title>
    </head>
<body>
<main>
    <div class="login_main">
        <h1>Sign up</h1>
        <div class="erreur"><?php echo $erreur?></div>
        <form action="" method="post">
            <div class="input_form">
                <input type="text" id="fname" name="fname" required>
                <span></span>
                <label>Prénom</label>
            </div>
            <div class="input_form">
                <input type="text" id="lname" name="lname" required>
                <span></span>
                <label>Nom de famille</label>
            </div>
            <div class="input_form">
                <input type="date" id="birthdate" name="birthdate" required>
                <label for="birthdate">Date de naissance</label>
                <span></span>
            </div>
            <div class="input_form">
                <input type="email" id="email" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="input_form">
                <input type="password" id="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="input_form">
                <input type="password" id="confpassword" name="confpassword" required>
                <span></span>
                <label>Confirm Password</label>
            </div>
            <input type="submit" name="inscrire" value="Sign up">
            <div class="signup_link">
                Déjà membre ? <a href="login.php">Login</a> | 
                <a href="index.php">Accueil</a>
            </div>
        </form>
    </div>    
</main> 
</body>
</html>