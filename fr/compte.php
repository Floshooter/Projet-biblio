<?php
    if (isset($_POST['submit']) && !empty($_POST['titre'])) {
        $err = 'Renseignez un titre!';
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <metaviewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link rel="stylesheet" href="../assets/style/login.css">
        <!-- Icons -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <!-- Javascript -->
        <script src="../assets/script/app.js" defer></script>
        <title>Bibliothèque - Login</title>
    </head>
<body>
<main>
    <div class="login_main">
        <h1>Login</h1>
        <form action="../assets/database/db.php?traitement=modifier" method="post">
            <div class="input_form">
                <input type="text" id="fname" name="fname">
                <span></span>
                <label>Prénom</label>
            </div>
            <div class="input_form">
                <input type="text" id="lname" name="lname">
                <span></span>
                <label>Nom de famille</label>
            </div>
            <div class="input_form">
                <input type="date" id="birthdate" name="birthdate">
                <label for="birthdate">Date de naissance</label>
                <span></span>
            </div>
            <div class="input_form">
                <input type="email" id="email" name="email">
                <span></span>
                <label>Email</label>
            </div>
            <div class="input_form">
                <input type="password" id="password" name="password">
                <span></span>
                <label>Password</label>
            </div>
            <div class="input_form">
                <input type="password" id="confpassword" name="confpassword">
                <span></span>
                <label>Confirm Password</label>
            </div>
            <input type="submit" value="login">
            <div class="signup_link">| 
                <a href="index.php">Accueil</a>
            </div>
        </form>
    </div>    
</main> 
</body>
</html>