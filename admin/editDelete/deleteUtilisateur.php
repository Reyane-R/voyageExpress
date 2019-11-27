<?php
    include "../../include.php";
$login = $_GET['login'];
$result = pg_query( "DELETE FROM utilisateur WHERE login= '$login' ");
header("Location:../registerUtilisateur.php");
?>