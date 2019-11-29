<?php
    include "../../include.php";
    include "../../fonctions.php";
    session_start();
  if (!$_SESSION['login']) {

header('Location:../index.php');


} 
    $id = $_GET['id'];
    $view = "Location: ../registerActivite.php";
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
<title>Voyage Express</title>
   <!--Made with love by Mutiullah Samim -->
   
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>

  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="card">

         <div class="card-header">
            <h3>Modification Activite</h3>
         </div>
            <div class="card-body">
            <form action="<?php $thisedit ?>" method="post">

                      <div class="input-group form-group">
                               <label><strong style="color:white;">Nom </strong></label>
                               <input type="text" name="name_activite" placeholder="<?php echo $name_activite ?>"/></li>
                      </div>

                     
                     <label><strong style="color:white;">Type</strong></label>
                     <div class="input-group form-group">
                     <select name="type_activite" placeholder="<?php echo $type_activite ?>">
                                                    <option value="musee">musée</option>
                                                    <option value="parc d attraction">parc d'attraction</option>
                                                    <option value="detente">détente</option>
                                                    <option value="bien-être">bien-être</option>
                                                    <option value="sport">sport</option>
                                                    <option value="reflexion">reflexion</option>
                                                    </select>
                    </div>

                    <div class="input-group form-group">
                     <label><strong style="color:white;">Adresse</strong></label> 
                    <input type="text" name="adress_activite" placeholder="<?php echo $adress_activite ?>">
                    </div>

                    <div class="input-group form-group">
                      <label><strong style="color:white;">Ville</strong></label> 
                          <input type="text" name="city_activite" placeholder="<?php echo $city_activite?>"/>
                    </div>


                    <div class="input-group form-group">
                     <label><strong style="color:white;">Prix</strong> </label>  
                    <input type="text" name="price_activite" placeholder="<?php echo $price_activite ?>"/>
                    </div>
                
                <div class="form-group">
                  <input type="submit" value="Modifier" class="btn float-right login_btn">
               </div>
            </form>
            </div>
            </div>
         </div>
      </div>
    </body>
</html>