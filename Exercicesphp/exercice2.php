<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<h2 style='text-align:center;'>EXERCICE2</h2>

<h2><center> CALENDRIER DE LANNEE </center></h2>
    <form action="" method="POST">
    <select name="choix" id="choix">
    <option value="Francais">Francais</option>
    <option value="Anglais">Anglais</option>
    </select>
    <input type="submit" name="submit" value="valider">
    </form>


    <style>
    input{
      width: 70px;
      height: 30px;
      background-color: violet;
      position: relative;
      left: 40%;
    }
    select{
      border: 3px solid black;
      width: 150px;
      height: 40px;
     position: relative;
      left: 25%;
    }
    table{
        border:1px solid black;
        width:90px;
       position: relative;
       top: 40px;
       left: 30%;
    }
    tr{
        border:1px solid black;
        background-color:whitesmoke;
    }
    td{
        border:1px solid black;
    }
    </style>
    <?php 


    $cal=array(
        '1'=>["Janvier", "Junuary"],
        '2'=>["Fevrier", "February"],
        '3'=>["Mars", "March"],
        '4'=>["Avril", "April"],
        '5'=>["Mai", "May"],
        '6'=>["Juin", "June"],
        '7'=>["Juillet", "July"],
        '8'=>["Aout", "August"],
        '9'=>["Septembre", "September"],
        '10'=>["Octobre", "October"],
        '11'=>["Novembre", "November"],
        '12'=>["Decembre", "December"],
    );

    if (isset($_POST['submit'])) {

        if ($_POST['choix']=="Francais") {
          
             echo "<table>";
              for ($i=1; $i <=10; $i=$i+3) { 
                        echo "<tr>";
                  for ($j=$i; $j <= $i+2; $j++) { 
                     echo   "<td>".$j." </td><td> ".$cal[$j][0]."</td>";   
                         
                   }  
                    echo "</tr>"  ;
                }
              
              echo "</table>" ;
        }
        
        if ($_POST['choix']=="Anglais") {
            # foreach ($cal as $key => $value) {
              #   echo "$key   $value[0] <br>";
              echo "<table>";
               for ($i=1; $i <=10; $i=$i+3) { 
                         echo "<tr>";
                   for ($j=$i; $j <= $i+2; $j++) { 
                      echo   "<td>".$j." </td><td> ".$cal[$j][1]."</td>";   
                          
                    }  
                     echo "</tr>"  ;
                 }
               
               echo "</table>" ;
         }
    }
       /* if ($_POST['choix']=="Anglais") {
            foreach ($cal as $key => $value) {
                echo "$key   $value[1] <br>";
            }
        }
       
    }*/
    ?>
</body>
</html>