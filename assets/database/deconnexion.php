<?php
session_start();
session_destroy();
header("location:../../fr/login.php");
?>