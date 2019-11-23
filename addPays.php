<?php
    include "../include.php";
       session_start();
  if (!$_SESSION['login']) {

header('Location:../FormulaireAdmin.php');


} 
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
                
            <h2 class="gradient-8">Ajouter un Pays </h2>
            <form action="./addPays.php" method="post">
                <ul class="center">
                    <li> <strong>name_country :</strong> <input type="text" name="name"/></li>
                    <li> <strong>time_fly :</strong> <input type="text" name="time" placeholder=" De type : 'HH:MM:SS'"/></li>
                    <li> <strong>average_price :</strong> <input type="text" name="price" placeholder=" Entrez un entier"/></li>
                    <li> <strong>visa_required :</strong> <input type="text" name="visa"/></li>
                    <li> <strong>vaccin_required :</strong> <input type="text" name="vaccin"/></li>
                </ul>
                <div class="center">
                <input type="submit" name="create_pays" value="Créer un pays ">
                </div>
            </form>
            <?php
                echo create_pays();
            ?>
        </div>
        <a href="pays.php">Retourner à la page Pays</a>
    </body>
</html>