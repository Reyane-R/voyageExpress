<?php
    include "../../include.php";
    include "../../fonctions.php";
    session_start();
  if (!$_SESSION['login']) {

header('Location:../index.php');


} 
    $id = $_GET['id'];
    $view = "Location: ../registerMeteo.php";
    $thisedit = "./edit.php?id=$id";
    $exist = false;
    $delete = "./delete.php?id=$id";
    $_POST = array_filter($_POST);
    foreach($_POST as $k => $v){
        if(isset($_POST[$k])){
            $exist = true;
            edit_table("meteo",$id,$k,$_POST[$k],"id_meteo");
        }
    }
    if($exist){
        header($view);
    }
    
    $city_meteo = get_info("meteo", $id, "city_meteo", "id_meteo");
    $temps_meteo = get_info("meteo", $id, "temps_meteo", "id_meteo");
    $temperature = get_info("meteo", $id, "temperature", "id_meteo");

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>editMeteo Page</title>
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
				<h3>Modifier la Météo </h3>
			</div>
			<div class="card-body">
            <form action="<?php $thisedit ?>" method="post">

                <strong style="color:white"> Ville </strong>
                <input type="text" name="city_meteo" placeholder= "<?php echo $city_meteo ?>">

                    <div class="input-group form-group">
						<strong style="color:white;"> Température </strong>

						<input type="text" name="temperature" placeholder="<?php echo $temperature ?>">
                    </div>


                    <div class="input-group form-group">
                        <strong style="color:white;"> Type </strong>
                    <select name="temps_meteo" placeholder="<?php echo $temps_meteo ?>">
                                                    <option value="ensoleille">ensolleilé</option>
                                                    <option value="nuageux">nuageux</option>
                                                    <option value="pluvieux">pluvieux</option>
                                                    <option value="vent violent">vent violent</option>
                                                    <option value="humide">humide</option>
                                                    </select>
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