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
                  header("Location:user/user.php");
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
                  header("Location:admin/admin.php");
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



/* LES FONCTIONS D'AJOUT */

/*PAYS*/

function add_country(){
	$return = null;
	if (isset($_POST['add_country'])) {
		$country_name = $_POST['country_name'];
		$time_fly = $_POST['time_fly'];
		$average_price = $_POST['average_price'];
		$visa_required = $_POST['visa_required'];
		$vaccin_required = $_POST['vaccin_required'];

		if($country_name!="" && $average_price != ""){

			$query = " INSERT INTO pays (country_name, time_fly, average_price, visa_required, vaccin_required) VALUES ('$country_name', '$time_fly', '$average_price', '$visa_required', '$vaccin_required')";

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
		$hebergement_name = $_POST['hebergement_name'];
		$type_hebergement = $_POST['type_hebergement'];
		$city_hebergement = $_POST['city_hebergement'];
		$adress_hebergement = $_POST['adress_hebergement'];
		$average_price = $_POST['average_price'];

		if($hebergement_name != "" && $type_hebergement != "" && $city_hebergement !="" && $average_price !=""){

			$query = " INSERT INTO hebergement (hebergement_name, type_hebergement, city_hebergement, adress_hebergement, average_price) VALUES ('$hebergement_name', '$type_hebergement', '$city_hebergement', '$adress_hebergement', '$average_price')";

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

/*LOCOMOTION*/

function add_locomotion(){
	$return = null;
	if(isset($_POST['add_locomotion'])){
		$locomotion_name = $_POST['locomotion_name'];
		$type_locomotion = $_POST['type_locomotion'];
		$price_locomotion = $_POST['price_locomotion'];
		$horaire_locomotion = $_POST['horaire_locomotion'];
	

	if($locomotion_name!="" && $type_locomotion !=""){
		$query = " INSERT INTO locomotion (locomotion_name, type_locomotion, price_locomotion, horaire_locomotion) VALUES ('$locomotion_name', '$type_locomotion', '$price_locomotion', '$horaire_locomotion')";

		$results = pg_query($query);
		if (pg_affected_rows($results) == 1) 
			$return = 'Création du moyen de locomotion réussie.';
		else
			$return = 'Erreur lors de la création du moyen locomotion.' .pg_last_error();
		}
		else {
			$return = 'Veuillez remplir les champs requis.';
		}
	}
	$return = '<p style="color: red;">'.$return. '</p>';
	return $return;
}

/* POINT D'INTERET */

function add_interet(){
	$return = null;
	if(isset($_POST['add_interet'])){
		$name_interet = $_POST['name_interet'];
		$type_interet = $_POST['type_interet'];
		$telephone = $_POST['telephone'];
		$adress_interet = $_POST['adress_interet'];
		$time_open = $_POST['time_open'];
		$city_interet = $_POST['city_interet'];


		if ($name_interet!="" && $type_interet!="" && $city_interet!="") {
			$query = "INSERT INTO point_interet (name_interet, type_interet, telephone, adress_interet, time_open, city_interet) VALUES ('$name_interet', '$type_interet', '$telephone', '$adress_interet', '$time_open', '$city_interet')";

			$results = pg_query($query);
			if (pg_affected_rows($results) == 1) 
				$return = 'Création du point d interet réussie.';
			else
				$return = 'Erreur lors du point d interet.' .pg_last_error();
			}
			else {
				$return = 'Veuillez remplir les champs requis.';	
			}
			}
			$return = '<p style="color:red;">'.$return.'</p>';
			return $return;
}

/* ACTIVITE */

function add_activite(){
	$return = null;
	if (isset($_POST['add_activite'])) {
		$name_activite = $_POST['name_activite'];
		$type_activite = $_POST['type_activite'];
		$adress_activite = $_POST['adress_activite'];
		$city_activite = $_POST['city_activite'];
		$price_activite = $_POST['price_activite'];

	if ($name_activite!="" && $type_activite!="" && $city_activite!="") {
			$query = "INSERT INTO activite (name_activite, type_activite, adress_activite, city_activite, price_activite) VALUES ('$name_activite', '$type_activite', '$adress_activite', '$city_activite', '$price_activite')";

			$results = pg_query($query);
			if (pg_affected_rows($results) == 1) 
				$return = 'Création de l activité réussie.';
			else
				$return = 'Erreur lors de la création de l activité.' .pg_last_error();
			}
			else {
				$return = 'Veuillez remplir les champs requis.';	
			}
			}
			$return = '<p style="color:red;">'.$return.'</p>';
			return $return;
}

/* UTILISATEUR */

function add_utilisateur(){
	$return = null;
	if(isset($_POST['add_utilisateur'])){
		$login = $_POST['login'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$type_account = $_POST['type_account'];

		if($login!="" && $password!="" && $email!="" && $type_account!=""){
			$query = " INSERT INTO utilisateur (login, password, type_account, email) VALUES ('$login', '$password', '$type_account', '$email')";

			$results = pg_query($query);
			if(pg_affected_rows($results) == 1)
				$return = 'Création d un nouvel utilisateur réussie.';
			else
				$return = 'Erreur lors de la création d un nouvel utilisateur.' .pg_last_error();
		}
		else {
			$return = 'Veuillez remplir les champs requis.';
		}
	}
	$return = '<p style="color:red;">'.$return.'</p>';
	return $return;
}

/*PRIX*/

function add_price(){
	$return = null;
	if (isset($_POST['add_price'])) {
		$name_stuff = $_POST['name'];
		$type_stuff = $_POST['type'];
		$price_stuff = $_POST['price'];

		if($name_stuff!="" && $type_stuff!="" && $price_stuff !=""){
			$query = "INSERT INTO price (name_stuff, type_stuff, price_stuff) VALUES ('$name_stuff', '$type_stuff', '$price_stuff')";

			$results = pg_query($query);
			if(pg_affected_rows($results) == 1)
				$return = 'Création d un nouveau prix.';
			else
				$return = 'Erreur lors de la création d un nouveau prix.' .pg_last_error();
		}
		else {
			$return = 'Veuillez remplir les champs requis.';
		}
	}
	$return = '<p style="color:red;">'.$return.'</p>';
	return $return;
}

 /* METEO */
function add_meteo(){
          $return = null;
            if (isset($_POST['add_meteo'])) {
              $city_meteo = $_POST['city_meteo'];
              $temps_meteo = $_POST['temps_meteo'];
              $temperature = $_POST['temperature'];

              if($city_meteo !="" && $temperature !="") {
                $query = "INSERT INTO meteo (city_meteo, temps_meteo, temperature) VALUES ('$city_meteo', '$temps_meteo', '$temperature')";
                $results = pg_query($query);
                if (pg_affected_rows($results) == 1) 
                  $return = 'Création de la meteo réussie.' ;
                  else
                    $return = 'Erreur lors de la création de la meteo.' .pg_last_error();
                
                } else {
                  $return = 'Veuillez remplir les champs requis.';
                }
              }
              $return = '<p style="color: red;">' .$return. '</p>';
              return $return;
              
        }

			
/* FONCTION DE MODIFICATION */

 function add_to_table($table, $champ, $value){
        $query = "INSERT INTO $table($champ) VALUES($value)";
        $result = pg_query($query);
    }
    function edit_table($table, $id ,$champ, $value,$column){
        $query = "UPDATE  $table  SET $champ = '$value' WHERE $column =$id";
        $result = pg_query($query);
    }
    function delete_line($table, $id){
        $query = "DELETE FROM $table WHERE id_user=$id";
        $result = pg_query($query);
    }
    function get_info($table, $id, $champ, $column){
        $query = "SELECT $champ FROM $table WHERE $column = '$id'";
        // echo $query;
        $result = pg_query($query);
        $value = current(pg_fetch_row($result));
        return $value;
    }

/* FONCTION D'AFFICHAGE */

function display_table_query($query, $flag=0){
            //echo $query;
            $id = 0;
            $result = pg_query($query);
            $i = 0;
            $char = '<table><thead><tr>';
            while ($i < pg_num_fields($result))
            {
                $fieldName = pg_field_name($result, $i);
                 $char .= '<th>' . $fieldName . '</th>';
                $i = $i + 1;
            }
            if($flag>0)
              $char .= '<th></th></tr></thead><tbody>';
            $i = 0;
            while ($row = pg_fetch_row($result))
            {
              $id = current($row);
              $char .= '<tr>';
              $count = count($row);
              $j = 0;
              while ($j < $count)
              {
                  $c_row = current($row);
                  if ($flag == 1 || $flag == 2){
                    if ($j == 0)
                      $id = $c_row;
                  }
                  $char .= '<td>' . $c_row . '</td>';
                  next($row);
                  $j = $j + 1;
              }
              if ($flag == 1){ // Modifier / Supprimer les hébergements
                $char.= '<td><a href="editHebergement.php?id='.$id.'">Modifier</a></td>';
                $char.= '<td><a href="deleteHebergement.php?id='.$id.'">Supprimer</a></td>';
              }
              if ($flag == 2){ // Modifier / Supprimer les activités
                $char.= '<td><a  href="editActivite.php?id='.$id.'">Modifier</a></td>';
                $char.= '<td><a  href="deleteActivite.php?id='.$id.'">Supprimer</a></td>';
              }
              if($flag==3){ // Modifier / Supprimer les point d'interets
                $char.= '<td><a  href="editInteret.php?id='.$id.'">Modifier</a></td>';
                $char.= '<td><a  href="deleteInteret.php?id='.$id.'">Supprimer</a></td>';
               
              }
              if($flag==4){ // Modifier / Supprimer les meteo
                $char.= '<td><a  href="editMeteo.php?id='.$id.'">Modifier</a></td>';
                $char.= '<td><a  href="deleteMeteo.php?id='.$id.'">Supprimer</a></td>';
                
              }
              if($flag==5){ // Modifier / Supprimer les prix
                $char.= '<td><a  href="editPrice.php?id='.$id.'">Modifier</a></td>';
                $char.= '<td><a href="deletePrice.php?id='.$id.'">Supprimer</a></td>';
              }
              if($flag==6){ // Modifier / Supprimer les moyens de locomotion
                $char.= '<td><a  href="editLocomotion.php?id='.$id.'">Modifier</a></td>';
                $char.= '<td><a  href="deleteLocomotion.php?id='.$id.'">Supprimer</a></td>';
              }
              if($flag==7){ // Modifier / Supprimer les pays
               $char.= '<td><a href="editPays.php?id='.$id.'">Modifier</a></td>';
               $char.= '<td><a href="deletePays.php?id='.$id.'">Supprimer</a></td>';
              }
              if($flag==8){// Modifier / Supprimer les utilisateurs
              	$char.= '<td><a href="editUtilisateur.php?id='.$id.'">Modifier</a></td>';
               	$char.= '<td><a href="deleteUtilisateur.php?id='.$id.'">Supprimer</a></td>';
              }

              $char .= '</tr>';
              $i = $i + 1;
            }
            pg_free_result($result);
            $char .= '</tbody></table>';
            return $char;
        }






?>
