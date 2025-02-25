<!doctype html>
<html lang="es_ES">
<?php 
include 'constants/settings.php'; 
include 'constants/check-login.php';
if ($user_online == "true") {
	header("location:./");	
		}else{
				
	}
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Iniciar Sesión</title>
	
	<meta name="description" content="Intermediacion Laboral UNA" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="BwireSoft">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Bwire Jobs" />
    <meta property="og:description" content="Intermediacion Laboral UNA" />

	<link rel="shortcut icon" href="images/ico/una.png">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js " integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link href="css/login.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
	<link rel="stylesheet" href="icons/linearicons/style.css">
	<link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="icons/rivolicons/style.css">
	<link rel="stylesheet" href="icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="icons/flaticon-ventures/flaticon-ventures.css">
</head>


<body class="not-transparent-header">

	<div class="container-wrapper">


	<?php include_once('header.php'); ?>



		<div class="loginWrapper">

			 <div class="container">
			    <div class="row">
			      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			        <div class="card card-signin my-5">
			          <div class="card-body">
			            <h5 class="card-title text-center">Iniciar sesión Personal</h5>
			            <?php
							include 'constants/check_reply.php';	
						?>
			            <form class="form-signin" name="frm" action="app/auth-ldap.php" method="POST" autocomplete="off">
			              <label for="inputEmail">Cédula</label>
			              <div class="form-label-group">
			                <input name="cedula" type="text" id="inputEmail" class="form-control" placeholder="Ingrese su cédula" required autofocus> 
			              </div>
			              <label for="inputPassword">Contraseña<small> (Debe utilizar la misma contraseña de la UNA)</small></label>
			              <div class="form-label-group">
			                <input id="inputPassword" name="password" type="password" class="form-control" placeholder="Ingrese su contraseña"  required autofocus>  
			              </div>

			              
			              <div class="custom-control custom-checkbox mb-3">
			                <a href="https://www.claves.una.ac.cr/" target="_blank">¿Olvidó la contraseña?</a> 
			              </div>	
			              <!-- <div class="custom-control custom-checkbox mb-3">
			                <input type="checkbox" class="custom-control-input" id="customCheck1">
			                <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
			              </div> -->
			              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar Sesión</button>
			              <hr class="my-4">
			            </form>
			          </div>


                      
		</div>
		</div>
		</div>		
		</div>
<?php include_once('footer.php'); ?>

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>




<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/customs.js"></script>


</body>

</html>