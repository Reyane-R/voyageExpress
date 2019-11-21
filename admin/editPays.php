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
            edit_table("pays",$id,$k,$_POST[$k],"id_country");
        }
    }
    if($exist){
        header($view);
    }
    
    $name_country = get_info("pays", $id, "country_name", "id_country");
    $time_fly = get_info("pays", $id, "time_fly", "id_country");
    $average_price= get_info("pays", $id, "average_price", "id_country");
    $visa_required = get_info("pays", $id, "visa_required", "id_country");
    $vaccin_required = get_info("pays", $id, "vaccin_required", "id_country");

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
                    <li> <strong> Nom :</strong> <input type="text" name="country_name" placeholder="<?php echo $country_name ?>"/></li>
                    <li> <strong> Temps de vol :</strong> <input type="text" name="time_fly" placeholder="<?php echo $time_fly ?>"/></li>
                    <li> <strong> Prix moyen :</strong> <input type="text" name="average_price" placeholder="<?php echo $average_price ?>">                             
                    <li> <strong> Visa :</strong> <input type="text" name="visa_required" placeholder="<?php echo $visa_required?>"/></li>
                    <li> <strong> Vaccin :</strong> <input type="text" name="vaccin_required" placeholder="<?php echo $vaccin_required ?>"/></li>
                
                </ul>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
        </div>
    </body>
</html>