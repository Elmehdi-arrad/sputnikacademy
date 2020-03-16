<?php
include '../config.php';
require('fpdf/fpdf.php');
if(empty($_SESSION['admin']))
{
	header("LOCATION: login.php");
	exit();
}
if(isset($_GET['action']) && $_GET['action']=='delete')

{
	$stm = $db->prepare('delete from etudiant where id_etu=?');
    $stm->execute([$_GET['id']]);
   
}
if(isset($_GET['iid']) ){
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 10);

	$pdf->Cell(18, 10, '', 0);
	$pdf->Image('../images/spotnic.png',10,10,30);
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(150, 20, '', 0);
	$pdf->Cell(100, 8, 'Date: '.date('d-m-Y').'', 0);
	$pdf->Ln(20);
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell(70, 8, '', 0);
	$pdf->Cell(100, 8, 'Sputnik Academy', 0);
	$pdf->Ln(20);
	$stm = $db->prepare('select * from etudiant where id_etu=?');
	    $stm->execute([$_GET['iid']]);
	    

	foreach ($stm->fetchAll() as $row)
	{
		

	
		
	
		$pdf->Image('../cv/'.$row['Image'],130,55,55);
		$pdf->Ln(13);
		$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(20, 8,'Nom  : '.$row['Nom'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(20, 8,'Prenom  : ' .$row['Prenom'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(15, 8,'CIN  : ' .$row['CIN'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(15, 8,'Date d Optontion  : ' .$row['Optontion'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(15, 8,'Age  : ' .$row['Age'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(20, 8, 'Date Naissance  : '.$row['Date_naiss'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(30, 8,'Sexe  : ' .$row['Sexe'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(50, 8,'Email  : ' .$row['Email'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(15, 8, 'Telephone  : '.$row['Telephone'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(15, 8,'Pays  : ' .$row['Pays'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(15, 8,'Ville  : ' .$row['Ville'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(15, 8, 'Nationnalite  : '.$row['Nationnalite'], 0);
			$pdf->Ln(13);
			$pdf->Cell(20, 20, '', 0);
		$pdf->Cell(15, 8,'Adress  : '. $row['Adress'], 0);
			$pdf->Ln(13);

		
	}






	$pdf->Output();
	exit();

}
if(isset($_GET['action']) && $_GET['action']=='allaffiche'){
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 10);

	$pdf->Cell(18, 10, '', 0);
	$pdf->Image('../images/spotnic.png',10,10,30);
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(150, 20, '', 0);
	$pdf->Cell(100, 8, 'Date: '.date('d-m-Y').'', 0);
	$pdf->Ln(20);
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell(70, 8, '', 0);
	$pdf->Cell(100, 8, 'Sputnik Academy', 0);
	$pdf->Ln(23);
	//$pdf->Cell(10, 8, '', 0);
	//$pdf->SetTextColor(0,0,204);
	//$pdf->Cell(10, 8, 'LISTE ETUDIANTS :  ', 0);
	//$pdf->SetTextColor(0,0,0);
	//$pdf->Ln();
	$pdf->SetTextColor(0,0,204);
	$pdf ->SetFont('Times','',12);
	$pdf ->Cell(35,10,'Liste Des Etudiants :',0,0,'C');
	$pdf ->Ln();
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial', 'B', 8);
//	$pdf ->Cell(10,8,'ID',1,0,'C');
	$pdf ->Cell(25,8,'Nom',1,0,'C');
	$pdf ->Cell(25,8,'Prenom',1,0,'C');
	$pdf ->Cell(55,8,'Email',1,0,'C');
	$pdf ->Cell(25,8,'Telephone',1,0,'C');
	$pdf ->Cell(30,8,'Pays',1,0,'C');
	$pdf ->Cell(30,8,'Ville',1,0,'C');
	$pdf ->Ln();


	//CONSULTA

		$stm = $db->prepare('select * from etudiant ');
	    $stm->execute();
	    

	foreach ($stm->fetchAll() as $row)
	{
 //	$pdf->Cell(10,8,$row['id_etu'],1,0,'C');
	$pdf ->Cell(25,8,$row['Nom'],1,0,'L');
	$pdf ->Cell(25,8,$row['Prenom'],1,0,'L');
	$pdf ->Cell(55,8,$row['Email'],1,0,'L');
	$pdf ->Cell(25,8,$row['Telephone'],1,0,'L');
	$pdf ->Cell(30,8,$row['Pays'],1,0,'L');
	$pdf ->Cell(30,8,$row['Ville'],1,0,'L');
	$pdf ->Ln();
	}
$pdf->Cell(350,10,'Page '.$pdf->PageNo(),0,0,'C');	

	$pdf->Output();
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Sputnik Academy Manager</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/font-awesome.css" rel="stylesheet">



	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Sputnik Academy</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $_SESSION['admin']; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="login.php?logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="active"><a href="index.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
				<li><a href="admin_listdemande.php"><i class="halflings-icon user"></i><span class="hidden-tablet"> Liste des Récéptions</span></a></li>	
						<li><a href="affichier.php"><i class="halflings-icon user"></i><span class="hidden-tablet">Etudiants </span></a></li>
						<li><a href="universite.php"><i class="halflings-icon user"></i><span class="hidden-tablet"> Universités</span></a></li>
						<li><a href="categorie.php"><i class="halflings-icon user"></i><span class="hidden-tablet"> Catégories</span></a></li>
						<li><a href="branche.php"><i class="halflings-icon user"></i><span class="hidden-tablet"> Branches</span></a></li>
						<li><a href="back.php"><i class="halflings-icon user"></i><span class="hidden-tablet">Backup data</span></a></li>
										</ul>
						
										</ul>
				</div>
			

			</div>
			<!-- end: Main Menu -->
			
		
			
			<!-- start: Content -->
		<div id="content" class="span10">
			<div class="row-fluid sortable">
				<div class="pull-right">
			<a class="btn btn-default btn-lg Print glyphicon" href="?action=allaffiche">
			<span class="glyphicon glyphicon-Print " title="Afficher PDF" style="color:black;" aria-hidden="true">&nbsp;&nbsp;Telecharger PDF</span> 									</a>
						</a>		
				</div>
			<br><br><br>
				<div class="box span12">
					<div class="box-header " data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Etudiants</h2>
						<div class="pull-right">
							<a href="add_eleve.php">Ajouter</a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>	

								  <th>Nom Prenom</th>
								  <th>CIN</th>
								  <th>Passport</th>
								  <th>Email</th>
								  <th>Telephone</th>
								  <th>Option</th>



							  </tr>
						  </thead>   
						  <tbody name="etudiant">
						  <?php
						  	$stm = $db->prepare('select * from etudiant');
						    $stm->execute();
						    foreach($stm->fetchAll() as $row)
						    {
						  ?>
							<tr>
								<td><?php echo $row['Nom']." ".$row['Prenom'] ;?></td>
		    					<td class="center"><?php echo $row['CIN']; ?></td>
								<td class="center"><?php echo $row['Passport']; ?></td>
								<td class="center"><?php echo $row['Email']; ?></td>
								<td class="center"><?php echo $row['Telephone']; ?></td>
								<td class="center">
									

										<a class="btn btn-default btn-lg" href="edit.php?id=<?php echo $row['id_etu']; ?>">
										<i class="fa fa-refresh fa-spin" title="Modifier" style="color:black;"></i>  
									</a>

								<a class="btn btn-default btn-lg" href="?action=delete&id=<?php echo $row['id_etu']; ?>">
										<i class="glyphicon glyphicon-trash " title="Supprimer" style="color:black;"></i> 
									</a>

									<a class="btn btn-default btn-lg" href="affichier.php?iid=<?php echo $row['id_etu']; ?>">
										<i class="glyphicon glyphicon-download white edit " title="Afficher PDF" style="color:black;"></i> 
									</a>

								
									</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					 </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			</div>
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	
	<div class="clearfix"></div>
	
	<footer>

		

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
