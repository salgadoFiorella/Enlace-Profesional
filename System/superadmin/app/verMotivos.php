<!doctype html>
<html lang="es_ES">
<?php 
require '../../constants/settings.php'; 
require '../../constants/check-login.php';
require '../../constants/db_config.php';

if (isset($_GET['mref'])) {

$motivo_id = $_GET['mref'];



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_denied_acces_companies WHERE id = :memberno AND access_denied = 'Si'");
	$stmt->bindParam(':memberno', $motivo_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
    
    $stmt2 = $conn->prepare("SELECT * FROM tbl_companies WHERE id = :idM");
	
	if ($rec == "0") {
	 header("location:./");	
	}else{

    foreach($result as $row)
    {
        $idMot = $motivo_id;
        $motivoMot = $row['motivo'];
        $explicacionMot = $row['motivo_explicacion'];
        $idCompMot = $row['company_id'];
        $fechaDenegacion = $row['created_at'];


		$stmt2->bindParam(':idM', $idCompMot);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();
        
        foreach($result2 as $row2){
            $nombreEmpresa = $row2['first_name'];
            $personInCarge = $row2['in_charge'];
            $emailComp = $row2['email'];
            $phoneComp = $row2['phone'];
            $provinceComp = $row2['province'];
            $countryComp = $row2['country'];
        }
	
	}
	
	}

					  
	}catch(PDOException $e)
    {
 
    }
	
}else{
header("location:./");
}

if (isset($_GET['page'])) {
$page = $_GET['page'];
if ($page=="" || $page=="1")
{
$page1 = 0;
$page = 1;
}else{
$page1 = ($page*5)-5;
}					
}else{
$page1 = 0;
$page = 1;	
}
?>
<head>

<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> <?php echo "Motivo de Denegación"; ?></title>
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

	<link rel="shortcut icon" href="../../images/ico/una.png">
	
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="../../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../../js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../../js/bootstrap.min.js " integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	

	<link href="../../css/animate.css" rel="stylesheet">
	<link href="../../css/main.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/component.css" rel="stylesheet">

	<link rel="stylesheet" href="../../icons/linearicons/style.css">
	<link rel="stylesheet" href="../../icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../../icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="../../icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="../../icons/rivolicons/style.css">
	<link rel="stylesheet" href="../../icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="../../icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="../../icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="../../icons/flaticon-ventures/flaticon-ventures.css">

	
</head>


<body class="not-transparent-header">

	<div class="container-wrapper">
	
	<?php include_once('../../header.php'); ?>

		<div class="main-wrapper">
	
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
							<div class="col-md-10 col-md-offset-1">
							
								<div class="company-detail-wrapper">
								
									<div class="company-detail-header text-center">
										
										<div class = "heading mb-15">
										<?php 
										if($nombreEmpresa !== NULL){
										    print '<h2> INFORMACION MOTIVO DE DENEGACIÓN DE ACCESO A '.$nombreEmpresa.'</h2>';
                                        }else{
                                            print '<center> INFORMACION MOTIVO DE DENEGACIÓN DE ACCESO</center>';
                                        }
										?>
										</div>
										
										<ul class="meta-list clearfix">
                                            <li>
												<h4 class="heading">Persona a Cargo:</h4>
												<?php echo "$personInCarge"; ?>
											</li>
											<li>
												<h4 class="heading">Correo Electronico:</h4>
												<?php echo "$emailComp"; ?>
											</li>
											<li>
												<h4 class="heading">Telefono: </h4>
												<?php echo "$phoneComp"; ?>
											</li>
											<li>
												<h4 class="heading">País: </h4>
												<?php echo "$countryComp"; ?>
											</li>
											<li>
												<h4 class="heading">Provincia : </h4>
												<?php echo "$provinceComp"; ?>
											</li>
										</ul>
										
									</div>
						
									<div class="company-detail-company-overview clearfix">
									
										<h3>Motivo de Denegación de la Empresa</h3>
										
										<p><?php echo "$motivoMot"; ?></p>

										
										<h3>Detalle</h3>
										
										<p><?php echo "$explicacionMot"; ?></p>
										
										<h3>Fecha de Denegación</h3>
										
										<p><?php echo "$fechaDenegacion" ; ?></p>
										
									</div><br><br>
									
							</div>
						
						</div>
						
					</div>
				
				</div>
			
			</div>

			<?php include_once('../../footer.php'); ?>
			
		</div>
		

	</div>
 

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<script type="text/javascript" src="../../js/smoothscroll.js"></script>
<script type="text/javascript" src="../../js/wow.min.js"></script>
<script type="text/javascript" src="../../js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="../../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../../js/handlebars.min.js"></script>
<script type="text/javascript" src="../../js/slick.min.js"></script>
<script type="text/javascript" src="../../js/easy-ticker.js"></script>
<script type="text/javascript" src="../../js/customs.js"></script>


</body>


</html>