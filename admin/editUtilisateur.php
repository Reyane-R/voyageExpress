<?php
    include "../include.php";
    session_start();
     if (!$_SESSION['login']) {

header('Location:../index.php');


} 
    $id = $_GET['login'];
    $view = "Location: ./admin.php";
    $thisedit = "./edit.php?login=$id";
    $exist = false;
    $delete = "./delete.php?login=$id";
    $_POST = array_filter($_POST);
    foreach($_POST as $k => $v){
        if(isset($_POST[$k])){
            $exist = true;
            edit_table("utilisateur",$id,$k,$_POST[$k],"login");
        }
    }
    if($exist){
        header($view);
    }
    
    $login = get_info("utilisateur", $id, "login", "login");
    $password  =  get_info("utilisateur", $id, "password", "login");
    $email= get_info("utilisateur", $id, "email", "login");
    $typeaccount = get_info("utilisateur", $id, "type_account","login");   
   
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
                                <h1><a >VOYAGE EXPRESS </a></h1>
                            </div>
                
            <h2 class="gradient-8">Modification </h2>
            <form action="<?php $thisedit ?>" method="post">
                <ul class="center">
                    <li> <strong> Login :</strong> <input type="text" name="login" placeholder="<?php echo $login ?>"/></li>
                    <li> <strong> Password  :</strong> <input type="password" name="password" placeholder="<?php echo $password ?>"/></li>
                    <li> <strong> Email :</strong> <input type="text" name="email" placeholder="<?php echo $email  ?>"/></li>
                    <li> <strong> Type :</strong>  <select name="type_account" placeholder="<?php echo $type_account ?>">
                                                    <option value="utilisateur">utilisateur</option>
                                                    <option value="administrateur">administrateur</option>
                                                    </select></li>

                
                </ul>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
        </div>
    </body>
</html>