<?php
    include "../include.php";
$id = $_GET['id'];
$result = pg_query( "DELETE FROM hebergement WHERE id_locomotion=$id");
header("Location:admin.php");
?>