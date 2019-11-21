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
            edit_table("price",$id,$k,$_POST[$k],"id_stuff");
        }
    }
    if($exist){
        header($view);
    }
    
    $name_stuff = get_info("price", $id, "name_stuff", "id_stuff");
    $type_stuff = get_info("price", $id, "type_stuff", "id_stuff");
    $price_stuff = get_info("price", $id, "price_stuff", "id_stuff");

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
                    <li> <strong> Nom :</strong> <input type="text" name="name_stuff" placeholder="<?php echo $name_stuff ?>"/></li>
                    <li> <strong> Type d'objet :</strong>  <select name="type_stuff" placeholder="<?php echo $type_stuff ?>">
                                                    <option value="hebergement">hebergement</option>
                                                    <option value="locomotion">locomotion</option>
                                                    <option value="pays">pays</option>
                                                    </select></li>
                    <li> <strong> Prix :</strong> <input type="text" name="price_stuff" placeholder="<?php echo $price_stuff ?>"></li>                   
                </ul>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
        </div>
    </body>
</html>