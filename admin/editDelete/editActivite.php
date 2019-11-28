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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style2.css">


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
                     <label>User Name</label>
                     <input type="text" name="name_activite" placeholder="<?php echo $name_activite ?>"/></li>
                     <div class="form-group">
                     <label>User Name</label>
                     <select name="type_activite" placeholder="<?php echo $type_activite ?>">
                                                    <option value="musee">musée</option>
                                                    <option value="parc d attraction">parc d'attraction</option>
                                                    <option value="detente">détente</option>
                                                    <option value="bien-être">bien-être</option>
                                                    <option value="sport">sport</option>
                                                    <option value="reflexion">reflexion</option>
                                                    </select>
                    <div class="form-group">
                     <label>User Name</label> 
                    <input type="text" name="adress_activite" placeholder="<?php echo $adress_activite ?>">                          
                    <div class="form-group">
                     <label>User Name</label> 
                    <input type="text" name="city_activite" placeholder="<?php echo $city_activite?>"/>
                    <div class="form-group">
                     <label>User Name</label>  
                    <input type="text" name="price_activite" placeholder="<?php echo $price_activite ?>"/>
                
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
            </div>
         </div>
      </div>
    </body>
</html>