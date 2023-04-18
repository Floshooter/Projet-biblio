<?php
define('dbhost','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname','tpbiblio');

try {

    $dsn = "mysql:dbname=".dbname.";host=".dbhost;
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $db = new  PDO($dsn, dbuser, dbpass, $options);

    echo "Nous sommes bien connectés <br><br>";

    switch($_GET['traitement']){
        case "supprimer":
            $delId = $_GET['id'];
            $deletestmt = "DELETE FROM `users` WHERE id=$delId";
            $pdostmt = $db->exec($deletestmt);

            if ($pdostmt){
                echo "Suppression réussie !";
            } else {
                print_r($db->erroInfo());
                exit();
            }
            header('Location: ../../fr/affichage.php');
            break;

    }
}catch (PDOException $e) {
    die("Erreur : ". $e->getMessage());
}
?>

<!-- switch($_GET['traitement']){
        case "inscription":
            $addFname = $_POST['fname'];
            $addLname = $_POST['lname'];
            $addBirthdate = $_POST['birthdate'];
            $addEmail = $_POST['email'];
            $addPassword = $_POST['password'];
            $cout = ['cost' => 12];
            $hash = password_hash($addPassword, PASSWORD_BCRYPT, $cout);

            $addusers = "INSERT INTO users(firstname,lastname,birthdate,email,pw,created_at) VALUES ('$addFname','$addLname','$addBirthdate','$addEmail','$hash',current_timestamp())";
            $pdostatement = $db->exec($addusers);

            if ($pdostatement) {
                echo "Ajout réussi !";
            } else {
                print_r($db->errorInfo());
                exit();
            }
            header('Location: ../../fr/affichage.php');
            break;
        case "supprimer":
            $delId = $_GET['id'];
            $deletestmt = "DELETE FROM `users` WHERE id=$delId";
            $pdostmt = $db->exec($deletestmt);

            if ($pdostmt){
                echo "Suppression réussie !";
            } else {
                print_r($db->erroInfo());
                exit();
            }
            header('Location: ../../fr/affichage.php');
            break;
        case "modifier":
            $upId = $_POST['id'];
            $upFname = $_POST['firstname'];
            $upLname = $_POST['lastname'];
            $upBirthdate = $_POST['birthdate'];
            $upEmail = $_POST['email'];
            $upPassword = $_POST['pw'];
            
            $req ="UPDATE users SET firstname='$upFname',lastname='$upLname',birthdate='$upBirthdate',email='$upEmail',pw='$upPassword' WHERE id=$upId";
            $db->query($req);
            header('Location: ../../fr/affichage.php');
            break;
    } -->