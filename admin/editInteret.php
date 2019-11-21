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
            edit_table("point_interet",$id,$k,$_POST[$k],"id_interet");
        }
    }
    if($exist){
        header($view);
    }
    
    $name_activite = get_info("point_interet", $id, "name_interet", "id_interet");
    $type_activite = get_info("point_interet", $id, "type_interet", "id_interet");
    $telephone_activite = get_info("point_interet", $id, "telephone", "id_interet");
    $adress_interet = get_info("point_interet", $id, "adress_interet", "id_interet");
    $time_open = get_info("point_interet", $id, "time_open", "id_interet")
    $city_activite = get_info("point_interet", $id, "city_interet", "id_interet");

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
                    <li> <strong> Nom :</strong> <input type="text" name="name_interet" placeholder="<?php echo $name_interet ?>"/></li>
                    <li> <strong> Type du point d'intêret :</strong> 
                                        <select name="type_interet" placeholder="<?php echo $type_interet ?>">
                                                    <option value="police">police</option>
                                                    <option value="hopital">hopital</option>
                                                    <option value="gendarmerie">gendarmerie</option>
                                                    <option value="banque">banque</option>
                                                    <option value="station service">station service</option>
                                                    <option value="centre commercial">centre commercial</option>
                                                    </select></li>
                    <li> <strong> Téléphone :</strong> <input type="text" name="telephone_activite" placeholder="<?php echo $telephone_activite ?>"></li>   
                    <li> <strong> Adresse :</strong> <input type="text" name="adress_interet" placeholder="<?php echo $adress_interet ?>"></li>                          
                    <li> <strong> Horaires :</strong> <input type="text" name="time_open" placeholder="<?php echo $time_open?>"/></li>
                    <li> <strong> Ville :</strong> <input type="text" name="point_interet" placeholder="<?php echo $point_interet ?>"/></li>
                
                </ul>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
        </div>
    </body>
</html>