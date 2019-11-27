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
            edit_table("locomotion",$id,$k,$_POST[$k],"id_locomotion");
        }
    }
    if($exist){
        header($view);
    }
    
    $locomotion_name = get_info("locomotion", $id, "locomotion_name", "id_locomotion");
    $type_locomotion = get_info("locomotion", $id, "type_locomotion", "id_locomotion");
    $price_locomotion = get_info("locomotion", $id, "price_locomotion", "id_locomotion");
    $horaire_locomotion = get_info("locomotion", $id, "horaire_locomotion", "id_locomotion");

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
                    <li> <strong> Nom :</strong> <input type="text" name="locomotion_name" placeholder="<?php echo $locomotion_name ?>"/></li>
                    <li> <strong> Type de moyen de locomotion :</strong>  <select name="type_locomotion" placeholder="<?php echo $type_locomotion ?>">
                                                    <option value="prive">privé</option>
                                                    <option value="public">public</option>
                                                    </select></li>
                    <li> <strong> Prix :</strong> <input type="text" name="price_locomotion" placeholder="<?php echo $price_locomotion ?>"> </li>   
                    <li> <strong> Horaires :</strong> <input type="text" name="horaire_locomotion" placeholder="<?php echo $horaire_locomotion ?>"></li>                            
                
                </ul>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
        </div>
    </body>
</html>