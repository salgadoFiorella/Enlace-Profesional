<!doctype html>
<html lang="es_ES">

<?php 
require 'constants/settings.php'; 
require 'constants/check-login.php';
require 'constants/db_config.php'; 
function formato_mes($mes){
	$resultado = "";
	switch($mes){
		case "January":
			$resultado = "enero";
			break;
		case "February":
			$resultado = "febrero";
			break;
		case "March":
			$resultado = "marzo";
			break;
		case "April":
			$resultado = "abril";
			break;
		case "June":
			$resultado = "junio";
			break;
		case "July":
			$resultado = "julio";
			break;
		case "August":
			$resultado = "agosto";
			break;
		case "September":
			$resultado = "septiembre";
			break;
		case "October":
			$resultado = "octubre";
			break;
		case "November":
			$resultado = "noviembre";
			break;
		case "December":
			$resultado = "diciembre";
			break;
		case "May":
			$resultado = "mayo";
			break;
	}
	return $resultado;
}
if (isset($_GET['jobid'])) {

$jobid = $_GET['jobid'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_jobs WHERE status='S' and job_id = :jobid");
	$stmt->bindParam(':jobid', $jobid);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$rec = count($result);
	if ($rec == "0") {
	header("location:./");	
	}else{

    foreach($result as $row)
    {
	$jobtitle = $row['title'];
	$jobcity = $row['city'];
	$jobprovince = $row['province'];
	$jobcountry = $row['country'];
	$jobcategory = $row['category'];
	$jobtype = $row['type'];
	$experience = $row['experience'];
	$jobdescription = $row['description'];
	$jobrespo = $row['responsibility'];
	$jobreq = $row['requirements'];
	$closingdate = $row['closing_date'];
	$dateposted = $row['date_posted'];
	$compid = $row['company'];
	if ($jobtype == "Freelance") {
	$sta = '<span class="label label-success"> Pasantía / Práctica</span>';
											  
	}
	if ($jobtype == "Part-time") {
	$sta = '<span class="label label-danger">Medio tiempo</span>';
											  
	}
	if ($jobtype == "Full-time") {
	$sta = '<span class="label label-warning">Tiempo completo</span>';
											  
	}

	
	}
	}

					  
	}catch(PDOException $e)
    {

    }


}else{
header("location:./");	
}


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_companies WHERE id = '$compid'");
$stmt->execute();
$result = $stmt->fetchAll();


    foreach($result as $row)
    {
    $compname = $row['first_name'];
	$complogo = $row['avatar'];
	$compbout = $row['about'];
	}

					  
	}catch(PDOException $e)
    {

    }
	

$today_date = strtotime(date('Y/m/d'));
$last_date = date_format(date_create_from_format('Y/m/d', $closingdate), 'Y/m/d');
$post_date = date_format(date_create_from_format('Y/m/d', $closingdate), 'd');
$month = date_format(date_create_from_format('Y/m/d', $closingdate), 'F');
$post_month = formato_mes($month);
$post_year = date_format(date_create_from_format('Y/m/d', $closingdate), 'Y');

$date_posted = date_format(date_create_from_format('Y/m/d', $dateposted), 'd');
$month1 = date_format(date_create_from_format('Y/m/d', $dateposted), 'F');
$posted_month = formato_mes($month1);
$posted_year = date_format(date_create_from_format('Y/m/d', $dateposted), 'Y');

$conv_date = strtotime($last_date);

if ($today_date > $conv_date){
$jobexpired = true;
}else{
$jobexpired = false;
}
?>


<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Intermediacion Laboral - <?php echo "$jobtitle"; ?></title>
	<meta name="description" content="Intermediacion Laboral  UNA" />
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
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">



	
	<link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?u8vidh">

	<link href="css/style.css" rel="stylesheet">

	<style>

	.fa {
	padding: 20px;
	font-size: 30px;
	width: 30px;
	text-align: center;
	text-decoration: none;
	}
	.fa:hover {
	opacity: 0.7;
	}
	.fa-linkedin {
	background: #007bb5;
	color: white;
	}
	.fa-facebook {
	background: #3B5998;
	color: white;
	}

	.fa-twitter {
	background: #55ACEE;
	color: white;
	}
</style>

</head>

<body class="not-transparent-header">

	<div class="container-wrapper">

	<?php include_once('header.php'); ?>
			<div id="registerModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Registrarse</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="row">
			      	<div class="col-md-6">
			        	<a href="register.php?p=Employer" class="btn btn-facebook btn-block mb-5-xs">Registro Empresa</a>
			    	</div>
			      	<div class="col-md-6">
			       <a href="register.php?p=Employee" class="btn btn-facebook btn-block mb-5-xs">Registro Personal</a>
			      	</div>
			      </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Cerrar</button>
			      </div>
			    </div>
			  </div>
			</div>



		<div class="main-wrapper">
		
			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-md-10 col-md-offset-1">
						
							<div class="job-detail-wrapper">
							
								<div class="job-detail-header text-center">
											
									<h2 class="heading mb-15"><?php echo "$jobtitle"; ?></h2>
								
									<div class="meta-div clearfix mb-25">
										<span>de <a href="company.php?ref=<?php echo "$compid"; ?>"><?php echo "$compname"; ?></a> con rol: </span>
										<?php echo "$sta"; ?>
									</div>
									
									<ul class="meta-list clearfix">
										<li>
											<h4 class="heading">Ubicación:</h4>
											<?php echo "$jobcity"; ?>, <?php echo "$jobprovince"; ?>, <?php echo "$jobcountry"; ?>
										</li>
										<li>
											<h4 class="heading">Vencimiento:</h4>
											<?php echo "$post_month"; ?> <?php echo "$post_date"; ?>, <?php echo "$post_year"; ?>
										</li>
										<li>
											<h4 class="heading">Experiencia</h4>
											<?php echo "$experience"; ?> 
										</li>
										<li>
											<h4 class="heading">Publicado: </h4><?php echo "$posted_month"." "."$date_posted".", "."$posted_year";?>
										</li>
									</ul>
									
								</div>
					
								<div class="job-detail-company-overview clearfix">
								
									<h3>Vista de la empresa</h3>
									<div class="image">
										<?php 
										if ($complogo == null) {
										print '<center>No Company Logo</center>';
										}else{
										echo '<center><img class="autofit2" alt="image" title="'.$compname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										}
										?>
									</div>
									
									<p><?php echo "$compbout"; ?></p>
									
								</div>
								
								<div class="job-detail-content mt-30 clearfix">
								
									<h3>Descripción del empleo</h3>

									<p><?php echo "$jobdescription"; ?></p>

									
									<h3>Responsabilidades</h3>
									
                                    <p><?php echo "$jobrespo"; ?></p>
									
									<h3>Requerimientos</h3>
                                    <p><?php echo "$jobreq"; ?></p>
								
								</div>
								
								<div class="apply-job-wrapper">
								<?php
						  	if ($user_online == true) {
									if ($jobexpired == true) {
									print '<button class="btn btn-primary disabled btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-calendar"></i> Este empleo ha expirado</button>';
									}else{

									if ($myrole == "employee") {
										echo "<form method='POST' action='app/apply-job.php'>
										<input type='hidden' name='opt' value='".$jobid."'>
										<button type='submit' class='btn btn-primary btn-hidden btn-lg collapsed'><i class='flaticon-line-icon-set-pencil'></i> Aplicar a este trabajo </button></form>";
                                
									}
									else{
									print '<button class="btn btn-primary disabled btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-padlock"></i> Inicia sesión como empleado para aplicar</button>';
									}	
								}

								
								}else{
									echo "<div class='col-5'>";
								print '<a class="btn btn-primary btn-hidden btn-lg collapsed" href="login-employee.php"><i class="flaticon-line-icon-set-padlock"></i> Inicia sesión para aplicar</a><br>';	
									echo '</div>';
							}

								
								?>
								<br><br>
								<div id="socialSharing"> Compartir empleo:
								<a href="http://www.facebook.com/sharer.php?u=www.intermediacionlaboral.una.ac.cr/System/explore-job.php?jobid=<?php echo $jobid;?>" target="_blank" type="button" class="btn btn-fb" style="background-color: #3e5b98; color: white;"><i class="socicon-facebook"></i></a>
								<a href='http://twitter.com/share?text=Intermediacion Laboral UNA&hashtags=Trabajo,IntermediacionLaboralUNA' target="_blank" type="button" class="btn btn-fb" style="background-color: #4da7de; color: white;"><i class="socicon-twitter"></i></a>
								<a href="http://www.linkedin.com/shareArticle?mini=true&url=https://intermediacionlaboral.una.ac.cr/System/explore-job.php?jobid=<?php echo $jobid;?>" target="_blank" type="button" class="btn btn-fb" style="background-color: #3371b7; color: white;"><i class="socicon-linkedin"></i></a>
								<button type="button" class="btn btn-primary" id="copytoclipboard">Copiar URL</button>
							
									
									</div>
								
								<p id="data"></p>

								</div>
								
								
							</div>
						
						</div>
						
					</div>
				
				</div>
			
			</div>
			<?php include_once('footer.php'); ?>
			
		</div>
	

	</div> 


<script>
$( document ).ready(function() {
    
    $( "#copytoclipboard" ).click(function() {
		var url = window.location.href;
		const el = document.createElement('textarea');
		el.value = url;
		document.body.appendChild(el);
		el.select();
		document.execCommand('copy');
		document.body.removeChild(el);
		alert("Se ha copiado el URL");
	});
   
});

</script>


</body>

</html>