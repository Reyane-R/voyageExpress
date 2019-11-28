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
    <div class="sidenav">
         <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
            <form action="<?php $thisedit ?>" method="post">
                    <div class="form-group">
                     <label>hebergement_name</label>
                     <input type="text" name="hebergement_name" placeholder="<?php echo $hebergement_name ?>"/>
                     </div>
                     <div class="form-group">
                     <label>type_hebergement</label>
                     </div>
                     <select name="type_hebergement" placeholder="<?php echo $type_hebergement ?>">
                                                    <option value="hotel">hotel</option>
                                                    <option value="camping">camping</option>
                                                    <option value="palace">palace</option>
                                                    <option value="auberge de jeunesse">auberge de jeunesse</option>
                                                    <option value="appartement">appartement</option>
                                                    <option value="airbnb">airbnb</option>
                                                    <option value="maison">maison</option>
                                                    </select></div>
                    <div class="form-group">
                     <label>city_hebergement</label>
                     <input type="text" name="city_hebergement" placeholder="<?php echo $city_hebergement  ?>"/>
                     </div>
                     <div class="form-group">
                     <label>adress_hebergement</label>
                    <input type="text" name="adress_hebergement" placeholder="<?php echo $adress_hebergement ?>"/>
                    </div>
                    <div class="form-group">
                     <label>average_price</label>
                    <input type="text" name="average_price" placeholder="<?php echo $average_price  ?>"/>
                    </div>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
            </div>
         </div>
      </div>
    </body>
</html>