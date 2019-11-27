<?php
    include "../../include.php";
$id = $_GET['id'];
$result = pg_query( "DELETE FROM price WHERE id_stuff=$id");
header("Location:../registerPrice.php");
?>