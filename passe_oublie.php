<?php
include "config.php";
require 'PHPMailer-master/PHPMailerAutoload.php';
if(isset($_GET['logout']))
	unset($_SESSION['login']);

if(isset($_SESSION['login']))
{
	header("LOCATION: etu_univ.php");
	exit();
}
							

if(isset($_POST['username']) && isset($_POST['Email']))
{
	$stm = $db->prepare('select Email from etudiant where login=? and Email=?');
    $stm->execute([$_POST['username'],$_POST['Email']]);

    foreach($stm->fetchAll() as $row)
						    {
	$mailto = $row['Email'];
}
    $mailSub = "Mot de Passe Oublié";
	$mailMsg = "Pour vous saisir a nouveau votre mot de passe Clickez sur se url : http://localhost:8888/spotnic11/passe_oublie.php" ;
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
       header("LOCATION: passe_oublie.php");
   }
   else
   {
       header("LOCATION: nouveau_pass.php");
   }


}

?>

<!DOCTYPE html>
<html  lang="fr-FR">

<head>
	<title>Sputnik Academy</title>
	<!-- meta-tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
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
					<a href="login.php">
						<span class="fa fa-sign-out" aria-hidden="true"></span>Connexion</a>
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

	<div class="services-breadcrumb">
		<div class="inner_breadcrumb">
			<ul class="short_ls">
				<li>
					<a href="index.php">Acceuil</a>
					<span>| |</span>
				</li>
				<li>Connexion</li>
			</ul>
		</div>
	</div>
	<!-- //short-->
	<div class="register-form-main">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>P</span>asse 
					<span>O</span>ublié
				</h3>
				<div class="tittle-style">

				</div>
			</div>
			<div class="login-form">
				<form action="#" method="post">
					<div class="">
						<p>Nom utilisateur </p>
						<input type="text" class="name" name="username" required />
					</div>
					<div class="">
						<p>Email</p>
						<input type="text" class="Email" name="Email" required />
					</div>

					
					
					<input type="submit" value="Envoyer">
					
				</form>
			</div>

		</div>
	</div>

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
					<h2>Merci a vous</h2>
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
							<li>
							<a href="#">
								<span class="fa fa-linkedin"></span>
							</a>
						</li>
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