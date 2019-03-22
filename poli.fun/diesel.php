<html>
   <body>
     <h2>Calulateur de Fuel</h2>
     <title>Calulateur de Fuel</title>
      <form action = "<?php $_PHP_SELF ?>" method = "GET">
         <br>Prix total: <input type = "text" name = "PrixTotal" /></br>
         <br>Prix par litre: <input type = "text" name = "PrixLitre" /></br>
         <br>Kilomètre de base (laisser à 0 si vous connaisser le nombre de Kilomètre): <input type = "text" name = "KMmin" value="0"/></br>
         <br>Kilomètre total ou kilomètre parcourus: <input type = "text" name = "KMmax" /></br>
         <br><input type = "submit" /></br>
      </form>
      <br></br>
   </body>
</html>
<?php

//Déclaration de variable

$PrixTotal = 0;
$PrixLitre = 0;
$PrixKM = 0;
$ConsomationMoyenneAu100 = 0;
$KMmax = 0;
$KMmin = 0;
$KMTotal = 0;
$UnLitreKM = 0;
$UnKMLitre = 0;
$Litre = 0;

//Récuperation depuis les champs input

$PrixTotal = $_GET["PrixTotal"];
$PrixLitre = $_GET["PrixLitre"];
$KMmin = $_GET["KMmin"];
$KMmax = $_GET["KMmax"];

//Fonctions

function KMTotal($KMmax, $KMmin)
{
  if ($KMmin == 0)
  {
    $KMTotal = $KMmax;
  }
  else
  {
    $KMTotal = $KMmax-$KMmin;
  }
  return $KMTotal;
}

function Litre($PrixTotal, $PrixLitre)
{
  $Litre = $PrixTotal/$PrixLitre;
  return $Litre;
}

function ConsomationMoyenneAu100($Litre, $KMTotal)
{
  $ConsomationMoyenneAu100 = $Litre*100/$KMTotal;
  return $ConsomationMoyenneAu100;
}

function UnLitreKM($KMTotal, $Litre)
{
  $UnKMLitre = $KMTotal/$Litre;
  return $UnKMLitre;
}

function PrixKM($KMTotal, $PrixTotal)
{
  $PrixKM = $PrixTotal/$KMTotal;
  return $PrixKM;
}

function UnKMLitre($Litre, $KMTotal)
{
  $UnKMLitre = $Litre/$KMTotal;
  return $UnKMLitre;
}

//Appele de Fonctions

$KMTotal = KMTotal($KMmax, $KMmin);
$PrixKM = PrixKM($KMTotal, $PrixTotal);
$Litre = Litre($PrixTotal, $PrixLitre);
$ConsomationMoyenneAu100 = ConsomationMoyenneAu100($Litre, $KMTotal);
$UnLitreKM = UnLitreKM($KMTotal, $Litre);
$UnKMLitre = UnKMLitre($Litre, $KMTotal);

//Controle des champs et affiche si ils sont tous rempli

if ($PrixTotal == null)
{
  echo "Veuillez entrer quelque chose dans le champ Prix total";
}
elseif ($PrixLitre == null)
{
  echo "Veuillez entrer quelque chose dans le champ Prix par litre";
}
elseif ($KMmin == null)
{
  echo "Veuillez entrer quelque chose dans le champ Kilomètre de base ou mettez 0";
}
elseif ($KMmax == null)
{
  echo "Veuillez entrer quelque chose dans le champ Kilomètre total ou kilomètre parcourus";
}
else
{
  echo "<h3>Résultat</h3>";
  echo "<br>En payant $PrixTotal CHF a $PrixLitre CHF le litre vous avez parcourus $KMTotal KM </br>";
  echo "<br>Prix par Kilomètre parcourus : $PrixKM CHF </br>";
  echo "<br>Consomation moyenne pour 100 KM : $ConsomationMoyenneAu100 L </br>";
  echo "<br>Nombre de litres consommer : $Litre L </br>";
  echo "<br>Nombre de kilomètre parcourus par litre : $UnLitreKM KM </br>";
  echo "<br>Litre consomer par Kilomètre $UnKMLitre L </br>";
}
?>
