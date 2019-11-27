<?php
    include "../include.php";
    include "../fonctions.php";
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
            edit_table("activite",$id,$k,$_POST[$k],"id_activite");
        }
    }
    if($exist){
        header($view);
    }
    
    $name_activite = get_info("activite", $id, "name_activite", "id_activite");
    $type_activite = get_info("activite", $id, "type_activite", "id_activite");
    $adress_activite = get_info("activite", $id, "adress_activite", "id_activite");
    $city_activite = get_info("activite", $id, "city_activite", "id_activite");
    $price_activite = get_info("activite", $id, "price_activite", "id_activite");

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
                    <li> <strong> Nom :</strong> <input type="text" name="name_activite" placeholder="<?php echo $name_activite ?>"/></li>
                    <li> <strong> Type de l'activité :</strong> <select name="type_activite" placeholder="<?php echo $type_activite ?>">
                                                    <option value="musee">musée</option>
                                                    <option value="parc d attraction">parc d'attraction</option>
                                                    <option value="detente">détente</option>
                                                    <option value="bien-être">bien-être</option>
                                                    <option value="sport">sport</option>
                                                    <option value="reflexion">reflexion</option>
                                                    </select></li>
                    <li> <strong> Adresse :</strong> <input type="text" name="adress_activite" placeholder="<?php echo $adress_activite ?>"></li>                            
                    <li> <strong> Ville :</strong> <input type="text" name="city_activite" placeholder="<?php echo $city_activite?>"/></li>
                    <li> <strong> Prix :</strong> <input type="text" name="price_activite" placeholder="<?php echo $price_activite ?>"/></li>
                
                </ul>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
        </div>
    </body>
</html>