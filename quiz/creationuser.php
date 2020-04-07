<?php
if (isset($_POST['submit'])) {
	if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['password']) || empty($_POST['confpass'])) {
		$erreur= "Your message has not been sent. Please complete all required!!!";
	}
	else{
		$tab=array();
		$tab['nom']=$_POST['nom'];
		$tab ['prenom']=$_POST['prenom'];
		$tab ['login']=$_POST['login'];
		$tab ['pass']=$_POST['password'];
		$confpass=$_POST['confpass'];
		
		 $js_nde=file_get_contents("base.json");
		 $jsexit_nde=json_decode($js_nde,true);
			
		 $js=file_get_contents("base_joueur.json");
		  $jsexit=json_decode($js,true);
		 
		 foreach ($jsexit as $value) {
		 	if ($_POST['login']==$value['login']) {
		 		$erreur= "Veuillez changer votre login, il a un deja un proprietaire";
		 		break;
		 	}

	}
	if ($_POST['login']!=$value['login']) {
		if (($_POST['password']==$confpass) && ($_POST['login']!=$value['login'])) {
				
		  	 foreach ($jsexit_nde as $value) {
		 	if ($_POST['login']==$value['login']) {
		 		$erreur= "Veuillez changer votre login, il a un deja un proprietaire";
		 		break;
		 	}
		 	}
	if ($_POST['login']!=$value['login']) {
			header("Location:pagedeconnex.php");

		$succes= "Thank you, Your message has been sent successfully!!! ";
		
		 $jsexit[]=$tab;
		 $jsrenvoi=json_encode($jsexit);
		  file_put_contents('base_joueur.json', $jsrenvoi);
		}	
	}
	
	else{
				$erreur=  "Veuillez verifier le password!!";
				
}
	}
		
	}

}



?>
<!DOCTYPE html>
<html>
<head>
	<title>creation user</title>
</head>
<body>
<style>
  body{
    	margin: 0px;
    	padding: 0px;
    }
	.general{
		width: 100%;
		height: 1000px;
		background-color:#525659; 
		}
	.contenant{
		width: 80%;
		margin: auto;
		position: relative;
		top: 50px;		
	}
	.haut{
		width: 100%;
		height: 160px;
		background-color: #052426;
		position: relative;
		top: 20px;
	}
	.haut img{
		width: 8%;
		height: 100%;
		float: left;
	}
	.haut h1{
		width: 60%;
		color: white;
		float: right;
	}
	.contenue{
		width: 100%;
		}
	.contenue img{
		width: 100%;
		height: 780px;
		position: absolute;
}
	.milieu{
		width: 80%;
		margin: auto;
		background-color: white;
		position: relative;
		top: 5px;
		
	}
	
	
	
	.quiz{
		width: 100%;
		height: 760px;
		border-radius: 5px 5px 5px 5px;
		position: relative;
       
	}
	.droit{
		width: 60%;
		float: left;
	}
	.gauche{
		width: 35%;
		height: 200px;
		float: right;
	}
	.gauche img{
		width: 100%;
		height: 100%;
		position: relative;
		top: 30px;
		right: 10px;
		border: 3px solid #51BFD0;
		border-radius: 50%;
	}
	.droit label{
		float: left;
		clear: both;
		margin: 5px;
		
	}
	.droit input{
		width: 90%;
		height: 60px;
		float: left;
		clear: both;
        margin: 5px;
        border-radius: 5px 0px 0px 5px;
	}
	.bas{
		clear: both;
	}
	.bas h4{
		float: left;
	}
	.bas button{
		width: 150px;
		height:35px;
		position: relative;
		left: 35%;
		top: 10px;
		background-color:  #51BFD0;
         color: white;
	}
	.bas1 input{
		width: 150px;
		height:40px;		
		position: relative;
		left: 5%;
		background-color:  #51BFD0;
		color: white;
	}
</style>





<div class="general">
<div class="contenant">
	<div class="haut">
		<img src="logo-QuizzSA.png">
		<h1>Le plaisir de jouer</h1>
	</div>
	<div class="contenue">
		<img src="img-bg.jpg">
		<div class="milieu">
			
			
		
				<div class="quiz">
					<div class="droit">
						<h2>S'INSCRIRE</h2>
					<h4>Pour proposer des quizz</h4>
					<hr>
					<form method="POST">
					<label>Prenom</label>
					<input type="text" name="prenom">
					
					<label>Nom</label>
					<input type="text" name="nom">
					
					<label>Login</label>
					<input type="text" name="login">
					
					
					<label>Password</label>
					<input style="border: 2px solid  #51BFD0;" type="password" name="password">
					
					<label>Confirmer Password</label>
					<input style="border: 2px solid  #51BFD0;" type="password" name="confpass">
                       <div class="bas">
					<h4>Avatar</h4>
					<button>Choisir un Fichier</button>
						</div>
						<div class="bas1">
			<input type="submit" name="submit" value="Creer un Compte">						</div>

					</div>
					
					</form>
					<?php
					if (isset($erreur)) {
						echo '<font color="red">'.$erreur.'</font>';
					}

					?>
					<?php
					if (isset($succes)) {
						echo '<font color="green">'.$succes.'</font>';
					}

					?>

					
					<div class="gauche">
						<img src="img5.jpg" alt="avatar">
						<h3 style="position: relative; top: 10px;"><center>Avatar Admis</center></h3>

					</div>

				</div>
			
		</div>
	</div>
</div>
</div>
</body>
</html>