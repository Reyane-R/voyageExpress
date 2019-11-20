<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/* LA FONCTION DE CONNEXION */


function connect_account(){

	session_start();
	$return = null;
	if(isset($_POST['connect_account'])){
		$login = htmlentities(trim($_POST['login']));
		$password = htmlentities(trim($_POST['password']));
		$typeaccount = $_POST['type'];

/* Connexion utilisateur */
		if(($login!="" && $password!="") && ($typeaccount == 'utilisateur')) {

			$query = " SELECT * FROM utilisateur WHERE login = '$login' AND password = '$password'AND type_account = '$typeaccount' ";
			$results = pg_query($query);
			/* Pour les utilisateurs */
			if ((pg_affected_rows($results) == 1)) {
                  $_SESSION['login']=$login;
                  header("Location:pageUser.php");
                }

                else $return = 'Echec de la connexion, login , mot de passe ou type de compte incorrect.' .pg_last_error();
            }
            else $return = 'Veuillez remplir les champs requis.';
/* Connexion administrateur */

         	if(($login!="" && $password!="") && ($typeaccount == 'administrateur')){
         	$query = " SELECT * FROM utilisateur WHERE login = '$login' AND password = '$password'AND type_account = '$typeaccount' ";
			$results = pg_query($query);
			if ((pg_affected_rows($results) == 1)) {
                  $_SESSION['login']=$login;
                  header("Location:pageAdmin.php");
                }

                else $return = 'Echec de la connexion, login , mot de passe ou type de compte incorrect.' .pg_last_error();
            }
            else $return = 'Veuillez remplir les champs requis.';

         
	}

	$return = '<p style="color: red;">' .$return. '</p>';
    return $return;
}


/* LA FONCTION DE CREATION D'UN COMPTE */

function add_account(){
          $return = null;
          if(isset($_POST['add_account'])){
            $email = $_POST['mail'];
            $login = htmlentities(trim($_POST['login']));
            $password = htmlentities(trim($_POST['password']));
            $type_account = $_POST['typeaccount'];
              if($email!="" && $login!="" && $mot_de_passe!="") {
              
                $query = "INSERT INTO utilisateur (login, password, type_account, email) VALUES ('$login' , '$mot_de_passe' , '$type_account' , '$email')";
                  
                $results = pg_query($query);
                if (pg_affected_rows($results) == 1) 
                  $return = 'Votre compte a été créé avec succès.';
                else 
                  $return = 'Echec de la création du compte' .pg_last_error();

              } 

              else {
                $return = 'Veuillez remplir les champs requis.';
              }
          }
          $return = '<p style="color: red;">' .$return. '</p>';
          return $return;
}



/* LES FONCTIONS D'AJOUTS */

/*PAYS*/

function add_country(){
	$return = null;
	if (isset($_POST['add_country'])) {
		$country_name = $_POST['name'];
		$time_fly = $_POST['time'];
		$average_price = $_POST['price'];
		$visa_required = $_POST['visa'];
		$vaccin_required = $_POST['vaccin'];

		if($country_name!="" && $time_fly != "" && $average_price != "" && $visa_required != "" && $vaccin_required != ""){

			$query = " INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('$country_name', '$time_fly', '$average_price', 'visa_required', 'vaccin_required')";

			$results = pg_query($query);
			if (pg_affected_rows($results) == 1) 
                $return = 'Création du pays réussie.' ;
            else
                 $return = 'Erreur lors de la création du pays.' .pg_last_error();
        } 
        else {
              $return = 'Veuillez remplir les champs requis.';
        }
    }
    $return = '<p style="color: red;">' .$return. '</p>';
    return $return;
              
}

/*HEBERGEMENTS*/

function add_hebergement(){
	$return = null;
	if(isset($_POST['add_hebergement'])){
		$hebergement_name = $_POST['name'];
		$type_hebergement = $_POST['type'];
		$city_hebergement = $_POST['city'];
		$adress_hebergement = $_POST['adress'];
		$average_price = $_POST['price'];

		if($hebergement_name != "" && $type_hebergement != "" && $city_hebergement !="" && $adress_hebergement !="" && $average_price !=""){

			$query = " INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price) VALUES ('$hebergement_name', $type_hebergement', $city_hebergement', '$adress_hebergement', '$average_price')";

			$results = pg_query($query);
			if (pg_affected_rows($results) == 1) 
				 $return = 'Création de l hébergement réussie.' ;
            else
                 $return = 'Erreur lors de la création de l hébergement.' .pg_last_error();
        } 
        else {
              $return = 'Veuillez remplir les champs requis.';
        }
    }
    $return = '<p style="color: red;">' .$return. '</p>';
    return $return;
              
}
			
























?>