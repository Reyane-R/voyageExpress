<?php
    include "../../include.php";
$id = $_GET['id'];
$result = pg_query( "DELETE FROM locomotion WHERE id_locomotion=$id");
header("Location:../registerLocomotion.php");
?>