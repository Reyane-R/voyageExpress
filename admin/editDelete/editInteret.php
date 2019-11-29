<?php
    include "../../include.php";
    include "../../fonctions.php";
    session_start();
  if (!$_SESSION['login']) {

header('Location:../index.php');


} 
    $id = $_GET['id'];
    $view = "Location: ../registerInteret.php";
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
    
    $name_interet = get_info("point_interet", $id, "name_interet", "id_interet");
    $type_interet = get_info("point_interet", $id, "type_interet", "id_interet");
    $telephone = get_info("point_interet", $id, "telephone", "id_interet");
    $adress_interet = get_info("point_interet", $id, "adress_interet", "id_interet");
    $time_open = get_info("point_interet", $id, "time_open", "id_interet");
    $city_interet = get_info("point_interet", $id, "city_interet", "id_interet");

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Login Page</title>
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
                    <h3>Modification Point d'intérêt</h3>
                </div>

            <div class="card-body">
            <form action="<?php $thisedit ?>" method="post">
                <div class="input-group form-group">
                     <strong style="color:white;">Nom</strong>
                     <input type="text" name="name_interet" placeholder="<?php echo $name_interet ?>"/>
                </div>
                     <div class="input-group form-group">
                     <strong style="color:white;">Type</strong>
                                        <select name="type_interet" placeholder="<?php echo $type_interet ?>">
                                                    <option value="police">police</option>
                                                    <option value="hopital">hopital</option>
                                                    <option value="gendarmerie">gendarmerie</option>
                                                    <option value="banque">banque</option>
                                                    <option value="station service">station service</option>
                                                    <option value="centre commercial">centre commercial</option>
                                                    </select>
                    </div>

                    <div class="input-group form-group">
                        <strong style="color:white;">Telephone</strong>
                        <input type="text" name="telephone" placeholder="<?php echo $telephone ?>">   
                    </div>

                     <div class="input-group form-group">
                        <strong style="color:white;">Adresse</strong>
                        <input type="text" name="adress_interet" placeholder="<?php echo $adress_interet ?>">                          
                     </div>

                     <div class="input-group form-group">
                        <strong style="color:white;">Horaire</strong>
                        <input type="text" name="time_open" placeholder="<?php echo $time_open?>"/>
                     </div>

                     <div class="input-group form-group">
                        <strong style="color:white;">Ville</strong>
                     <input type="text" name="city_interet" placeholder="<?php echo $city_interet ?>"/>
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