<?php
session_start();
if (!isset($_SESSION['joueur'])) {
	header("Location:pagedeconnex.php");
}
$data_joueur=file_get_contents("base_joueur.json");
		$array_joueur=json_decode($data_joueur, true);
				$columns=array_column($array_joueur, 'score');
			array_multisort($columns, SORT_DESC, $array_joueur);
			
				$_SESSION['player']=$array_joueur;
				$NbrParPage=5;
				$size=count($_SESSION['player']);
			$NbrDePage=ceil($size/$NbrParPage);
			if (!isset($_GET['page'])) {
				$page=1;
			}
			else{
				$page=$_GET['page'];
			}
			$min=($page-1)*5;
			$max=$min+5;
			if ($page<=1) {
				$page=1;
				$prev='none';
			}
			elseif ($page>$NbrDePage) {
				$page=$NbrDePage;
			}
			if ($page==$NbrDePage) {
				$max=$size;
				$next='none';
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
		border-radius: 50%;
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
	.milieu2{
		width: 95%;
		height: 98%;
		margin: auto;
		background-color: white;
		border-radius: 5px;
		border: 1px solid #fff;
		position: relative;
		top: 1%;
	}
	.gauche{
		width: 60%;
		height: 98%;
		float: left;
		border: 1px solid #51BFD0;
		position: relative;
		left: 1%;
		top: 1%;
	}
	.droite{
		width: 35%;
		height: 98%;
		float: right;
		border: 1px solid violet;
		position: relative;
		right: 1%;
		top: 1%;
	}
	.affiche_quiz{
		width: 95%;
		height: 15%;
		margin: auto;
		text-align: center;
		background-color: whitesmoke;
		border: 1px solid #51BFD0;
		border-radius: 5px;
		position: relative;
		top: 1%;
	}
	.affiche_quiz label{
		font-size: 20px;
		margin: 25%;
	}
	.score{
		width: 95%;
		height: 7%;
		margin: auto;
		position: relative;
		top: 2%;
	}
	.score input{
		width: 20%;
		height: 85%;
		float: right;
		font-size: 18px;
		text-align: center;
		border: 1px solid #51BFD0; 
		border-radius: 5px;

	}
	.reponse_quiz{
		width: 98%;
		height: 60%;
		margin: auto;
		border: 1px solid red;
		position: relative;
		top: 4%;

	}
	.button{
		width: 98%;
		height: 7%;
		margin: auto;
		border: 1px solid green;
		position: relative;
		top: 9%;

	}
	.button input{
 width:20%;
height:60%;
position:relative;
border-radius:5px;
font-size:16px;
color:white;
}
.best_score{
	width: 98%;
	height: 10%;
	margin: auto;
}
.best_score button{
	height:60%;
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
				<div class="image">
						<img src="<?php echo $_SESSION['joueur']['avatar']; ?>">
<h4><?= $_SESSION['joueur']['prenom'] ?><?= $_SESSION['joueur']['nom'] ?></h4>
 				<h3> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ
JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE </h3>
		<a href="Deconnexion.php"><button>Deconnexion</button></a>
				</div>	
			</div>
			<div class="milieu1">
			<div class="milieu2">
					<div class="gauche">
						<div class="affiche_quiz"> 
   				<label>Questions 1/Nbre</label>  
    			<label>Les langages Web?</label>
    					</div>
    					<div class="score">
    				<input type="text" name="score" placeholder="3pts">
    					</div>
    					<div class="reponse_quiz"></div>
    				<div class="button">
	<input style="background-color:#818181; 
float: left;" type="submit"  value="Precedent" name="submit">
    <input style="background-color:#51BFD0; 
float: right;" type="submit"  value="Suivant" name="submit">
					</div> 
					</div>
					<div class="droite">
						<div class="best_score">
<button style="width: 35%;" class="tablinks" onclick="showInfos(event,'top-score')" id="inside">Top Scores</button>
<button style="width: 60%;" class="tablinks" onclick="showInfos(event,'meilleurscore')">Mon Meilleur Score</button>
					</div>
		<div id="top-score" class="tabcontent">
			<table>
				<tbody>
					<?php
			for ($i=$min; $i <$max ; $i++) {	
			if (array_key_exists($i, $_SESSION['player'])) {		
					?>
					<tr>
		<td><?php echo $_SESSION['player'][$i]['nom'].' '.$_SESSION['player'][$i]['prenom']?></td>
							
			<td><?php echo $_SESSION['player'][$i]['score']?></td>
					</tr>
					<?php
				}
				}
				?>
				</tbody>
			</table>
		</div>
		<div id="meilleurscore" class="tabcontent">
		<?= $_SESSION['joueur']['score'] ?>
		</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
</div>

<script>
	function showInfos(evt, affiche){
		var i, tabcontent, tablinks;

		tabcontent=document.getElementsByClassName("tabcontent");
		for (let i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display="none";
		}
		tablinks=document.getElementsByClassName("tablinks");
		for (let i = 0; i < tablinks.length; i++) {
		tablinks[i].className=tablinks[i].className.replace("active","");
		}
		document.getElementById(affiche).style.display="block";
		evt.currentTarget.className +="active";
		evt.currentTarget.style.color="#3addd6"
	}
	document.getElementById("inside").click();
</script>
</body>
</html>