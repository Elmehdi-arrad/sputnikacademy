<?php
include 'config.php';



if(isset($_POST['submit'])){
	$sizecv=24857600;
		$sizeimg=14857600;
		$type1="image/jpeg";
		$type="image/png";
		$type2="application/pdf";
		$type3="application/msword";


	if ($_POST['motdepasse'] == $_POST['confirmer'] ){
			if ($_FILES['image']['size'] < $sizeimg && $_FILES['cv']['size'] < $sizecv  )
			{
							if ($_FILES['image']['type'] == $type1  || $_FILES['image']['type'] ==$type ){
			if ($_FILES['cv']['type'] == $type2   || $_FILES['cv']['type'] == $type3 )
	{
		
		$stm = $db->prepare('insert into etudiant(`Nom`,`Prenom`,`Age`,`Date_naiss`,`Sexe`,`Email`,
			`Telephone`,`Pays`,`Ville`,`Nationnalite`,`Adress`,`login`,`pass`,`Cv`, `CIN`, 
			`Passport`, `Optontion`, `Niveau`, `Image`) 
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

	$namefileimg = $_FILES["image"]["name"];move_uploaded_file($_FILES["image"]["tmp_name"],"cv/".$namefileimg);
	$namefile = $_FILES["cv"]["name"];move_uploaded_file($_FILES["cv"]["tmp_name"],"cv/".$namefile);

  		
$stm->execute([$_POST['Nom'],$_POST['Prenom'],$_POST['Age'],$_POST['dateniassance'],$_POST['sexe'],$_POST['email'],
	$_POST['telephone'],$_POST['pays'],$_POST['ville'],$_POST['nationnalite'],$_POST['adress'],
$_POST['utilisateur'],$_POST['motdepasse'],$namefile,$_POST['cin'],$_POST['passport'],$_POST['optontion'],$_POST['Niveau'],
$namefileimg]);      

		}			
		}
		}	
	}
    header("LOCATION: login.php");
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
				<li>Inscription</li>
			</ul>
		</div>
	</div>
	<!-- //short-->
	<div class="register-form-main">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>F</span>ormulaire
					<span>D'</span>inscription
				</h3>
				<div class="tittle-style">
 
				</div>
			</div>
			<div class="register-form">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="fields-grid">
						<div class="styled-input">
							<input type="text" placeholder="Votre Nom" name="Nom" required>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Votre Prénom" name="Prenom" required>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Votre N cin" name="cin" required>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Votre N passport" name="passport" required>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Votre date d'optontion du diplome" name="optontion" required>
						</div>
						<div class="styled-input">
							<select class="category2" name="Niveau"  required>
							<option value=""  >Votre Niveau</option>
								<option value="Bac">Bac</option>
								<option value="Bac +2">Bac +2</option>
								<option value="Bac +3">Bac +3</option>
								<option value="Bac +5">Bac +5</option>
								<option value="Doctorat ">Doctorat</option>
							</select>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Votre Age" name="Age" required>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Votre date de naissance" name="dateniassance" required>
						</div>
						<div class="styled-input">
							<select class="category2" name="sexe" required="">
							<option value="" selected="">Votre sexe</option>
								<option value="Homme">Homme</option>
								<option value="Femme">Femme</option>
							
							</select>
						</div>
						<div class="styled-input">
							<input type="email" placeholder="Votre email" name="email" required>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="votre numéro de telephone" name="telephone"  required>
						</div>
						<div class="styled-input">
							<select class="category2" name="pays"   required>
<option >Pays</option> 
<option value="Afghanistan">Afghanistan </option>
<option value="Afrique_Centrale">Afrique_Centrale </option>
<option value="Afrique_du_sud">Afrique_du_Sud </option> 
<option value="Albanie">Albanie </option>
<option value="Algerie">Algerie </option>
<option value="Allemagne">Allemagne </option>
<option value="Andorre">Andorre </option>
<option value="Angola">Angola </option>
<option value="Anguilla">Anguilla </option>
<option value="Arabie_Saoudite">Arabie_Saoudite </option>
<option value="Argentine">Argentine </option>
<option value="Armenie">Armenie </option> 
<option value="Australie">Australie </option>
<option value="Autriche">Autriche </option>
<option value="Azerbaidjan">Azerbaidjan </option>

<option value="Bahamas">Bahamas </option>
<option value="Bangladesh">Bangladesh </option>
<option value="Barbade">Barbade </option>
<option value="Bahrein">Bahrein </option>
<option value="Belgique">Belgique </option>
<option value="Belize">Belize </option>
<option value="Benin">Benin </option>
<option value="Bermudes">Bermudes </option>
<option value="Bielorussie">Bielorussie </option>
<option value="Bolivie">Bolivie </option>
<option value="Botswana">Botswana </option>
<option value="Bhoutan">Bhoutan </option>
<option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
<option value="Bresil">Bresil </option>
<option value="Brunei">Brunei </option>
<option value="Bulgarie">Bulgarie </option>
<option value="Burkina_Faso">Burkina_Faso </option>
<option value="Burundi">Burundi </option>

<option value="Caiman">Caiman </option>
<option value="Cambodge">Cambodge </option>
<option value="Cameroun">Cameroun </option>
<option value="Canada">Canada </option>
<option value="Canaries">Canaries </option>
<option value="Cap_vert">Cap_Vert </option>
<option value="Chili">Chili </option>
<option value="Chine">Chine </option> 
<option value="Chypre">Chypre </option> 
<option value="Colombie">Colombie </option>
<option value="Comores">Colombie </option>
<option value="Congo">Congo </option>
<option value="Congo_democratique">Congo_democratique </option>
<option value="Cook">Cook </option>
<option value="Coree_du_Nord">Coree_du_Nord </option>
<option value="Coree_du_Sud">Coree_du_Sud </option>
<option value="Costa_Rica">Costa_Rica </option>
<option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
<option value="Croatie">Croatie </option>
<option value="Cuba">Cuba </option>

<option value="Danemark">Danemark </option>
<option value="Djibouti">Djibouti </option>
<option value="Dominique">Dominique </option>

<option value="Egypte">Egypte </option> 
<option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
<option value="Equateur">Equateur </option>
<option value="Erythree">Erythree </option>
<option value="Espagne">Espagne </option>
<option value="Estonie">Estonie </option>
<option value="Etats_Unis">Etats_Unis </option>
<option value="Ethiopie">Ethiopie </option>

<option value="Falkland">Falkland </option>
<option value="Feroe">Feroe </option>
<option value="Fidji">Fidji </option>
<option value="Finlande">Finlande </option>
<option value="France">France </option>

<option value="Gabon">Gabon </option>
<option value="Gambie">Gambie </option>
<option value="Georgie">Georgie </option>
<option value="Ghana">Ghana </option>
<option value="Gibraltar">Gibraltar </option>
<option value="Grece">Grece </option>
<option value="Grenade">Grenade </option>
<option value="Groenland">Groenland </option>
<option value="Guadeloupe">Guadeloupe </option>
<option value="Guam">Guam </option>
<option value="Guatemala">Guatemala</option>
<option value="Guernesey">Guernesey </option>
<option value="Guinee">Guinee </option>
<option value="Guinee_Bissau">Guinee_Bissau </option>
<option value="Guinee equatoriale">Guinee_Equatoriale </option>
<option value="Guyana">Guyana </option>
<option value="Guyane_Francaise ">Guyane_Francaise </option>

<option value="Haiti">Haiti </option>
<option value="Hawaii">Hawaii </option> 
<option value="Honduras">Honduras </option>
<option value="Hong_Kong">Hong_Kong </option>
<option value="Hongrie">Hongrie </option>

<option value="Inde">Inde </option>
<option value="Indonesie">Indonesie </option>
<option value="Iran">Iran </option>
<option value="Iraq">Iraq </option>
<option value="Irlande">Irlande </option>
<option value="Islande">Islande </option>
<option value="Israel">Israel </option>
<option value="Italie">italie </option>

<option value="Jamaique">Jamaique </option>
<option value="Jan Mayen">Jan Mayen </option>
<option value="Japon">Japon </option>
<option value="Jersey">Jersey </option>
<option value="Jordanie">Jordanie </option>

<option value="Kazakhstan">Kazakhstan </option>
<option value="Kenya">Kenya </option>
<option value="Kirghizstan">Kirghizistan </option>
<option value="Kiribati">Kiribati </option>
<option value="Koweit">Koweit </option>

<option value="Laos">Laos </option>
<option value="Lesotho">Lesotho </option>
<option value="Lettonie">Lettonie </option>
<option value="Liban">Liban </option>
<option value="Liberia">Liberia </option>
<option value="Liechtenstein">Liechtenstein </option>
<option value="Lituanie">Lituanie </option> 
<option value="Luxembourg">Luxembourg </option>
<option value="Lybie">Lybie </option>

<option value="Macao">Macao </option>
<option value="Macedoine">Macedoine </option>
<option value="Madagascar">Madagascar </option>
<option value="Madère">Madère </option>
<option value="Malaisie">Malaisie </option>
<option value="Malawi">Malawi </option>
<option value="Maldives">Maldives </option>
<option value="Mali">Mali </option>
<option value="Malte">Malte </option>
<option value="Man">Man </option>
<option value="Mariannes du Nord">Mariannes du Nord </option>
<option value="Maroc">Maroc </option>
<option value="Marshall">Marshall </option>
<option value="Martinique">Martinique </option>
<option value="Maurice">Maurice </option>
<option value="Mauritanie">Mauritanie </option>
<option value="Mayotte">Mayotte </option>
<option value="Mexique">Mexique </option>
<option value="Micronesie">Micronesie </option>
<option value="Midway">Midway </option>
<option value="Moldavie">Moldavie </option>
<option value="Monaco">Monaco </option>
<option value="Mongolie">Mongolie </option>
<option value="Montserrat">Montserrat </option>
<option value="Mozambique">Mozambique </option>

<option value="Namibie">Namibie </option>
<option value="Nauru">Nauru </option>
<option value="Nepal">Nepal </option>
<option value="Nicaragua">Nicaragua </option>
<option value="Niger">Niger </option>
<option value="Nigeria">Nigeria </option>
<option value="Niue">Niue </option>
<option value="Norfolk">Norfolk </option>
<option value="Norvege">Norvege </option>
<option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
<option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

<option value="Oman">Oman </option>
<option value="Ouganda">Ouganda </option>
<option value="Ouzbekistan">Ouzbekistan </option>

<option value="Pakistan">Pakistan </option>
<option value="Palau">Palau </option>
<option value="Palestine">Palestine </option>
<option value="Panama">Panama </option>
<option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
<option value="Paraguay">Paraguay </option>
<option value="Pays_Bas">Pays_Bas </option>
<option value="Perou">Perou </option>
<option value="Philippines">Philippines </option> 
<option value="Pologne">Pologne </option>
<option value="Polynesie">Polynesie </option>
<option value="Porto_Rico">Porto_Rico </option>
<option value="Portugal">Portugal </option>

<option value="Qatar">Qatar </option>

<option value="Republique_Dominicaine">Republique_Dominicaine </option>
<option value="Republique_Tcheque">Republique_Tcheque </option>
<option value="Reunion">Reunion </option>
<option value="Roumanie">Roumanie </option>
<option value="Royaume_Uni">Royaume_Uni </option>
<option value="Russie">Russie </option>
<option value="Rwanda">Rwanda </option>

<option value="Sahara Occidental">Sahara Occidental </option>
<option value="Sainte_Lucie">Sainte_Lucie </option>
<option value="Saint_Marin">Saint_Marin </option>
<option value="Salomon">Salomon </option>
<option value="Salvador">Salvador </option>
<option value="Samoa_Occidentales">Samoa_Occidentales</option>
<option value="Samoa_Americaine">Samoa_Americaine </option>
<option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option> 
<option value="Senegal">Senegal </option> 
<option value="Seychelles">Seychelles </option>
<option value="Sierra Leone">Sierra Leone </option>
<option value="Singapour">Singapour </option>
<option value="Slovaquie">Slovaquie </option>
<option value="Slovenie">Slovenie</option>
<option value="Somalie">Somalie </option>
<option value="Soudan">Soudan </option> 
<option value="Sri_Lanka">Sri_Lanka </option> 
<option value="Suede">Suede </option>
<option value="Suisse">Suisse </option>
<option value="Surinam">Surinam </option>
<option value="Swaziland">Swaziland </option>
<option value="Syrie">Syrie </option>

<option value="Tadjikistan">Tadjikistan </option>
<option value="Taiwan">Taiwan </option>
<option value="Tonga">Tonga </option>
<option value="Tanzanie">Tanzanie </option>
<option value="Tchad">Tchad </option>
<option value="Thailande">Thailande </option>
<option value="Tibet">Tibet </option>
<option value="Timor_Oriental">Timor_Oriental </option>
<option value="Togo">Togo </option> 
<option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
<option value="Tristan da cunha">Tristan de cuncha </option>
<option value="Tunisie">Tunisie </option>
<option value="Turkmenistan">Turmenistan </option> 
<option value="Turquie">Turquie </option>

<option value="Ukraine">Ukraine </option>
<option value="Uruguay">Uruguay </option>

<option value="Vanuatu">Vanuatu </option>
<option value="Vatican">Vatican </option>
<option value="Venezuela">Venezuela </option>
<option value="Vierges_Americaines">Vierges_Americaines </option>
<option value="Vierges_Britanniques">Vierges_Britanniques </option>
<option value="Vietnam">Vietnam </option>

<option value="Wake">Wake </option>
<option value="Wallis et Futuma">Wallis et Futuma </option>

<option value="Yemen">Yemen </option>
<option value="Yougoslavie">Yougoslavie </option>

<option value="Zambie">Zambie </option>
<option value="Zimbabwe">Zimbabwe </option>
							</select>
							</div>
							<div class="styled-input">
							<input type="text" placeholder="votre Ville" name="ville"  required>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Votre Nationnalite" name="nationnalite" required>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Votre Adresse" name="adress" required>
						</div>
						<div class="styled-input">
	<input type="text" placeholder="Votre nom utilisateur" name="utilisateur" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=" Votre nom utilisateur doit contenir au moins un chiffre et une lettre majuscule et minuscule, et au moins 8 caractères ou plus" required>
						


						</div>
						<div class="styled-input">
							<input type="text" placeholder="Votre mot de passe" name="motdepasse" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Doit contenir au moins un chiffre et une lettre majuscule et minuscule, et au moins 6 caractères ou plus"  required>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Confirmer votre mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Doit contenir au moins un chiffre et une lettre majuscule et minuscule, et au moins 6 caractères ou plus" name="confirmer"  required>
						</div>
						<div class="styled-input"> </div>
						<label>Postuler votre CV : max 20 M </label>
						<input type="file" value="Posez votre CV" value="Postulez votre fichier" name="cv">
						<label>Postuler votre Photo : max 10 M</label>
						<input type="file" value="Posez votre image" value="Postulez votre fichier" name="image" required>
					</div>
					<input type="submit" name="submit" value="Valider">
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
	<!-- Calendar -->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>
	<!-- //Calendar -->
	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function () {
		

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>


</body>

</html>