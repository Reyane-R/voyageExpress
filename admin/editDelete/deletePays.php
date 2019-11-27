<?php
    include "../../include.php";
$id = $_GET['id'];
$result = pg_query( "DELETE FROM pays WHERE id_country=$id");
header("Location:../registerPays.php");
?>