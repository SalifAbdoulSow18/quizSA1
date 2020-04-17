<?php
session_start();
if (!isset($_SESSION['admis'])) {
	header("Location:pagedeconnex.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>4. Creer Question</title>
</head>
<body>
	
<style>
	  body{
    	margin: 0px;
    	padding: 0px;
    }
	.general{
		width: 100%;
		height: 1200px;
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
		height: 1000px;
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
		height: 800px;
	    background-color: #F2F2F2;
	    position: relative;
	    bottom: 13%;
	}
	
	.limg{
		width: 35%;	
		position: relative;
		top:15%;
		left: 5px;
		border: 1px solid grey;
		border-radius: 5px 5px 5px 5px;
	}
	.image{
		width: 100%;
		height: 150px;
		background-color:  #51BFD0;
	}
	.image img{
		width: 35%;
		height: 120px;
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
	 
     .gauch{
     	width: 60%;
     	height: 98%;
     	background-color: white;
     	float: right;
     	border: 1px solid white;
     	position: relative;
     	bottom: 47%;
     	right: 1%;
     }
     .gauch h2{
     	width: 95%;
     	height: 8%;
     text-align: center;
		color:  #51BFD0;
     	
     }
	.quiz{
		width: 98%;
		height: 85%;
		margin: auto;
		position: relative;
		bottom: 10px;
		border: 1px solid  #51BFD0;
		border-radius: 10px 5px 10px 5px; 
		
	}
	.question{
		width: 100%;
		height: 15%;
	}
	.question label{
   		width: 15%;
   		height: 50%;
   		font-size: 18px;
   		float: left;
		position: relative;
		top: 25%;
		
	}
	.question textarea{
		width: 70%;
		height:90%;
		float: right;
		position: relative;
		top: 5%;
		
	}
	.nbre{
		width: 100%;
		height: 7.5%;
		position: relative;
		top: 3%;
	}
	.nbre label{
		font-size: 18px;
	}
	.nbre select{
		width:15%;
		height: 60%;
	}
	.typ{
		width: 100%;
		height: 7.5%;
		position: relative;
		top: 3%;
	}
	.typ label{
		width: 10%;
		font-size: 18px;
	}
	.typ select{
		width: 53%;
		height: 100%;
		margin: 1%;
		
	}
	.typ img{
		width: 10%;
		height: 100%;
		margin: 1%;
	}
	.repon{
		width: 100%;
		height:10%;
		position: relative;
		top: 8%;
 	}
 	.save button{
 		padding: 5px;
 		color: white;
 		background-color:  #51BFD0;
 		position: relative;
 		left: 85%;
 		top: 370px;
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
                    <a style="text-decoration: none;" href="creeradmis.php"><input class="text1" type="text" name="creadmis" placeholder="Creer Admis"></a>
                    <a style="text-decoration: none;" href="listejoueurs.php"><input class="text" type="text" name="listjoueur" placeholder="Liste Joueur"></a>
                    	<input class="text2" type="text" name="crequiz" placeholder="Creer Question">
                    </div>
				</div>
				<div class="gauch">
				<h2>PARAMETRER VOTRE QUESTION</h2>
				<div class="quiz">
					<div class="question">
					<label>Questions</label>
					<textarea  name="quiz" id="quiz"></textarea>
					</div>
					<div class="nbre">
					<label>Nbre de Points</label>
					<select></select>
					</div>
					<div class="typ">
					<label>Type de reponse</label>
					<select>
						<option>Donner le type de reponse</option>
					</select>
					<img src="./imagesquiz/ic-ajout-réponse.png">
					</div>
					<div class="repon">
				<label style="width: 15%; font-size: 18px;">Reponse 1</label>
					<input style="width: 50%; height: 55%;" type="text" name="repons">

					<input style="width: 5%; height: 40%; position: relative;
					top: 7%;"  type="checkbox" name="one">
					<input  style="width: 5%; height: 40%; position: relative;top: 7%;" type="radio" name="two">
					<img  style="width: 5%; height: 40%; position: relative;top: 7%;" src="./imagesquiz/ic-supprimer.png">
					</div>
					<div class="save">
						<button>Enregistrer</button>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>