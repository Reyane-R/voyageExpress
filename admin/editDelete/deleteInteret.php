<?php
    include "../../include.php";
$id = $_GET['id'];
$result = pg_query( "DELETE FROM point_interet WHERE id_interet=$id");
header("Location:../registerInteret.php");
?>