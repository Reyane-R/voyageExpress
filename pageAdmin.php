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
<title>ADMIN</title>
</head>
<body>
	<h1 stlye='color: blue'> BONJOUR ADMINISTRATEUR </h1>
</body>
</html>
