<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style='text-align:center;'>EXERCICE5</h1>

    <form action="" method="POST">
    <textarea name="nombre" id="nombre" cols="30" rows="10"></textarea>
    <input type="submit" name="submit" value="executer">
    </form>


<style>
  
    input{
      width: 70px;
      height: 30px;
      background-color: violet;
      position: relative;
      bottom: 60px;
      left: 30%;
    }
    textarea{
      border: 3px solid black;
     
     position: relative;
      left: 15%;
    }
</style>






    <?php 
    if (isset($_POST['submit'])) {
       if (!(empty($_POST['nombre']))) {
          $nombre=$_POST['nombre'];
          $tab=array(
              "orange"=>array(),
              "expresso"=>array(),
              "free"=>array(),
              "pro"=>array(),
              "invalid"=>array()
          );
          $cap=preg_split("#[\s;-]{1,}#","$nombre");
          foreach ($cap as $key => $value) {
             if (strlen($value)==9 && is_numeric($value)) {
                if (preg_match('#^7[78]#', "$value")) {
                   $tab["orange"][]=$value;
                }
                elseif (preg_match('#^7[6]#', "$value")) {
                    $tab["free"][]=$value;
                }
                elseif (preg_match('#^7[0]#', "$value")) {
                  $tab["expresso"][]=$value;
              }
              elseif (preg_match('#^7[5]#', "$value")) {
                $tab["pro"][]=$value;
              }
                else {
                    $tab["invalid"][]=$value;

                }
             }
              else {
                    $tab["invalid"][]=$value;

                }
          }
          print_r($tab);

       $tail=(count($tab['orange'])+count($tab['free'])+count($tab['expresso'])+count($tab['pro'])+count($tab['invalid']));
       echo "<br><br><br> la taille  total du tableau est de $tail <br>";
       $Porange=(count($tab['orange'])*100)/$tail;
       $Pfree=(count($tab['free'])*100)/$tail;
       $Pexpresso=(count($tab['expresso'])*100)/$tail;
       $Ppro=(count($tab['pro'])*100)/$tail;
       $Pinvalid=(count($tab['invalid'])*100)/$tail;
       echo "le pourcentage des numeros oranges est de : $Porange<br>";
       echo "le pourcentage des numeros free est de : $Pfree<br>";
       echo "le pourcentage des numeros expresso est de : $Pexpresso<br>";
        echo "le pourcentage des numeros invalides est de : $Ppro<br>";
       echo "le pourcentage des numeros invalides est de : $Pinvalid<br>";
       echo "<br><br>les numeros invalides sont:<br>";
       echo "<table>";

        foreach ($tab['invalid'] as $key => $value) {
          echo "<tr>";
            echo ("<td style='border:1px solid black; background-color:white; color:red;'>".$value.' </td>');
             echo "</tr>";
           }
           
        echo "</table>";
       }
       else {
          echo "saisissez les suite de nombre";
       }
    }
    ?>
</body>
</html>