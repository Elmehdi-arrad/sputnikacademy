<?php
include 'config.php';
if(empty($_SESSION['login']))
{
	header("LOCATION: login.php");
	exit();
}



?>

<!DOCTYPE html>
<html lang="zxx">

<head>
<title>Sputnik Academy</title>	

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}

	</script>
		<link rel="icon" type="images/png" href="images/favicon11.png" />

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>


<body>
	<div class="header-top">
		<div class="container">
			<div class="bottom_header_left">
				<p>
					<span class="fa fa-map-marker" aria-hidden="true"></span>Marrakech, Maroc
				</p>
			</div>
				<div class="bottom_header_left">
				 &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
					
				 		<a href="index.php"> <img src="images/fr.png"> </a>
						<a href="en/index.php"> <img src="images/en.png"> </a>
						<a href="ru/index.php"> <img src="images/ru.png"> </a>
						<a href="es/index.php"> <img src="images/es.png"> </a>
								
							</div>
			<div class="bottom_header_right">
				<div class="bottom-social-icons">
					<a class="facebook" href="#">
						<span class="fa fa-facebook"></span>
					</a>
					<a class="twitter" href="#">
						<span class="fa fa-twitter"></span>
					</a>
					
					<a class="linkedin" href="#">
						<span class="fa fa-linkedin"></span>
					</a>
				</div>
				<div class="header-top-righ">
					<a href="login.php?logout">
						<span class="fa fa-sign-in" aria-hidden="true"></span><?php echo $_SESSION['login'] ?></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="header">
		<div class="content white">
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						
						<a class="navbar-brand" href="index.php">
							<h1>
								<span class="fa fa-leanpub" aria-hidden="true"></span>Sputnik Academy
								<label>Educations, Formations & Orientations</label>
							</h1>
						</a>
					</div>
				
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav">
								<li class="active">
									<a href="index.php" class="effect-3">Acceuil</a>
								</li>
								<li>
									<a href="about.php" class="effect-3">Qui sommes nous?</a>
								</li>
								<li>
									<a href="courses.php" class="effect-3">Condidats</a>
								</li>
								<li>
									<a href="join.php" class="effect-3">Inscription</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pourquoi la Russie?
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="#">Education en russie</a>
										</li>
										<hr>
										<li>
											<a href="#">Enseignement en russie</a>
										</li>
										<hr>
										<li>
											<a href="#">Avis des étudiants</a>
										</li>
										
									</ul>
								</li>
								</li>
								<li>
									<a href="Gallery.php" class="effect-3">Gallery</a>
								</li>
								<li>
									<a href="contact.php" class="effect-3">Contactez nous?</a>
								</li>

							</ul>
						</nav>
					</div>
					
				
				</div>
			</nav>
		</div>
	</div>

	<div class="inner_page_agile">

	</div>
	<!--//banner -->
	<!-- short -->
	<div class="services-breadcrumb">
		<div class="inner_breadcrumb">
			<ul class="short_ls">
				<li>
					<a href="etu_univ.php">Inscrit Université</a>
					<span>| |</span>
				</li>
				<li>Mes Universite</li>
			</ul>
		</div>
	</div>
	<!-- //short-->
	<!-- about -->
	<div class="about-sec" id="about">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>M</span>es
					<span>U</span>niversités
					
				</h3>
				<div class="tittle-style">

				</div>
			
	
	<!--/table affichage -->

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
									 <th scope="col">Nom université</th>
     								 <th scope="col">Ville Universite</th>
     								 <th scope="col">Email unviversite</th>
     								 <th scope="col">Branche</th>
    							     
     								 <th scope="col">Etat</th>
     								 
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
						  $id =$_SESSION['id_etu'] ;
						
						  	$stm = $db->prepare('select distinct u.Nom_univer,u.Ville_unvier,u.email_uni,b.Nom_br,i.etat, i.id_uni,i.id_br,i.id_etu,u.id_univer,b.id_br from inscrit i,universite u,branche b,etudiant e where i.id_uni=u.id_univer and i.id_br=b.id_br and i.id_etu="'.$id.'"');
						    $stm->execute();
						    foreach($stm->fetchAll() as $row)

						    {
						  ?>
							<tr>
								<td><?php echo $row['Nom_univer']; ?></td>

								<td class="center"><?php echo $row['Ville_unvier']; ?></td>

								<td class="center"><?php echo $row['email_uni']; ?></td>
								
								<td class="center"><?php echo $row['Nom_br']; ?></td>

								
							<?php
								if($row['etat']== 0) {echo "<td style='font-weight:bold;color:black'>En cours  de traitement</td>";}  
								if($row['etat']== 1) {echo "<td style='font-weight:bold;color:green'>Accepté</td>";}  
								if($row['etat']== -1) {echo "<td style='font-weight:bold;color:red'>Refusé</td>";}  
								?>
									
								

							</tr>
							<?php } ?>
						  </tbody>
					  </table>          
				
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
<!--/table affichage -->
	<div class="mkl_footer">  
		<div class="sub-footer">
			<div class="container">
						<div class="mkls_footer_grid">
					<div class="col-xs-4 mkls_footer_grid_left">
						<h4>Localisation:</h4>
						<p>Marrakech 40000 ,
							<br> Avenue Qadi ayad</p>
					</div>
						<h4>Email:</h4>
						<p>
							<span>Téléphone:</span>0698506591/ 0698506604/ 0643080488</p>
						<p>
							<span>Email : </span>
							<a href="#">sputnicacademy@gmail.com</a>
						</p>
					</div>
					<div class="col-xs-4 mkls_footer_grid_left">
						<h4>Les heures de travail:</h4>
						<p>Matin : 8H-15H</p>
						<p>Samedi
							<span>(Fermer)</span>
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="botttom-nav-allah">
				<ul>
						<li>
							<a href="index.php">Acceuil</a>
						</li>
						<li>
							<a href="about.php">Qui sommes nous?</a>
						</li>
						<li>
							<a href="courses.php">Condidats</a>
						</li>
						<li>
							<a href="join.php">Formations</a>
						</li>
						<li>
							<a href="contact.php">Contactez nous?</a>
						</li>
					</ul>
				</div>
				<div class="footer-middle-thanks">
					<h2>Merci a vous </h2>
				</div>
			</div>
		</div>
		<div class="footer-copy-right">
			<div class="container">
				
				<div class="footercopy-social">
					<ul>
						<li>
							<a href="#">
								<span class="fa fa-facebook"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-twitter"></span>
							</a>
						</li>
						<a href="#">
								<span class="fa fa-linkedin"></span>
							</a>
					</ul>
				</div>
				<div class="clearfix"></div>
					<div class="bottom_header_left">
				 &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
					
				 		<a href="index.php"> <img src="images/fr.png"> </a>
						<a href="en/index.php"> <img src="images/en.png"> </a>
						<a href="ru/index.php"> <img src="images/ru.png"> </a>
						<a href="es/index.php"> <img src="images/es.png"> </a>
								
							</div>
			</div>
		</div>
	</div>
	<!--/footer -->

	<!-- js files -->
	<!-- js -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- bootstrap -->
	<script src="js/bootstrap.js"></script>
	<!-- stats numscroller-js-file -->
	<script src="js/numscroller-1.0.js"></script>
	<!-- //stats numscroller-js-file -->
	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- smooth scrolling -->
	<!-- //js-files -->

</body>

</html>






					