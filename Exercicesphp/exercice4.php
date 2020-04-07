<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2 style='text-align:center;'>EXERCICE4</h2>

<form action="" method="POST">
    <textarea name="phrase" id="phrase" cols="30" rows="10"></textarea>
    <input type="submit" valeur="executer" name="submit">
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
       if (!(empty($_POST['phrase']))) {
          $phrases= $_POST['phrase'];
          $tab=array();
          $sentence="";
         $inutil=espace($phrases);
      $pris= phrase_valide($inutil);
       var_dump($pris);
     foreach ($pris as $key ) {
      if (strlen($key)<=200) {
       if (preg_match('#^[a-z]#', $key[0])) {
        $b=strtoupper($key[0]);
        $key=preg_replace('#^[a-z]#', $b, $key);
          $sentence.=$key;
         }
         else{
          $sentence.=$key;
         }
      }
      else{
        echo "Veuillez verifier la longueur de votre phrase!!!";
      }
      
      }
          
      echo "$sentence";
       

}

}




#Pour valider les phrases commencants par des lettres!!!
function phrase_valide($phrase){
 
preg_match_all("#[A-Za-z]{1}([^.?!]|([.][0-9]))*[.?!]#", $phrase, $matches);
return $matches[0];

}


#Pour eliminer les espaces inutile!!!
function espace($phrase)
{
  for ($i=0; $i <count($phrase) ; $i++) { 
    
  $change=preg_replace("#[\s]+#"," ", $phrase);
 }
  
    return $change;
  }


    ?>
</body>
</html>