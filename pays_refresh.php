<?php

// PDO connect *********
function connect() {
    return new PDO('pgsql:host=10.40.128.23;dbname=db2019l3i_rremache', 'y2019l3i_rremache', 'A123456*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM pays WHERE country_name LIKE (:keyword)";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$country_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['country_name']);
	// add new option
    echo '<li onclick="set_item(\''.$rs['country_name'].'\')">'.$country_name.'</li>';
}
?>