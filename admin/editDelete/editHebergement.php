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
            edit_table("hebergement",$id,$k,$_POST[$k],"id_hebergement");
        }
    }
    if($exist){
        header($view);
    }
    
    $hebergement_name = get_info("hebergement", $id, "hebergement_name", "id_hebergement");
    $type_hebergement = get_info("hebergement", $id, "type_hebergement", "id_hebergement");
    $city_hebergement = get_info("hebergement", $id, "city_hebergement", "id_hebergement");
    $adress_hebergement = get_info("hebergement", $id, "adress_hebergement", "id_hebergement");
    $average_price = get_info("hebergement", $id, "average_price", "id_hebergement");

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
                                <h1><a>VOYAGE EXPRESS </a></h1>
                            </div>
                
            <h2 class="gradient-8"> Modification </h2>
            <form action="<?php $thisedit ?>" method="post">
                <ul class="center">
                    <li> <strong> Nom :</strong> <input type="text" name="hebergement_name" placeholder="<?php echo $hebergement_name ?>"/></li>
                    <li> <strong> Type :</strong> <select name="type_hebergement" placeholder="<?php echo $type_hebergement ?>">
                                                    <option value="hotel">hotel</option>
                                                    <option value="camping">camping</option>
                                                    <option value="palace">palace</option>
                                                    <option value="auberge de jeunesse">auberge de jeunesse</option>
                                                    <option value="appartement">appartement</option>
                                                    <option value="airbnb">airbnb</option>
                                                    <option value="maison">maison</option>
                                                    </select></li>
                   
                    <li> <strong> Ville :</strong> <input type="text" name="city_hebergement" placeholder="<?php echo $city_hebergement  ?>"/></li>

                    <li> <strong> Adresse :</strong> <input type="text" name="adress_hebergement" placeholder="<?php echo $adress_hebergement ?>"/></li>

                    <li> <strong> Prix Moyen :</strong> <input type="text" name="average_price" placeholder="<?php echo $average_price  ?>"/></li>

                </ul>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
        </div>
    </body>
</html>