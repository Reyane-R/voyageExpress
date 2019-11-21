<?php
    include "../include.php";
    session_start();
  if (!$_SESSION['login']) {

header('Location:../index.php');


} 
    $id = $_GET['id'];
    $view = "Location: ./admin.php";
    $thisedit = "./edit.php?id=$id";
    $exist = false;
    $delete = "./delete.php?id=$id";
    $_POST = array_filter($_POST);
    foreach($_POST as $k => $v){
        if(isset($_POST[$k])){
            $exist = true;
            edit_table("meteo",$id,$k,$_POST[$k],"id_meteo");
        }
    }
    if($exist){
        header($view);
    }
    
    $city_meteo = get_info("meteo", $id, "city_meteo", "id_meteo");
    $temps_meteo = get_info("meteo", $id, "temps_meteo", "id_meteo");
    $temperature = get_info("meteo", $id, "temperature", "id_meteo");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../css/main.css">


        <title>Voyage Express</title>
    </head>
    <body>
         <div class="bloc">
                                <h1><a> VOYAGE EXPRESS </a></h1>
                            </div>
                
            <h2 class="gradient-8"> Modification </h2>
            <form action="<?php $thisedit ?>" method="post">
                <ul class="center">
                    <li> <strong> Ville :</strong> <input type="text" name="city_meteo" placeholder="<?php echo $city_meteo ?>"/></li>
                    <li> <strong> Temps :</strong>  <select name="temps_meteo" placeholder="<?php echo $temps_meteo ?>">
                                                    <option value="ensoleille">ensolleilé</option>
                                                    <option value="nuageux">nuageux</option>
                                                    <option value="pluvieux">pluvieux</option>
                                                    <option value="vent violent">vent violent</option>
                                                    <option value="humide">humide</option>
                                                    </select></li>

                    <li> <strong> Température :</strong> <input type="text" name="temperature" placeholder="<?php echo $temperature ?>"></li>   
                                                 
                
                </ul>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
        </div>
    </body>
</html>