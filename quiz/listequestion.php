<?php
session_start();
if (!isset($_SESSION['admis'])) {
	header("Location:pagedeconnex.php");
}

$data_joueur=file_get_contents("questions.json");
		$array_joueur=json_decode($data_joueur, true);
				
				$_SESSION['Questions']=$array_joueur;
				$NbrParPage=5;
				$size=count($_SESSION['Questions']);
			$NbrDePage=ceil($size/$NbrParPage);
			
					if (isset($_POST['suiv'])) {
					$pageactuelle=intval($_POST['pageActuelle']);
					$pageactuelle++;
					
						if ($pageactuelle>$NbrDePage) {
							$pageactuelle=$NbrDePage;
						}
				}elseif (isset($_POST['suiv'])) {
					$pageactuelle=intval($_POST['pageActuelle']);
					$pageactuelle--;
					
				}

				else{
					$pageactuelle=1;
				}
			
			$IndiceDeDepart=($pageactuelle-1)*$NbrParPage;				
								


?>

<!DOCTYPE html>
<html>
<head>
	<title>1. Liste Questions</title>
</head>
<body>
<style>
    body{
    	margin: 0px;
    	padding: 0px;
    }
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
		height: 700px;
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
		height: 560px;
	    background-color:#F2F2F2;
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
	.text2{
		width: 98%;
		height: 50px;
		border-radius: 0px 5px 5px 0px;
		background-image: url(./imagesquiz/ic-liste-active.png);
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
   
	.quiz{
		width: 60%;
		height: 500px;
		position: relative;
		left:38%;
		border: 1px solid white;
		border-radius: 5px 5px 5px 5px;
		background-color: white;
		position: relative;
        bottom: 65%;
	}
	.nbr{
		width: 100%;
		height: 7%;
	}
	.nbr label{
		color: grey;
		font-size: 18px;
		position: relative;
		left: 35%;
		top:5px;
		margin: 5px;
	}
	.nbr input{
		width: 5%;
		position: relative;
		left: 35%;
		top:5px;
		margin: 5px;
	}
	.quiztext{
		width: 90%;
		height: 85%;
		margin:auto;
		overflow: auto;
		background-image: linear-gradient(white , #C4E9EF);
		border: 1px solid grey;
		border-radius: 5px 5px 5px 5px;
		}
	.suiv{
		width: 100%;
		height: 10%;
		background-color: #F8F3F0;
	}
	.next{
		width:15%;
		color: white;
		border-radius: 5px;
		position: relative;
		left: 60%;
		top: 3px;
		background-color: #3CDED6; 
	}
	.prex{
		width:20%;
		color: white;
		border-radius: 5px;
		position: relative;
		left: 5%;
		top: 3px;
		background-color: #3CDED6; 
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
				<a href="Deconnexion.php"><button>Deconnexion</button></a>
			</div>
			<div class="milieu1">
				<div class="limg">
					<div class="image">
						<img src="<?php echo $_SESSION['admis']['avatar']; ?>">
	<h3> <?= $_SESSION['admis']['prenom'] ?> <br> <?= $_SESSION['admis']['nom'] ?> </h3>
					</div>
                    <div id="texte">
                   	<input class="text2" type="text" name="listquiz" placeholder="Liste Questions">
                     <a style="text-decoration: none;" href="creeradmis.php"><input class="text1" type="text" name="creadmis" placeholder="Creer Admis"></a>
                      <a style="text-decoration: none;" href="listejoueurs.php">	<input class="text" type="text" name="listjoueur" placeholder="Liste Joueur"></a>
                      <a style="text-decoration: none;" href="creerquestons.php"><input class="text1" type="text" name="crequiz" placeholder="Creer Question"></a>
                    </div>
				</div>
				<div class="quiz">
					<div class="nbr">
						<label>Nbre de question/jeu</label>
						<input type="text" name="num">
						<input style="background-color: blue;" type="submit" name="submit" value="OK">
					</div>
					<div class="quiztext">
						<?php
					for ($i=$IndiceDeDepart; $i <($IndiceDeDepart+$NbrParPage) ; $i++) {
						if (array_key_exists($i, $_SESSION['Questions'])) {
						 ?>
						 <ul>
						<li><?php echo  $_SESSION['Questions'][$i]['quiz'] ?></li>
						<li><?php echo  $_SESSION['Questions'][$i]['number'] ?>pts</li>
						<li><?php echo  $_SESSION['Questions'][$i]['choise'] ?></li>
						<li><?php
						
					if ($_SESSION['Questions'][$i]['choise']=="choix texte") {?>
		<input type="text" value="<?=$_SESSION['Questions'][$i]['add']?>" name="" readonly>				 
						<?php
						}
						?>
						<?php
						if ($_SESSION['Questions'][$i]['choise']=="choix simple"){
							 foreach (($_SESSION['Questions'][$i]['add']) as $key => $value) {
							 if ($key==$_SESSION['Questions'][$i]['answer']) {?>
					<input type="radio" value="<?=$value?>" name="" checked><?php echo "$value<br>"; ?> 
							 <?php	
							 }
							 else{
							 	?>
	 <input type="radio" value="<?=$value?>" name="" disable><?php echo "$value<br>"; ?>  
						 	
					<?php	}}}?> 
						

							<?php 
							if ($_SESSION['Questions'][$i]['choise']=="choix multiple"){
								
							foreach ($_SESSION['Questions'][$i]['add'] as $key=> $value) {
								if (in_array($key,$_SESSION['Questions'][$i]['answer'])) {?>
			<input type="checkbox" value="<?=$value?>" name="" disabled checked><?php echo "$value<br>"?>
							<?php	}
							else{?>
			<input type="checkbox" value="<?=$value?>" name="" disabled>
								<?php echo "$value<br>"?>
						<?php	}
								
								}
								}
						 ?></li>
						</ul>
						<?php }}?>	
						
					</div>
					
						<form method="POST">
						<div class="suiv">
						<input type="hidden" name="pageActuelle" value="<?php echo $pageactuelle ?>">
						<input type="submit" name ="prec" class="prex" value="precedent">	
						<input type="submit" name ="suiv" class="next" value="suivant">
					</div>

					</form>	

					
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>