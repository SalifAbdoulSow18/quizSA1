<?php
session_start();

if (!isset($_SESSION['admis'])) {
	header("Location:pagedeconnex.php");
}

if (isset($_POST['submit'])) {
	if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['password']) || empty($_POST['confpass'])) {
		$erreur= "Your message has not been sent. Please complete all required!!!";
	}
	else{

			  $format=['image/png','image/jpg','image/jpeg'];
if (in_array($_FILES['file']['type'], $format)) {
	$array=explode('.', $_FILES['file']['name']);
	$filename=date('YmdHis').".".$array[sizeof($array)-1];
	if (move_uploaded_file($_FILES['file']['tmp_name'], './imagesquiz/UserImages/'.$filename)) {
	$photo= './imagesquiz/UserImages/'.$filename;
	
		$tab=array();
		$tab['nom']=$_POST['nom'];
		$tab ['prenom']=$_POST['prenom'];
		$tab ['login']=$_POST['login'];
		$tab ['pass']=$_POST['password'];
		$confpass=$_POST['confpass'];
		$tab['avatar']=$photo;

	}

	else{
		$erreur="format incorrect";
	}
}

		 $js_nde=file_get_contents("base_joueur.json");
		  $jsexit_nde=json_decode($js_nde,true);
		 

		 $js=file_get_contents("base.json");
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
		  			header("Location:listequestion.php");

	$succes= "Thank you, Your message has been sent successfully!!! ";
		
		 $jsexit[]=$tab;
		 $jsrenvoi=json_encode($jsexit,JSON_PRETTY_PRINT);
		  file_put_contents('base.json', $jsrenvoi);
		  		}	  		
	}
	
			else{
				$erreur= "Veuillez verifier le password!!";
				}
	}
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>2. Creer Admis</title>
</head>
<div id="erreur"></div>
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
		height: 100px;
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
		height: 800px;
		position: absolute;

      
	}
	.milieu{
		width: 95%;
		margin: auto;
		position: relative;
		top: 5px;
		
	}
	.first{
		width: 100%;
		height: 100px;
		background-color: #51BFD0;
		
	}
	.first h2{
		width: 60%;
		position: relative;
		left: 20%;
		top: 45%;
		color: white;
	}
	.first button{
		width: 15%;
		height: 30px;
		position: relative;
		left: 80%;
		bottom: 20px;
		background-color: #3CDED6; 
		color: white;
	}
	
	.milieu1{
		width: 100%;
		height: 650px;
	    background-color: #F2F2F2;
	}
	.limg{
		width: 35%;	
		position: relative;
		top:40px;
		left: 5px;
		border: 1px solid grey;
		border-radius: 5px 5px 5px 5px;
	}
	.image{
		width: 100%;
		height: 150px;
background-image: linear-gradient(white 3px, #51BFD0);	}
	.image img{
		width: 35%;
		height: 120px;
		border-radius: 50%;
	   position: relative;
	   top: 10px;
	}
	.image h3{
		float: right;
	}
	.text{
		width: 98%;
		height: 50px;
		border-radius: 0px 5px 5px 0px;
		background-image: url(./imagesquiz/ic-liste.png);
		background-repeat: no-repeat;
		background-position: right;
	}
	.text1{
		width: 98%;
		height: 50px;
		border-radius: 0px 5px 5px 0px;
		background-image: url(./imagesquiz/ic-ajout.png);
		background-repeat: no-repeat;
		background-position: right;
	}
	.text2{
		width: 98%;
		height: 50px;
		border-radius: 0px 5px 5px 0px;
		background-image: url(./imagesquiz/ic-ajout-active.png);
		background-repeat: no-repeat;
		background-position: right;
	}
    
	.quiz{
		width: 60%;
		height: 550px;
		overflow: auto;
		background-image: linear-gradient(white , #C4E9EF);
		position: relative;
		left:38%;
		border: 1px solid grey;
		background-color: white;
		border-radius: 5px 5px 5px 5px;
		position: relative;
        bottom: 65%;
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
		height: 200px;
		position: relative;
		top: 30px;
		right: 10px;
		border: 3px solid #51BFD0;
		border-radius: 50%;
	}
	.droit label{
		float: left;
		clear: both;
		margin: 3px;
		
	}
	.droit input{
		width: 90%;
		height: 30px;
		float: left;
		clear: both;
        margin: 3px;
        border-radius: 5px 0px 0px 5px;
	}
	.bas{
		clear: both;
	}
	.bas h4{
		float: left;
	}
	input[type='file']{
		position: relative;
		left: 35%;
		bottom: 45px;
		opacity: 0;
		width: 0;
		 	}
	.bas label{
		width: 150px;
		height: 30px;
		text-align: center;
		position: relative;
		left: 35%;
		bottom: 45px;
		background-color: #51BFD0;
		color: #fff;
		font-size: 20px;
		border-radius: 2px;
	}
	.bas1 input{
		width: 150px;
		height:35px;		
		position: relative;
		left: 5%;
		bottom: 80px;
		background-color:  #51BFD0;
		color: white;
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
				<h2> CREER ET PARAMETRER VOS QUIZZ</h2>
		<button>Deconnexion</button>
			</div>
			<div class="milieu1">
				<div class="limg">
					<div class="image">
				<img src="<?php echo $_SESSION['admis']['avatar']; ?>">
		<h3> <?= $_SESSION['admis']['prenom'] ?> <br> <?= $_SESSION['admis']['nom'] ?></h3>
					</div>
                    <div id="texte">
                     <a style="text-decoration: none;" href="listequestion.php"><input class="text" type="text" name="listquiz" placeholder="Liste Questions"></a>
                    	<input class="text2" type="text" name="creadmis" placeholder="Creer Admis">
                     <a style="text-decoration: none;" href="listejoueurs.php"><input class="text" type="text" name="listjoueur" placeholder="Liste Joueur"></a>
                    <a style="text-decoration: none;" href="creerquestons.php"><input class="text1" type="text" name="crequiz" placeholder="Creer Question"></a>
                     <a style="text-decoration: none;" href="chartbilan.php"><input class="text" type="text" name="crequiz" placeholder="Bilan Users"></a>
                    </div>
				</div>
				<div class="quiz">
					<div class="droit">
						<h2>S'INSCRIRE</h2>
					<h4>Pour proposer des quizz</h4>
					<hr>
					<form action="creeradmis.php" method="POST" enctype="multipart/form-data" id="formulaire">
					<label>Prenom</label>
				<input type="text" name="prenom" id="prenom" required>
					
					<label>Nom</label>
					<input type="text" name="nom" id="nom" required>
					
					<label>Login</label>
					<input type="text" name="login" id="login" required>
					
					
					<label>Password</label>
					<input style="border: 2px solid  #51BFD0;" type="password" name="password" id="pass" required>
					
					<label>Confirmer Password</label>
					<input style="border: 2px solid  #51BFD0;" type="password" name="confpass" id="confpass" required>
                       <div class="bas">
					<h4>Avatar</h4>
				<label for="file">Choisir un fichier</label>
					<input type="file" name="file" id="file"  accept=".png, .jpeg, .jpg" onchange="loadFile(event)">						</div>
						<div class="bas1">
			<input type="submit" name="submit" value="Creer un Compte">					</div>
					</form>

					</div>
					<div class="gauche">
						<img src="./imagesquiz/img5.jpg"  alt="avatar" id="output">
						<h4 style="position: relative; top: 10px;"><center>Avatar Admis</center></h4>




						<?php
					if (isset($erreur)) {
						echo '<font color="red">'.$erreur.'</font>';
						}
						?>
					

					
					<?php
					if (isset($succes)) {
						echo '<font color="red">'.$succes.'</font>';
					}
					?>

					</div>
				</div>
				
			</div>

		</div>
	</div>
</div>
</div>

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>

<script>
	
 const name=document.getElementById("prenom");
 const name=document.getElementById("nom");
 const name=document.getElementById("login");
 const name=document.getElementById("pass");
 const name=document.getElementById("confpass");

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
