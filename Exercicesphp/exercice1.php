
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
  
   input{
     
    }
  
</style>




<h1 style='text-align:center;'>EXERCICE1</h1>
<form action="" method="POST">
<input style=" width: 150px;
      height: 30px;
      border: 3px solid black;
      position: relative;
      left: 25%;" type="text" name="n">
<input style=" width: 70px;
      height: 30px;
      background-color: violet;
      position: relative;
      left: 40%;" type="submit" name="submit" value="executer"><br><br>
</form>
    <?php 
    session_start();
  if (isset($_POST['submit']) && isset($_POST['n'])) {
    if (!(empty($_POST['n']))) {
     
      $n=$_POST['n'];
      $T1=array();
    
      if ($n>10000) {
          for ($i=1; $i <=$n ; $i++) { 
            $cpt=0;
              for ($j=1; $j <= $i/2 and $cpt<2 ; $j++) { 
                if ($i%$j==0) {
                    $cpt++;  
                 }
              }
                
              if ($cpt==1) {
                $T1[]=$i;
            }
          }

         
    }
      }
      else {
          echo"ressaisisser la valeur";
      }
      $T=array(
        'inf' =>array(),
        'sup'=>array());
      $som=0;
      for ($i=0; $i < count($T1) ; $i++) { 
       $som=$som+$T1[$i];
       }
    $tail=count($T1);
      $moy=$som/$tail;
      echo "la somme des nombre premier dans le tableau est de $som <br>";
      echo "la taille du tableau est de $tail <br>";
      echo "la moyenne du tableau est de $moy <br>";
     for ($i=0; $i <count($T1) ; $i++) { 
      if ($T1[$i]<$moy) {
        $T['inf'][]=$T1[$i];
      }
     else {
       $T['sup'][]=$T1[$i];
     }
     
     }
    $_SESSION['inf']=$T['inf'];
     $_SESSION['sup']=$T['sup'];
   /*  echo "les tables intefieur a la moyenne est de ";
     print_r($T['inf']);
     echo "les tables superieur a la moyenne est de";
     print_r($T['sup']);*/

}

  if(isset($_GET['page'])){
  $taille=$_GET['page']*100;
  $x=$taille-100;

        echo "<table style='border:1px solid black; width:98%;'>";
        while ($x < $taille) {
          
        
       for ($i=1; $i <=10 ; $i++) { 
         echo "<tr style='border:1px solid black;'>";
         for ($j=1; $j <=10 ; $j++) { 
          if (array_key_exists($x,  $_SESSION['inf'])) {
        echo "<td style='border:1px solid black;'>".$_SESSION['inf'][$x]."</td>";

           $x++;
         }
        
         }
       }
     }
     echo "</table>";
      
}

$salif=count($_SESSION['inf'])/100;
for ($i=1; $i <= $salif; $i++) { 
  $sg=$_GET['sup'];
  echo "<a href='exercice1.php?page=$i&sup=$sg'>$i</a>";
}






?>
  
  <?php 
 echo "<table style='border:1px solid black; width:98%;'>";
        $total=$_GET['sup']*100;
        $diff=$total-100;
        while ($diff < $total) {
        for ($i=1; $i <=10 ; $i++) { 
         echo "<tr style='border:1px solid black;'>";
         for ($j=1; $j <=10 ; $j++) { 
          if (array_key_exists($diff,  $_SESSION['sup'])) {
         echo "<td style='border:1px solid black;'>".$_SESSION['sup'][$diff]."</td>";

           $diff++;
         }
        
         }
         echo "</tr>";
       }
     }
     echo "</table>";
     $sow=count($_SESSION['sup'])/100;
for ($i=1; $i <= $sow; $i++) { 
  $pg=$_GET['page'];
  echo "<a href='exercice1.php?sup=$i&page=$pg'>$i</a>";
}
  ?> 
</body>
</html>
