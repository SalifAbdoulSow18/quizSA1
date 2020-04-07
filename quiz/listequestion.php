<?php
session_start();
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
		height: 100px;
		background-color:  #51BFD0;
	}
	.image img{
		width: 35%;
		height: 90px;
		border-radius: 50%;
	   position: relative;
	   top: 5px;
		
	}
	.image h3{
		float: right;
	}
	.text{
		width: 98%;
		height: 50px;
		border-radius: 0px 5px 5px 0px;
		background-image: url(ic-liste.png);
		background-repeat: no-repeat;
		background-position: right;
	}
	.text2{
		width: 98%;
		height: 50px;
		border-radius: 0px 5px 5px 0px;
		background-image: url(ic-liste-active.png);
		background-repeat: no-repeat;
		background-position: right;
	}
	
	.text1{
		width: 98%;
		height: 50px;
		border-radius: 0px 5px 5px 0px;
		background-image: url(ic-ajout.png);
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
        bottom: 57%;
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
		border: 1px solid grey;
		border-radius: 5px 5px 5px 5px;
		}
	.suiv{
		width: 100%;
		height: 7%;
		background-color: #F8F3F0;
	}
	.suiv button{
		width:15%;
		color: white;
		border-radius: 5px;
		position: relative;
		left: 80%;
		top: 5px;
		background-color: #3CDED6; 
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
				<h2> CREER ET PARAMETRER VOS QUIZZ</h2>
				<button>Deconnexion</button>
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
					<div class="quiztext"></div>
					<div class="suiv">
						<button class="next">suivant</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>