<?php
include '../config.php';
require 'PHPMailer-master/PHPMailerAutoload.php';
if(empty($_SESSION['admin']))
{
	header("LOCATION: login.php");
	exit();
	
}

									if(isset($_GET['action']) && $_GET['action']=='Accepter'){

										

										
								$stm = $db->prepare('UPDATE inscrit SET etat =1  WHERE id_insc=?');

								$stm->execute([$_GET['id']]);
										
										$stm = $db->prepare('select e.Nom,e.Prenom ,e.Email,u.Nom_univer from etudiant e,universite u ,inscrit i where i.id_etu=e.id_etu and i.id_uni=u.id_univer and i.id_insc=?');

										$stm->execute([$_GET['id']]);

										foreach($stm->fetchAll() as $row)
						    {
	$mailto = $row['Email'];
}
    $mailSub = "Validation de votre dossier";
	$mailMsg = "MR /MLLE ".$row['Nom']."  Nous avons Accepté votre demande" ;
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "elmehdi1994.arrad@gmail.com";
   $mail ->Password = "Fcbarcelone1234";
   $mail ->SetFrom("elmehdi1994.arrad@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
}

									

									if(isset($_GET['action']) && $_GET['action']=='Refuser'){

										
									$stm = $db->prepare('UPDATE inscrit SET etat =-1  WHERE id_insc=?');

										$stm->execute([$_GET['id']]);

												$stm = $db->prepare('select e.Nom,e.Prenom ,e.Email,u.Nom_univer from etudiant e,universite u ,inscrit i where i.id_etu=e.id_etu and i.id_uni=u.id_univer and i.id_insc=?');

										$stm->execute([$_GET['id']]);

										foreach($stm->fetchAll() as $row)
						    {
	$mailto = $row['Email'];
	$mailMsg = "MR /MLLE ".$row['Nom']."  Nous avons Refusé votre demande" ;
}
    $mailSub = "Validation de votre dossier";
    
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
  $mail ->Username = "elmehdi1994.arrad@gmail.com";
   $mail ->Password = "Fcbarcelone1234";
   $mail ->SetFrom("elmehdi1994.arrad@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
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
	

	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="sweetalert.min.js"></script>
<script type="text/javascript">
  function val(){

swal({
  title: "Message de Cofirmation",
  text: "Vous etes sur d'accepté universite",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Message envoyer email pour information", {
      icon: "success",
    });
  } else {
    swal("retour");
  }
});

  }

</script>
		
		
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
				<a class="brand" href="index.html"><span>Sputnik academy</span></a>
								
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
				<div class="box span12">
					
					<div class="box-content">
	<!--/table affichage -->

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>		
							  		
							  		 <th scope="col">Nom & Prénom</th>
									 <th scope="col">Nom université</th>
     								 <th scope="col">Email unviversite</th>
     								 <th scope="col">Branche</th>
    							     
     								 <th scope="col">Etat</th>
     								 
							  </tr>
						  </thead>   
						  <tbody name="inscrit" >
						  
							

								<?php
						 
						  	$stm = $db->prepare('select  i.id_insc,i.etat,e.Nom,e.Prenom,i.etat,u.Nom_univer,u.Ville_unvier,u.email_uni,b.Nom_br from inscrit i,universite u,branche b,etudiant e where i.id_etu=e.id_etu and i.id_uni=u.id_univer and i.id_br=b.id_br and i.etat=0');
						    $stm->execute();
						    foreach($stm->fetchAll() as $row)
						    {

						  ?>
						  	<tr>
								<td  style="color:black"><?php echo $row['Nom']?>&nbsp;<?php echo $row['Prenom']; ?></td>
								
								<td style="color:black"><?php echo $row['Nom_univer']; ?></td>
								<td class="center" style="color:black"><?php echo $row['email_uni']; ?></td>
								
								<td class="center" style="color:black"><?php echo $row['Nom_br']; ?></td>
								<td>

							

								<a class="btn btn-default btn-lg" href="?action=Accepter&id=<?php echo $row['id_insc']; ?>"onclick="val();">
										<i class="glyphicon glyphicon-ok-sign" title="Accepter"></i>  
									</a>

								<a class="btn btn-default btn-lg" href="?action=Refuser&id=<?php echo $row['id_insc']; ?>">
										<i class="	glyphicon glyphicon-remove-sign white edit" title="Refuser"></i>  
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
