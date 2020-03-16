<?php 
   @$type=$_POST["type"]; 
   if(empty($type)) $type="Histo"; 
   $x=800; 
   $y=500; 
   $marge=50; 
   $intX=($x-(2*$marge))/12; 
   $intY=($y-(2*$marge))/10; 
   $ventes=array(250,280,360,410,800,650,740,900,800,500,420,300); 
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
   imagettftext($img,20,0,$marge-45,$marge-25,$noir,"./AllCaps.ttf","Ventes"); 
   for($i=0;$i<=10;$i++){ 
      imageline($img,$marge-2,$y-$marge-($i*$intY),$marge+2,$y-$marge-($i*$intY),$noir); 
      imagettftext($img,10,0,$marge-45,$y-$marge-($i*$intY),$noir,"./AllCaps.ttf",$i*100); 
      if($i>0) 
         imageline($img,$marge+2,$y-$marge-($i*$intY),$x-$marge,$y-$marge-($i*$intY),$gris); 
   } 
   for($i=0;$i<12;$i++){ 
      imageline($img,$marge+$i*$intX,$y-$marge-2,$marge+$i*$intX,$y-$marge+2,$noir); 
      imagettftext($img,10,-45,$marge+$i*$intX,$y-$marge+20,$noir,"./AllCaps.ttf",$mois[$i]); 
      if($type=="Histo"){ 
         imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($ventes[$i]*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-1,$orange); 
         imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($ventes[$i]*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-($ventes[$i]*($y-2*$marge)/1000)+5,$noir); 
      } 
      elseif($type=="Courbe"){ 
         imagesetthickness($img,1); 
         if($i<11){ 
            imageline($img,$marge+$i*$intX+1,$y-$marge-($ventes[$i]*($y-2*$marge)/1000),$marge+($i+1)*$intX+1,$y-$marge-($ventes[$i+1]*($y-2*$marge)/1000),$orange); 
         } 
         imagefilledellipse($img,$marge+$i*$intX+1,$y-$marge-($ventes[$i]*($y-2*$marge)/1000),10,10,$noir); 
      } 
      imagettftext($img,12,0,$marge+$i*$intX+8,$y-$marge-($ventes[$i]*($y-2*$marge)/1000)-10,$orange,"./AllCaps.ttf",$ventes[$i]); 
   } 
   imagepng($img,"histo.png"); 
?> 
<html> 
   <head> 
      <style> 
         select{ 
            border:solid 1px #AAAAAA; 
            padding:10px; 
            margin:10px; 
            font:14pt "Century Gothic"; 
            color:#DD7700; 
            border-radius:10px; 
         } 
      </style> 
   </head> 
   <body> 
      <center> 
         <form name="fo" method="post" action=""> 
            <select name="type" onChange="this.form.submit()"> 
               <option <?php if($type=="Histo") echo "selected";?>>Histo</option> 
               <option <?php if($type=="Courbe") echo "selected";?>>Courbe</option> 
            </select>       
         </form> 
         <img src="histo.png"> 
      </center> 
   </body> 
</html> 