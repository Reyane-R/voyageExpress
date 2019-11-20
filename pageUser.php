<?php
include'include.php';

session_start();


  if (!$_SESSION['login']) {

header('Location:index.php');
}

?>
<!DOCTYPE>
<html>
<head>
<title>UTILISATEUR</title>
</head>
<body>
	<h1 stlye='color: blue'> BONJOUR UTILISATEUR </h1>
</body>
</html>

