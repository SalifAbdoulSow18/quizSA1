<!DOCTYPE html>
<html>
<head>
	<title>exercice3</title>
</head>
<body>
	<h1 style='text-align:center;'>EXERCICE3</h1>
<form class="first" method="POST">
	<label style="font-size: 24px;">Combien de Mots :</label>
	 <input style=" width: 150px;
      height: 30px;
      position: relative;
      left: 15%;
     border: 3px solid black;" type="text" name="nbre">
	<input style=" width: 70px;
      height: 30px;
       position: relative;
      left: 15%;
      background-color: violet;" type="submit" name="valider" placeholder="Valider">
	
</form>


<?php 
if (isset($_POST['valider'])) {
	if (!(empty($_POST['valider']))) {
		$n=$_POST['nbre'];
	if (IsEntierPositif($n)) {
		echo '<form method="POST">';
		for ($i=1; $i <=$n ; $i++) { 
		echo '<label>';
		echo '<strong>mot: </strong> '.$i.':';
		echo '</label>';
		echo '<input type="text" name="champs[]">';
		echo '<br><br>';
		if ($i==$n) {
			echo '<input type="submit" name="submit" value="Resultat">';
		}
		}
		echo '</form>';
		
	}
	else{
	echo "saisissez que des nombres. Merci!!!";
	}
 
	}
 }
 
if (isset($_POST['submit'])) {
	 	$mots=$_POST['champs'];
	 	var_dump($_POST);

	 	$tesvalide=true;

 for ($i=0; $i <count($mots); $i++) 
  { 

 	if (empty($mots[$i]) or Motvalide($mots[$i])==false  ) 
 	{
 	   $tesvalide=false;
 	   break;
 	}

 	
 }

 if ($tesvalide==false){   
 	echo "il ya une ou des champs invalides ";
		echo '<form method="POST">';
		for ($i=1; $i <=size($mots) ; $i++) { 
		echo '<label>';
		echo '<strong>mot: </strong> '.$i.':';
		echo '</label>';
		echo '<input type="text" name="champs[]">';
		echo '<br><br>';
		if ($i==size($mots)) {
			echo '<input type="submit" name="submit" value="Resultat">';
		}
		}
		echo '</form>';
		
	
	 }
	 else {	 
	 	$cpt=0;
     for ($i=0; $i <size($mots) ; $i++) { 
     	if (VerifCaractere("m",$mots[$i])==true or VerifCaractere("M",$mots[$i])==true) {
     		echo "Mots contenant la lettre m:<br>";
     		echo $mots[$i].'<br>';
     		$cpt=$cpt+1;
     	}
     }
     echo "Le nombre de mots qui contient la lettre m est de :  $cpt";
	 }


}

// fonction qui verifie si un caractere est present dans une chaine 
 function VerifCaractere($car,$chaine) {
$trouve=false;
for ($i=0; $i <size($chaine); $i++) 
 { 
	if ($chaine[$i]==$car) 
	{
		$trouve=true;
		break;
    }

 }
 return $trouve;

}
	// fonction qui verifie si une chaine est valide c est a dire ne contient que des lettres alphabetiques 
function Motvalide($chaine) { 

$lettres=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$lettresM=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
$v=size($lettres);
$t=false;
$nbr=size($chaine);
if ($nbr>20) {
	$t=false;
}
 else {
 for ($i=0; $i <$nbr; $i++) 
  { 
 	   for ($j=0; $j <$v ; $j++) 
 	    { 
 	      if ($chaine[$i]==$lettres[$j] or $chaine[$i]==$lettresM[$j]) 
	 	      {
	 		    $t=true;
	 		    break;
	 	      }	 
	 	   if ($j==$v-1) {
	 	   	$t=false;
	 	   	break;
	 	   }

 	   }
 	   if ($t==false) 
	 	     {
	 	      break;
 	         }     
 }	
 }
 
return $t;
}


function IsEntierPositif($char){
	if ($char>0 && $char<=9) {
		return true;
	}
	else{
		return false;
	}
}


function size($chaine){
	for ($i=0; true ; $i++) { 
		if (!isset($chaine[$i])) {
			break;
		}
	}
	return $i;
}
?>

</body>
</html>