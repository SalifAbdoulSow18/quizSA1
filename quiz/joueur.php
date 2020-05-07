<?php
session_start();
$pageActuelle="";
$pageactuelle="";
$newScore="";
$array_newjoueur="";
if (!isset($_SESSION['joueur'])) {
	header("Location:index.php");
}
// Pour afficher le nombre de question dans le jeu
$qui=file_get_contents('quizParJeu.json');
		$array_qui=json_decode($qui, true);
	    $_SESSION['NbrGame']=$array_qui['NQuestionParJeu'];

// Pour trier et afficher les top scores
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

//Pour afficher les Question dans l'interface d'un joueur connecte
	$data_question=file_get_contents("questions.json");
		$array_question=json_decode($data_question, true);

				
				$_SESSION['Questions']=$array_question;
				$NbrParPage=1;
			$NbrDePage=$_SESSION['NbrGame'];
					if (isset($_POST['suiv'])) {
					$pageactuelle=intval($_POST['pageActuelle']);
					$_SESSION['reponsjoueur'][$pageactuelle]=$_POST['result'];
					$pageactuelle++;
					
						if ($pageactuelle>$NbrDePage) {
							$pageactuelle=$NbrDePage;
						}
					
					}
				elseif (isset($_POST['prec'])) {
					$pageactuelle=intval($_POST['pageActuelle']);
					$pageactuelle--;
					
				}

				else{
					$pageactuelle=1;
				}
			
			$IndiceDeDepart=($pageactuelle-1)*$NbrParPage;	

//Pour le traitement d'enregistrement niveau joueur
			
	if (isset($_POST['ter'])) {
			$pageactuelle=intval($_POST['pageActuelle']);
			$_SESSION['reponsjoueur'][$pageactuelle]=$_POST['result'];
	 			$newScore= calculeScore($_SESSION['Questions'],$_SESSION['reponsjoueur']);
	 			
			
	}

//Pour la mise a jour des score dans le fichier json
	$data_newjoueur=file_get_contents("base_joueur.json");
		$array_newjoueur=json_decode($data_newjoueur, true);
			$poste=$_SESSION['id'];
		if ($array_newjoueur[$poste]['score']< $newScore) {
			$array_newjoueur[$poste]['score']=$newScore;
		 $jsrenvoi=json_encode($array_newjoueur,JSON_PRETTY_PRINT);
		  file_put_contents('base_joueur.json', $jsrenvoi);
		}



//Pour laisser apparaitre les questions si le joueur navigue sur les button

//Fonction pour calculer le score des joueurs
	function calculeScore($tabQuestion,$tabReponse){
		$score = 0;

		for ($i=1; $i < count($tabReponse); $i++) { 
			
			if ($tabQuestion[$i-1]['choise']== 'choix multiple') {
			    for ($k=0; $k < count($tabReponse[$i]) ; $k++) { 
			    	if (in_array($tabReponse[$i][$k], $tabQuestion[$i-1]['answer'])) {
			    		$score = $score + ( intval($tabQuestion[$i-1]['number']) / count( $tabQuestion[$i-1]['answer']) );
			    	}
			    }
			}
			else if ($tabQuestion[$i-1]['choise']== 'choix texte') {
					if ($tabReponse[$i]==$tabQuestion[$i-1]['add']) {
						$score = $score + ( intval($tabQuestion[$i-1]['number']) );
					}
				
			}
			else{
				if ($tabReponse[$i]==$tabQuestion[$i-1]['answer']) {
					$score = $score + ( intval($tabQuestion[$i-1]['number']) );
				}
			}
		}
		return $score;
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
		height: 780px;
		position: absolute;
	}
	.milieu{
		width: 95%;
		margin: auto;
		position: relative;
		
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
		bottom: 200px;
		color: white;
	}

	.first button{
		width: 18%;
		height: 30px;     
		font-size: 9px;
		position: relative;
		left: 80%;
		bottom: 420px;
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
		overflow: auto;
		background-image: linear-gradient(white , #C4E9EF);
		border: 1px solid #51BFD0;
		position: relative;
		left: 1%;
		top: 1%;
	}
	.droite{
		width: 35%;
		height: 78%;
		float: right;
		background-image: linear-gradient(white , #C4E9EF);
		position: relative;
		right: 1%;
		top: 10%;
	}
	.affiche_quiz{
		width: 95%;
		height: 20%;
		margin: auto;
		text-align: center;
		background-color: whitesmoke;
		border: 1px solid #51BFD0;
		border-radius: 5px;
		position: relative;
		top: 5px;
	}
	.affiche_quiz label{
		font-size: 20px;
	}
	.score{
		width: 95%;
		height: 7%;
		margin: auto;
		
	}
	.score input{
		width: 20%;
		height: 85%;
		float: right;
		font-size: 18px;
		text-align: center;
		border: 1px solid #51BFD0; 
		border-radius: 5px;
		position: relative;
		top: 10px;

	}
	.reponse_quiz{
		width: 98%;
		height: 60%;
		margin: auto;
		font-size: 20px;
		position: relative;
		top: 50px;
	}
	.reponse_quiz input{
		margin: 2%;
	}
	 #recape{
     	width: 95%;
     	height: 7%;
     	margin: auto;
     	text-align: center;
     	background-color: green;
     	position: relative;
     	top: 50px;
     }
     #recape label{
     	
     	font-size: 22px;
     	color: white;
     }
	.button{
		width: 98%;
		height: 7%;
		margin: auto;
		position: relative;
		top: 70px;
	}
	.button input{
 width:20%;
height:60%;
border-radius:5px;
font-size:16px;
color:white;
}
.best_score{
	width: 98%;
	height: 20%;
	margin: auto;
}
.best_score button{
	height:60%;
}
.tabcontent{
	text-align: center;
}
.tabcontent table{
			margin: auto;
			width: 90%;
		}
    
     .tabcontent table tr td{
     	font-size: 18px;
     	text-align: center;
     	color: grey;
     	margin: auto;
     	 border: 1px solid grey;
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
						<form method="POST">
						<div class="affiche_quiz"> 
   				<label>Questions<?php echo $pageactuelle; ?>/<?= $_SESSION['NbrGame']?></label>
   				<br><br>
    			<?php
					for ($i=$IndiceDeDepart; $i <($IndiceDeDepart+$NbrParPage) ; $i++) {
					if (isset($_SESSION['Questions'][$i]) ) {?>
    			<label>
    			<?php
    				echo  $_SESSION['Questions'][$i]['quiz']; 
						
				?>
			 	</label>
    					</div>
    					<div class="score">
    				<input type="text" name="score" value="<?php echo  $_SESSION['Questions'][$i]['number'];?>pts">
    					</div>
    					<div class="reponse_quiz">
    			<?php
					if ($_SESSION['Questions'][$i]['choise']=="choix texte") {
				?>
					<input type="text" <?php if(isset($_SESSION['reponsjoueur'][$pageactuelle])){?>value="<?php echo($_SESSION['reponsjoueur'][$pageactuelle]);  ?>"<?php }?> placeholder="saisissez la reponse" name="result">				 
				<?php
					}
				?>
				<?php
					if ($_SESSION['Questions'][$i]['choise']=="choix simple"){
						$x=1;
					foreach (($_SESSION['Questions'][$i]['add']) as $key => $value){
						if(isset($_SESSION['reponsjoueur'][$pageactuelle])){
						if($x==$_SESSION['reponsjoueur'][$pageactuelle]){
							echo"<input type='radio' name='result' value='$x' checked>";
								echo "$value<br>";
						}else{
							echo"<input type='radio' name='result' value='$x' >";
								echo "$value<br>";
						}$x++;
							}else{
								echo"<input type='radio' name='result' value='$x' >";
								echo "$value<br>";
							}
						}
						}
				?>	
	 				
	 			
						
				<?php 
					if ($_SESSION['Questions'][$i]['choise']=="choix multiple"){
						$x=1;
						if(isset($_SESSION['reponsjoueur'][$pageactuelle])){
					foreach ($_SESSION['Questions'][$i]['add'] as $key=> $value) {
						$trouve=false;
						foreach ($_SESSION['reponsjoueur'][$pageactuelle] as $keys ) {
							if ($keys==$x) {
								$trouve=true;
							}
						}
						if ($trouve==true) {
						echo"<input type='checkbox' value='$x' name='result[]' checked>";
								echo "$value<br>";
						}else{
							echo"<input type='checkbox' name='result[]' value='$x' >";
								echo "$value<br>";
						}$x++;
							}
								}
						
					else{
						$y=1;
						foreach ($_SESSION['Questions'][$i]['add'] as $k) {
						echo"<input type='checkbox' name='result[]' value='$y' >";
								echo "$k<br>";
								$y++;
						}
						
					}
					}
				
				?>
				<?php }}?>
    					</div>

<?php 
if (isset($_POST['ter'])) {
	echo "<div id='recape'>
<label> Vous avez eu un score de: <strong>$newScore</strong> </label>
	</div>";
}

  ?>  
    					
    				<div class="button">
    <input type="hidden" name="pageActuelle" value="<?php echo $pageactuelle ?>">
    <?php
    if ($pageactuelle>1) {?>
    <input style="background-color:#818181; 
		float: left;" type="submit"  value="Precedent" name="prec">
	<?php
    }
    if ($pageactuelle!=$NbrDePage) {
	?>
    <input style="background-color:#51BFD0; 
		float: right;" type="submit"  value="Suivant" name="suiv">
	<?php
    }
    if ($pageactuelle==$NbrDePage) {?>
    <input style="background-color:#51BFD0; 
		float: right;" type="submit"  value="Terminer" name="ter">
	<?php
    }
	?>
					</div> 
					</form>
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
			if (isset($_SESSION['Questions'][$i]) ) {		
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