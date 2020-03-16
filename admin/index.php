<?php 
	include '../config.php';
 $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['1']);

                   
                   $row = $stm->fetch();

                   $y1=$row['id']; 
 
 $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['2']);

                   
                   $row = $stm->fetch();

                   $y2=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['3']);

                   
                   $row = $stm->fetch();

                   $y3=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['4']);

                   
                   $row = $stm->fetch();

                   $y4=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['5']);

                   
                   $row = $stm->fetch();

                   $y5=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['6']);

                   
                   $row = $stm->fetch();

                   $y6=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['7']);

                   
                   $row = $stm->fetch();

                   $y7=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['8']);

                   
                   $row = $stm->fetch();

                   $y8=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['9']);

                   
                   $row = $stm->fetch();

                   $y9=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['10']);

                   
                   $row = $stm->fetch();

                   $y10=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['11']);

                   
                   $row = $stm->fetch();

                   $y11=$row['id']; 

                   $stm = $db->prepare('select COUNT(id_insc) as id from inscrit where month(date_insc)=?');
                   $stm->execute(['12']);

                   
                   $row = $stm->fetch();

                   $y12=$row['id'];                        
     






   @$type=$_POST["type"]; 
   if(empty($type)) $type="Histo"; 
   $x=800; 
   $y=500; 
   $marge=50; 
   $intX=($x-(2*$marge))/12; 
   $intY=($y-(2*$marge))/10; 
    $ventes=array($y1,$y2,$y3,$y4,$y5,$y6,$y7,$y8,$y9,$y10,$y11,$y12);
   $mois=array("JAN","FEV","MAR","AVR","MAI","JUI","JUL","AOU","SEP","OCT","NOV","DEC");  
   $img=imagecreatetruecolor($x,$y); 
   $noir=imagecolorallocate($img,0,0,0); 
   $blanc=imagecolorallocate($img,255,255,255); 
   $orange=imagecolorallocate($img,220,100,0); 
   $gris=imagecolorallocate($img,220,220,220); 
   imagefill($img,0,0,$blanc); 
   imageline($img,$marge,$y-$marge,$x-$marge,$y-$marge,$noir); 
   imageline($img,$marge,$y-$marge,$marge,$marge,$noir); 
   imagettftext($img,20,0,$x-$marge-10,$y-$marge+30,$noir,"./AllCaps.ttf","Mois"); 
   imagettftext($img,20,0,$marge-45,$marge-25,$noir,"./AllCaps.ttf","Nbr inscrit"); 
   for($i=0;$i<=10;$i++){ 
      imageline($img,$marge-2,$y-$marge-($i*$intY),$marge+2,$y-$marge-($i*$intY),$noir); 
      imagettftext($img,10,0,$marge-45,$y-$marge-($i*$intY),$noir,"./AllCaps.ttf",$i*10); 
      if($i>0) 
         imageline($img,$marge+2,$y-$marge-($i*$intY),$x-$marge,$y-$marge-($i*$intY),$gris); 
   } 
   for($i=0;$i<12;$i++){ 
      imageline($img,$marge+$i*$intX,$y-$marge-2,$marge+$i*$intX,$y-$marge+2,$noir); 
      imagettftext($img,10,-45,$marge+$i*$intX,$y-$marge+20,$noir,"./AllCaps.ttf",$mois[$i]); 
      if($type=="Histo"){ 
         imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($ventes[$i]*($y-2*$marge)/50),$marge+$i*$intX+40,$y-$marge-1,$orange); 
         imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($ventes[$i]*($y-2*$marge)/50),$marge+$i*$intX+40,$y-$marge-($ventes[$i]*($y-2*$marge)/50)+5,$noir); 
      } 
      elseif($type=="Courbe"){ 
         imagesetthickness($img,1); 
         if($i<11){ 
            imageline($img,$marge+$i*$intX+1,$y-$marge-($ventes[$i]*($y-2*$marge)/50),$marge+($i+1)*$intX+1,$y-$marge-($ventes[$i+1]*($y-2*$marge)/50),$orange); 
         } 
         imagefilledellipse($img,$marge+$i*$intX+1,$y-$marge-($ventes[$i]*($y-2*$marge)/50),10,10,$noir); 
      } 
      imagettftext($img,12,0,$marge+$i*$intX+8,$y-$marge-($ventes[$i]*($y-2*$marge)/50)-10,$orange,"./AllCaps.ttf",$ventes[$i]); 
    }
   imagepng($img,"histo.png"); 
   


?>
<!DOCTYPE html>
<html lang="en">
<head>

<script type="text/javascript">
  function myFunction() {
    $(window).load(function(){        
   $('#myModal').modal('show');
    }); 
}

  function ajaxing(){ 
            xhr=getxhr(); 
            xhr.onreadystatechange=function(){ 
               if(xhr.readyState==4) 
                  document.getElementById("divi").innerHTML=xhr.responseText; 
               else 
                  document.getElementById("divi").innerHTML="<img src='../images/loading.gif' />"; 
            } 
            xhr.open("post","AJAX_ex2.php",true); 
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
            xhr.send("message=La ligne"); 
         } 

</script>
 <style> 
         select{ 
            border:solid 1px #AAAAAA; 
            padding:0px; 
            margin:0px; 
            font:14pt "Century Gothic"; 
            color:#DD7700; 
            border-radius:10px; 
         } 
      </style> 




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
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
	
		
</head>

<body onload="myFunction()">
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
				</div>
			

			</div>
			<div id="content" class="span10">
  <div class="box">
               <div class="box-header">
                  <h2><i class="halflings-icon list-alt"></i><span class="break"></span>Nombre d'inscription par mois </h2>
                  <div class="box-icon">
                     <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                     <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                     <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                  </div>
               </div>

	<div class="box-content">
       <center> 
         <form name="fo" method="post" action=""> 
            <select name="type" onChange="this.form.submit()"> 
               <option <?php if($type=="Histo") echo "selected";?> >Histo</option> 
               <option <?php if($type=="Courbe") echo "selected";?>>Courbe</option> 
            </select>       
         </form> 
         <img src="histo.png"> 
      </center> 
					<!--	<div id="sincos"  class="center" style="height:300px;" ></div>-->
					</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Compteurs des nouvelles inscriptions</h4>
      </div>
      <div class="modal-body">


      	<?php 

      	$stm = $db->prepare('select count(*) as id_insc from inscrit  where etat=0 ');
      	 $stm->execute();
      foreach ($stm->fetchAll() as $row)
	{
	echo '<p>Vous avez : <a class=\"notif\" href="admin_listdemande.php"><font style="font-weight:bold;color:red"> <span><b>'.$row['id_insc']. '</span></b>  Demande(s) en attente</a> </p>';}
	?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>





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
	<script type="text/javascript">
		function charts() {
			if($("#sincos").length)
	{
		var cos = [
			<?php
						  $stm = $db->prepare('SELECT COUNT(id_insc)from inscrit where date_insc');
					    $stm->execute();

					    foreach($stm->fetchAll() as $row)
					    {
							echo '['.$row[0].','.$row[1].'],';
						}
						?>
		];

		var plot = $.plot($("#sincos"),
			   [ { data: cos, label: "Inscription" } ], {
				   series: {
					   lines: { show: true,
								lineWidth: 2,
							 },
					   points: { show: true },
					   shadowSize: 2
				   },
				   grid: { hoverable: true, 
						   clickable: true, 
						   tickColor: "#dddddd",
						   borderWidth: 0 
						 },
				   yaxis: { min: 0, max: 30 },
				   colors: ["#FA5833", "#2FABE9"]
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#sincos").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
	
	}
		
}
	</script>
	
</body>
</html>
