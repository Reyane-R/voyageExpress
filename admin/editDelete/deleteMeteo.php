<?php
    include "../../include.php";
$id = $_GET['id'];
$result = pg_query( "DELETE FROM meteo WHERE id_meteo=$id");
header("Location:../registerMeteo.php");
?>