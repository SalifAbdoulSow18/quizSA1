<?php
session_start();
if (!isset($_SESSION['admis'])) {
	header("Location:pagedeconnex.php");
}

if (isset($_POST['submit'])) {
 if (empty($_POST)) {
   	$erreur= "Your message has not been sent. Please complete all required!!!";
 }
 else{
 	$tabquiz=array();
 	unset($_POST['submit']);
 	$tabquiz=$_POST;
 		  $js=file_get_contents("questions.json");
		  $jsquiz=json_decode($js,true);
		  $jsquiz[]=$tabquiz;
		   $jsrenvoi=json_encode($jsquiz,JSON_PRETTY_PRINT);
		  file_put_contents('questions.json', $jsrenvoi);
 }
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>4. Creer Question</title>
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
		width: 98%;
		height: 15%;
		margin: auto;
		position: absolute;
	}
	.question label{
   		width: 15%;
   		height: 50%;
   		font-size: 20px;
   		float: left;
		position: relative;
		top: 25%;
		left: 1%;
	}
	.question textarea{
		width: 70%;
		height:90%;
		float: right;
		border-bottom-color: #51BFD0;
		background-color: #D1D1D1;
		position: relative;
		top: 1%;
	}
	.nbre{
		width: 98%;
		height: 7.5%;
		margin: auto;
		position: absolute;
		top: 16%;
	}
	.nbre label{
		font-size: 20px;
		position: relative;
		top: 10%;
		left: 1%;
	}
	.nbre input{
		width:15%;
		height: 60%;
		background-color: #D1D1D1;
		border-bottom-color: #51BFD0;
		position: relative;
		left: 25%;
	}
	.typ{
		width: 98%;
		height: 7.5%;
		margin: auto;
		position: absolute;
		top:25%;
	}
	.typ label{
		width: 10%;
		font-size: 18px;
		position: relative;
		left: 1%;
	}
	.typ select{
		width: 53%;
		height: 95%;
		background-color: whitesmoke;
		color: #51BFD0;
		margin: 1%;

	}
	

	.typ img{
		width: 10%;
		height: 95%;
		position: absolute;
		top: 5%;
	}
	#ajout{
		width: 98%;
		height:8%;
 		position: absolute;
 		top: 35%;
 	}
 	#newdiv{
 		width: 100%;
		height:100%;
 	}
 	.add{
 	width: 50%;
 	height: 40px;
 	position: relative;
 	left: 22%;
 	}
 	.add1{
 	width: 50%;
 	height: 65px;
 	margin: 2%;
 	position: relative;
 	left: 22%;
 	}
 	.genere{
 		width: 5%; 
 		height: 30px; 
 		background-color: red;
 		position: relative;
		top: 9px;
		left: 22%;

 	}
 	#ajout button{
 		width: 5%; 
 		height: 40%; 
 		position: relative;
 		top: 8%;
 		left: 22%;
 	}
 	#ajout button img{
 		width: 100%; 
 		height: 100%; 
 		padding: 5%;
 		position: relative;
 		
 	}
	.repon{
		width: 98%;
		height:8%;
		position: absolute;
		top: 35%;
 	}
 	.repon label{
 		width: 15%; 
 		font-size: 18px;
 		position: relative;
		left: 1%;
 	}
 	.champ-reponse{
 		width: 50%;
 	 height: 55%;
 	}
 	.choix{
 		width: 5%; 
 		height: 40%; 
 		position: relative;
		top: 7%;
 	}
 	.repon img{
 		width: 5%; 
 		height: 40%; 
 		position: relative;
 		top: 7%;
 	}
 	.save input{
 		padding: 5px;
 		color: white;
 		background-color:  #51BFD0;
 		position: absolute;
 		left: 75%;
 		top: 95%;
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
				<form method="POST" action="creerquestons.php" id="formulaire">
					<div class="question">
					<label>Questions</label>
					<textarea  name="quiz" id="quiz" required></textarea>
					</div>
					<div class="nbre">
					<label>Nbre de Points</label>
					<input type="number" id="number" name="number" min="1" max="15" required>
					</div>
					<div class="typ">
					<label>Type de reponse</label>
					<select id="choise" name="choise" required>
				<option>Donner le type de reponse</option>
				<option value="choix texte">Choix texte</option>
				<option value="choix simple">Choix simple</option>
				<option value="choix multiple">Choix multiple</option>
					</select>
					<a href="" id="plus"><img src="./imagesquiz/ic-ajout-réponse.png"></a>
					</div>
					<div id="ajout">
						
					</div>
					
					<div class="save">
						<input type="submit" name="submit" value="Enregistrer">
					</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	var nbrInput=0;
	var bnt=document.getElementById('plus');
    var type= document.getElementById('choise');
    var ajout=document.getElementById('ajout');
   bnt.addEventListener('click',recuperation);
    function recuperation(affichage){
	affichage.preventDefault();
	nbrInput++;
	if (type.value=='choix multiple') {
		var newInput='<div  id="Reponse'+nbrInput+'"><input type="text" name="add['+nbrInput+']" id="resultat" class="add" required><input value="'+nbrInput+'" type="checkbox" name="answer['+nbrInput+']" class="genere"><button type="button" id="delete" onclick="deletInput('+nbrInput+')"><img src="./imagesquiz/ic-supprimer.png"></button></div>';
           ajout.innerHTML=ajout.innerHTML+newInput;
	}
     if (type.value=='choix simple') {
     	var newInput='<div  id="Reponse'+nbrInput+'"><input type="text" name="add['+nbrInput+']" id="resultat" class="add" required><input value="'+nbrInput+'" type="radio" name="answer" class="genere"><button type="button" id="delete" onclick="deletInput('+nbrInput+')"><img src="./imagesquiz/ic-supprimer.png"></button></div>';
           ajout.innerHTML=ajout.innerHTML+newInput;
     }    
     if (type.value=='choix texte') {
     	var newInput='<input type="text" name="add" id="resultat" class="add1" required>';
           ajout.innerHTML=ajout.innerHTML+newInput;
     }  
      
       }
      
       function deletInput(n){
       var effacer=document.getElementById('Reponse'+n);
       effacer.remove();
       }
</script>


<script>
	
 const name=document.getElementById("quiz");
 const name=document.getElementById("number");
 const name=document.getElementById("choise");
 const name=document.getElementById("resultat");

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