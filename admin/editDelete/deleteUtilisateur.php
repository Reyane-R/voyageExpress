<?php
    include "../../include.php";
$id = $_GET['id'];
$result = pg_query( "DELETE FROM utilisateur WHERE login=$id");
header("Location:../registerUtilisateur.php");
?>