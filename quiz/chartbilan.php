<?php
session_start();
if (!isset($_SESSION['admis'])) {
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
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<title>5. Bilan Users</title>
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
	
#quiz{
		width: 60%;
		height: 550px;
		position: relative;
		left:38%;
		border: 1px solid white;
		background-image: linear-gradient(white , #C4E9EF);
		border-radius: 5px 5px 5px 5px;
		background-color: white;
		position: relative;
        bottom: 76%;
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
                    	<input class="text" type="text" name="listjoueur" placeholder="Liste Joueur">
                    <a style="text-decoration: none;" href="creerquestons.php"><input class="text1" type="text" name="crequiz" placeholder="Creer Question"></a>
                     <a style="text-decoration: none;" href="chartbilan.php"><input class="text2" type="text" name="crequiz" placeholder="Bilan Users"></a>
                    </div>
				</div>
				<div id="quiz">
					<canvas id="myChart" width="300" height="200"></canvas>
						</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [<?php  for ($i=$min; $i <$max ; $i++) {	
			if (array_key_exists($i, $_SESSION['player'])) { 
        	echo "'".$_SESSION['player'][$i]['nom'].' '.$_SESSION['player'][$i]['prenom']."'";
        	if($i<count($_SESSION["player"])-1)
        	{
        		echo ",";
        	}
        }} ?>],
       
        datasets: [{
            label: 'Les Joueurs Et Leurs Scores',
            data: [<?php  for ($i=$min; $i <$max ; $i++) {	
			if (array_key_exists($i, $_SESSION['player'])) { 
        	echo $_SESSION['player'][$i]['score'];
        	if($i<count($_SESSION["player"])-1)
        	{
        		echo ",";
        	}
        }} ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(155, 206, 86, 0.2)',
                'rgba(130, 102, 245, 0.2)',
                'rgba(55, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(155, 206, 86, 1)',
                 'rgba(130, 102, 245, 0.2)',
                'rgba(55, 206, 86, 0.2)'
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</body>
</html>