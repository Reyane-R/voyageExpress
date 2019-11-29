<?php
    include "../../include.php";
    include "../../fonctions.php";
    session_start();
      if (!$_SESSION['login']) {

header('Location:../index.php');


} 
    $id = $_GET['id'];
    $view = "Location: ../registerHebergement.php";
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
            <h3>Modification Hebergement</h3>
         </div>
            <div class="card-body">
            <form action="<?php $thisedit ?>" method="post">

                    <div class="input-group form-group">
                     <strong style="color:white;">hebergement_name</strong>
                     <input type="text" name="hebergement_name" placeholder="<?php echo $hebergement_name ?>"/>
                     </div>

                     <div class="input-group form-group">
                     <strong style="color:white;">type_hebergement</strong>

                     <select name="type_hebergement" placeholder="<?php echo $type_hebergement ?>">
                                                    <option value="hotel">hotel</option>
                                                    <option value="camping">camping</option>
                                                    <option value="palace">palace</option>
                                                    <option value="auberge de jeunesse">auberge de jeunesse</option>
                                                    <option value="appartement">appartement</option>
                                                    <option value="airbnb">airbnb</option>
                                                    <option value="maison">maison</option>
                                                    </select>
                    </div>

                    <div class="input-group form-group">
                     <strong style="color:white;">city_hebergement</strong>
                     <input type="text" name="city_hebergement" placeholder="<?php echo $city_hebergement  ?>"/>
                     </div>

                     <div class="input-group form-group">
                        <strong style="color:white;">adress_hebergement</strong>
                        <input type="text" name="adress_hebergement" placeholder="<?php echo $adress_hebergement ?>"/>
                    </div>

                    <div class="input-group form-group">
                     <strong style="color:white;">average_price</strong>
                    <input type="text" name="average_price" placeholder="<?php echo $average_price  ?>"/>
                    </div>

                <div class="form-group">
                  <input type="submit" value="Modifier" class="btn float-right login_btn">
               </div>
            </form>
            </div>
         </div>
      </div>
    </body>
</html>