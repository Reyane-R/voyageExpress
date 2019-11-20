<?php


/* LA FONCTION DE CONNEXION */


function connect_account(){

	session_start();
	$return = null;
	if(isset($_POST['connect_account'])){
		$login = htmlentities(trim($_POST['login']));
		$password = htmlentities(trim($_POST['password']));
		$typeaccount = $_POST['typeaccount'];

		if($login!="" && $password!=""){

			$query = " SELECT * FROM utilisateur WHERE login = '$login' AND password = '$password'AND type_account = '$typeaccount' ";
			$results = pg_query($query);

			if((pg_affected_rows($results) == 1) && ($typeaccount = 'utilisateur')) {
				$_SESSION('login') = $login;
				header("Location:pageUser.php");
			}
			elseif((pg_affected_rows($results) == 1) && ($typeaccount = 'administrateur')){
				$_SESSION('login') == $login;
				header("Location:pageAdmin.php");
			}

			else $return = 'Echec de la connexion, login ou mot de passe incorrect.' .pg_last_error();
		}

		else $return = 'Veuillez remplir correctement les champs requis.' ;

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



















?>