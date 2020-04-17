<?php
session_start();
$data=file_get_contents("base.json");
		$array=json_decode($data, true);
		

$data_joueur=file_get_contents("base_joueur.json");
		$array_joueur=json_decode($data_joueur, true);
		
if (isset($_POST['submit'])) {
	if (!(empty($_POST['login'])) && !(empty($_POST['password']))) {
		$log=$_POST['login'];
		$pass=$_POST['password'];
		foreach ($array as $value) {
			if ($log==$value['login'] && $pass==$value['pass']) {
				$_SESSION['admis']=$value;
				
				 header("Location:listequestion.php");
			}

			else{
				 echo  ' <script type="text/javascript"> alert("donnees incorrect")</script>';

			}
			
		}


		foreach ($array_joueur as $value) {
			if ($log==$value['login'] && $pass==$value['pass']) {
				$_SESSION['joueur']=$value;
				 header("Location:joueur.php");
			}

			else{
				 echo  ' <script type="text/javascript"> alert("donnees incorrect")</script>';

			}
		}
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>0.Page de connexion</title>
</head>
<div id="erreur"></div>
<body>
<style>
	.general{
		width: 100%;
		height: 880px;
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
		height: 100px;
		background-color: #052426;
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
		height: 700px;
		position: absolute;
	}
	.milieu{
		width: 60%;
		margin: auto;
		position: relative;
		top: 100px;
	}
	.first{
		width: 100%;
		height: 100px;
		background-color: #51BFD0;
	}
	.first h3{
		float: left;
		color: white;
	}
	.first h2{
		float: right;
		color: white;

	}
	.formulaire{
		width: 100%;
		background-color: white;
	}
	.text{
		width: 90%;
		height: 60px;
		margin: 15px;
		margin-left: 30px;
		border-radius: 0px 5px 5px 0px;
		background-image: url(./imagesquiz/ic-login.png);
		background-repeat: no-repeat;
		background-position: right;
		background-size: 20px;
	}
	
	.text2{
		width: 90%;
		height: 60px;
		margin: 15px;
		margin-left: 30px;
		border-radius: 0px 5px 5px 0px;
		background-image: url(./imagesquiz/ic-password.png);
		background-repeat: no-repeat;
		background-position: right;
		background-size: 20px;
	}
	.connex{
		display: block;
	}
	.connex input{
		width: 30%;
        height: 60px;
        margin: 15px;
		border-radius: 0px 5px 5px 0px;
		color: white;
		background-color: #51BFD0;
	}
	.connex h3{
		width: 65%;
		position: relative;
		left: 40%;
		bottom: 70px;
     color: #525659; 
	}
</style>





<div class="general">
<div class="contenant">
	<div class="haut">
		<img src="./imagesquiz/logo-QuizzSA.png">
		<h1>Le plaisir de jouer</h1>
	</div>
	<div class="contenue">
		<img src="./imagesquiz/img-bg.jpg">
		<div class="milieu">
			<div class="first">
				<h3> Login Form</h3>
				<h2 style="font-size: 28px;position: relative; right:5%;">x</h2>
			</div>
			<div class="formulaire">
				<form method="POST" id="formulaire">
					
					<input class="text" type="text" name="login" placeholder="Login" id="login" required>
					
					
					<input class="text2" type="password" name="password" placeholder="Password" id="pass" required>
					
					<div  class="connex">
					<input type="submit" name="submit" value="connexion">
			<a style="text-decoration: none;" href="creationuser.php"> <h3> S'inscrire pour jouer?</h3></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	
 
 const name=document.getElementById("login");
 const name=document.getElementById("pass");

 const form=document.getElementById('formulaire');
 const errorElement=document.getElementById('erreur');

 form.addEventListener('submit',(0))=>{
 	let messages=[];
 	if (name.value===''|| name.value==null){
 		messages.push('champ obligatoire');
 	}
 	if (messages.length>0) {
 		e.preventDefault();
 		errorElement.innerText=messages.join(',')
 	}
 }

</script>
</body>
</html>