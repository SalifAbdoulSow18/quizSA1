<?php
session_start();
if (!isset($_SESSION['joueur'])) {
	header("Location:pagedeconnex.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Interface Joueurs</title>
</head>
<body>
<style>
	.general{
		width: 100%;
		height: 980px;
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
		height: 150px;
		background-color: #052426;
		position: relative;
		top: 20px;
	}
	.haut img{
		width: 8%;
		height: 95%;
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
		height: 750px;
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
		height: 200px;
		background-color: #51BFD0;
		}
		.image{
		width: 100%;
		height: 100%;
		background-color:  #51BFD0;
	}
	
		.image img{
		width: 15%;
		height: 80%;
		position: relative;
		}
        .image h4{
        	width: 15%;
        	color: white;
        	position: relative;
        	bottom: 10%;
        	left: 1%;
        }
	.first h3{
		width: 60%;
		height: 100%;
		position: relative;
		left: 20%;
		bottom: 165px;
		color: white;
	}

	.first button{
		width: 18%;
		height: 30px;        
		position: relative;
		left: 80%;
		bottom: 380px;
		background-color: #3CDED6; 
		color: white;
	}
	
	.milieu1{
		width: 100%;
		height: 560px;
	    background-color:  #F2F2F2;
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
			<div class="first">
				<div class="image">
						<img src="img5.jpg">
<h4><?= $_SESSION['joueur']['prenom'] ?><?= $_SESSION['joueur']['nom'] ?></h4>
 				<h3> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ
JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE </h3>
		<a href="Deconnexion.php"><button>Deconnexion</button></a>
				</div>	
			</div>
			<div class="milieu1">
				
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>