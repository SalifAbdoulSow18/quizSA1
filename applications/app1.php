<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>app1</title>
</head>
<body>

   <?php 
$tabcouleur=["bleu"=>"#0000FF","rouge"=>"#FF0000","jaune"=>"#FFFF00","gris"=>"#008000","vert"=>"green","violet"=>"violet"];
  ?>

<h1 style='text-align:center;'>APPLICATION 1</h1>

<div class="contenue">
<div class="titre">
<h1><center> SONATEL ACADEMIE</center></h1>
</div>
<div class="formulaire">
<form  method="POST">
 <div> 
 <label>Taille de la matrice carree</label><br>
 <img src="icone1.png" style="background-color:blue;border-top-left-radius:12px;width:7.2%;border-bottom-left-radius:12px; float:left;">
 <input class="saisi" type="text" name="matrice">
 </div>
   <div> 
   <label>Select C1</label><br>
   <img src="icone2&3.png" style="background-color:red;border-top-left-radius:12px;width:8%;border-bottom-left-radius:12px; float:left;  margin-top:10px">
   <select name="C1" id="color1">
  <?php
  foreach ($tabcouleur as $key => $value) {
    echo "<option value='$value'>$key</option>"; 
  }
  ?>


    </select></div>
   <div> 
   <label>Select C2</label><br>
   <img src="icone2&3.png" style="background-color:red;border-top-left-radius:12px;width:8%;border-bottom-left-radius:12px; float:left;  margin-top:10px">
   <select name="C2" id="color2">
   <?php
  foreach ($tabcouleur as $key => $value) {
    echo "<option value='$value'>$key</option>"; 
  }
  ?>
    </select></div>
   <div> 
   <label>Position</label><br>
   <img src="interrogation.png" style="background-color:grey;border-top-left-radius:12px;width:8%;border-bottom-left-radius:12px; float:left; margin-top:10px">
   <select name="position" id="pos">
   <option value="bas">bas</option>
   <option value="haut">haut</option>
    </select></div>
    <div class="soumis">
<form action="" name="POST">
<input class="soum" type="submit" name="anuler" value="Annuler" style="background-color:grey;">
<input class="soum" type="submit" name="valider" value="Dessiner" style="background-color:yellow;">
</form>
</div>
    </form>
</div>

<!-- pour le style-->
<style>
.contenue{
    width:60%;
    height:700px;
    border:1px solid white;
    background-color:#4B9EC8;
    position: relative;
    left:20%;
}
.formulaire{
    position: relative;
    left:30%;
}

.formulaire select{
    width:190px;
    height:40px;
    position: relative;
    margin-top:10px;
}
.saisi{
    width:190px;
    height:35px;
}
.soum{
    width:90px;
    height:40px;
    position: relative;
    top:10px;
    left: 8%;
   }

label{
    position: relative;
    left:8%;
    }

    img{
  height: 40px;
  width: 5%;
}

</style>   

   <?php 
   if (isset($_POST['valider'])) {
      $matrice=$_POST['matrice'];
      $C1=$_POST['C1'];
      $C2=$_POST['C2'];
      $position=$_POST['position'];
      echo"<table style=' position: relative;
      left:25%; top:20px;'>";
      for ($i=0; $i <$matrice; $i++) { 
         echo"<tr>";
         for ($j=0; $j <$matrice ; $j++) { 
if ($position=='bas') {
   

             if ($i>=$j || $i+$j==$matrice-1) {
                echo"<td style='background-color: $C1; width:25px; height:20px'>";
                 echo"</td>";
                 }
                 else {
                    echo"<td style='background-color: $C2 ; width:25px; height:20px'>";
                    echo"</td>";
                 }
                }
elseif ($position=='haut') {
    if ($i<=$j || $i+$j==$matrice-1) {
        echo"<td style='background-color: $C1; width:25px; height:20px'>";
         echo"</td>";
         }
         else {
            echo"<td style='background-color: $C2 ; width:25px; height:20px'>";
            echo"</td>";
         }
}
         }
         echo"</tr>";
      }
      echo"</table>";
   }
   ?>
</body>
</html>