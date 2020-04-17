
<?php
session_start();
$pageactuelle="";
if (!isset($_SESSION['admis'])) {
	header("Location:pagedeconnex.php");
}
	$data_joueur=file_get_contents("base_joueur.json");
		$array_joueur=json_decode($data_joueur, true);
				$columns=array_column($array_joueur, 'score');
			array_multisort($columns, SORT_DESC, $array_joueur);
			
				$_SESSION['player']=$array_joueur;
				$NbrParPage=15;
				$size=count($_SESSION['player']);
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
	<title>3. Liste Joueurs</title>
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
		background-image: linear-gradient(white , #C4E9EF);
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
		font-size: 22px;
		position: relative;
		left: 30%;
		top:5px;
		}
	
	.quiztext{
		width: 90%;
		height: 85%;
		margin:auto;
		overflow: auto;
		border: 1px solid #51BFD0;
		border-radius: 5px 5px 5px 5px;
		}
    .quiztext table{
			margin: auto;
		}
     .quiztext table th{
     	font-size: 18px;
     	text-align: center;
		width:20%; 
		margin: auto;
     	color: grey;
     	border: 1px solid grey;
     }
     .quiztext table tr td{
     	font-size: 18px;
     	text-align: center;
     	color: grey;
     	margin: auto;
     	 border: 1px solid grey;
     }

	.suiv{
		width: 100%;
		height: 7%;
		background-color: white;
	}
	.next{
		width:15%;
		color: white;
		border-radius: 5px;
		position: relative;
		left: 60%;
		background-color: #3CDED6; 
	}
	.prex{
		width:20%;
		color: white;
		border-radius: 5px;
		position: relative;
		left: 5%;
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
                    	<input class="text2" type="text" name="listjoueur" placeholder="Liste Joueur">
                    <a style="text-decoration: none;" href="creerquestons.php"><input class="text1" type="text" name="crequiz" placeholder="Creer Question"></a>
                    </div>
				</div>
				<div class="quiz">
					<div class="nbr">
						<label>Liste Des Joueurs Par Score</label>
						
					</div>
					<div class="quiztext">
					<table>
							<thead>
								<th>Nom</th>
								<th>prenom</th>
								<th>Score</th>
							</thead>
				<tbody>
					<?php
	for ($i=$IndiceDeDepart; $i <($IndiceDeDepart+$NbrParPage); $i++) {
						if (array_key_exists($i, $_SESSION['player'])) {
						?> 
					

						<tr>
							<td><?php echo $_SESSION['player'][$i]['nom']?></td>
								
							<td><?php echo $_SESSION['player'][$i]['prenom']?></td>
							
							<td><?php echo $_SESSION['player'][$i]['score']?></td>
						</tr>
					<?php
					}
					}
					?>
					</tbody>
					</table>
					</div>
					<form method="POST">
						<div class="suiv">
						<input type="hidden" name="pageActuelle" value="<?php echo $pageactuelle ?>">
						<input type="submit" name ="prec" class="prex" value="precedent">	
						<input type="submit" name ="suiv" class="next" value="suivant">

					</div>
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