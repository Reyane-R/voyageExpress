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
        <link rel="stylesheet" type="text/css" href="styles.css">
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
                     <label>Name stuff</label>
                     <input type="text" name="name_stuff" placeholder="<?php echo $name_stuff ?>"/>
                     </div>
                    <div class="form-group">
                     <label>Type</label>
                     <select name="type_stuff" placeholder="<?php echo $type_stuff ?>">
                                                    <option value="hebergement">hebergement</option>
                                                    <option value="locomotion">locomotion</option>
                                                    <option value="pays">pays</option>
                                                    </select>
                                                    </div>
                    <div class="form-group">
                     <label>Price stuff</label>
                 <input type="text" name="price_stuff" placeholder="<?php echo $price_stuff ?>"> 
                    </div>                 
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
            </div>
         </div>
      </div>
    </body>
</html>