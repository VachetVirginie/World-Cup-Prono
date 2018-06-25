<?php

  // Include config file

 





define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', 'root');

define('DB_NAME', 'pronostic');

 

/* Attempt to connect to MySQL database */

try{

    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

    // Set the PDO error mode to exception

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){

    die("ERROR: Could not connect. " . $e->getMessage());

}







$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%A%' ORDER BY `HomeTeam` ASC");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam']; ?></p>
<?php
}


$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%B%' ORDER BY `HomeTeam` ASC");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam']; ?></p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>



