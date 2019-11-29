<?php
    include "../../include.php";
    include "../../fonctions.php";
    session_start();
  if (!$_SESSION['login']) {

header('Location:../index.php');


} 
    $id = $_GET['id'];
    $view = "Location: ../registerPays.php";
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
    
    $country_name = get_info("pays", $id, "country_name", "id_country");
    $time_fly = get_info("pays", $id, "time_fly", "id_country");
    $average_price= get_info("pays", $id, "average_price", "id_country");
    $visa_required = get_info("pays", $id, "visa_required", "id_country");
    $vaccin_required = get_info("pays", $id, "vaccin_required", "id_country");

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
    <div class="sidenav">
         <div class="login-main-text">
            <h2> Modifier pays</h2>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
            <form action="<?php $thisedit ?>" method="post">
            <div class="form-group">
                     <label>country_name</label>
                    <input type="text" name="country_name" placeholder="<?php echo $country_name ?>"/></li>
                    </div>
                    <div class="form-group">
                     <label>time_fly</label>
                    <input type="text" name="time_fly" placeholder="<?php echo $time_fly ?>"/></li>
                    </div>
                    <div class="form-group">
                     <label>average_price</label>  
                     <input type="text" name="average_price" placeholder="<?php echo $average_price ?>">                             
                     </div>
                     <div class="form-group">
                     <label>visa_required</label> 
                    <input type="text" name="visa_required" placeholder="<?php echo $visa_required?>"/></li>
                    </div>
                    <div class="form-group">
                     <label>vaccin_required</label> 
                    <input type="text" name="vaccin_required" placeholder="<?php echo $vaccin_required ?>"/></li>
                    </div>
                
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
            </div>
         </div>
      </div>
    </body>
</html>