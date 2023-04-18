<?php
    require "../assets/template/header.php";
?>

<?php
define('dbhost','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname','tpbiblio');

try {

    $dsn = "mysql:dbname=".dbname.";host=".dbhost;
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $db = new  PDO($dsn, dbuser, dbpass, $options);
    
    $req = "SELECT * FROM users";
    $resultats = $db->query($req);
    ?>
    <h1 class="db-links">Liste des utilisateurs inscris sur le site.</h1>
    <div class="d-users">
        <?php 
        foreach($resultats->fetchAll() as $userlist){
            echo 
            "ID : " .$userlist['id']. "<br>" .
            "Prénom : " .$userlist['firstname']. "<br>" .
            "Nom : " .$userlist['lastname']. "<br>" .
            "Email : " .$userlist['email']. "<br>" .
            "Password : " .$userlist['pw']. "<br>" .
            "Crée le : " .$userlist['created_at'];
            echo "<br>";
            ?> <a class="db-links" href="../assets/database/db.php?traitement=modifier">Modifier</a> | <a class="db-links" href="../assets/database/db.php?traitement=supprimer&id=<?=$userlist['id'] ?>">Supprimer</a><br> <?php
        } ?>
    </div> <?php

}catch (PDOException $e) {
    die("Erreur : ". $e->getMessage());
}

?>
<?php
    require "../assets/template/footer.php";
?>