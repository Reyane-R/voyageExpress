<?php
    include "../include.php";
$id = $_GET['id'];
$result = pg_query( "DELETE FROM activite WHERE id_activite=$id");
header("Location:admin.php");
?>