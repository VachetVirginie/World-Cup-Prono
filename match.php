<?php require_once 'connexion.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">

<ul class="tabs">
    <li class="tab-link current" data-tab="tab-1">Groupe A</li>
    <li class="tab-link" data-tab="tab-2">Groupe B</li>
    <li class="tab-link" data-tab="tab-3">Group C</li>
    <li class="tab-link" data-tab="tab-4">Groupe D</li>
<li class="tab-link" data-tab="tab-5">Groupe E</li>
<li class="tab-link" data-tab="tab-6">Groupe F</li>
<li class="tab-link" data-tab="tab-7">Groupe G</li>
<li class="tab-link" data-tab="tab-8">Groupe H</li>
</ul>

<div id="tab-1" class="tab-content current">
<h3>Groupe A</h3>
<?php
$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%A%' ORDER BY `HomeTeam` ASC ");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    $id=$donnees['Id'];  
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam'].'<form name="form1">1 <input type="radio" name="score" checked value="1" >
N <input type="radio" name="score" value="N" >
2 <input type="radio" name="score" value="2" >
</form>'.'<input type="button" onclick="whichFruit()" value="Parier">'; ?></p>
<?php
}


?>
</div>
<div id="tab-2" class="tab-content">
<h3>Groupe B</h3>
<?php
$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%B%' ORDER BY `HomeTeam` ASC");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam'].'<form name="form1">1 <input type="radio" name="score" checked value="1" >
N <input type="radio" name="score" value="N" >
2 <input type="radio" name="score" value="2" >
</form>'.'<input type="button" onclick="whichFruit()" value="Parier">'; ?></p>
<?php
}


?>
</div>
<div id="tab-3" class="tab-content">
<h3>Groupe C</h3>
<?php
$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%C%' ORDER BY `HomeTeam` ASC");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam'].'<form name="form1">1 <input type="radio" name="score" checked value="1" >
N <input type="radio" name="score" value="N" >
2 <input type="radio" name="score" value="2" >
</form>'.'<input type="button" onclick="whichFruit()" value="Parier">'; ?></p>
<?php
}


?>
</div>
<div id="tab-4" class="tab-content">
<h3>Groupe D</h3>
<?php
$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%D%' ORDER BY `HomeTeam` ASC");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam'].'<form name="form1">1 <input type="radio" name="score" checked value="1" >
N <input type="radio" name="score" value="N" >
2 <input type="radio" name="score" value="2" >
</form>'.'<input type="button" onclick="whichFruit()" value="Parier">'; ?></p>
<?php
}


?>
</div>
<div id="tab-5" class="tab-content">
<h3>Groupe E </h3>
<?php
$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%E%' ORDER BY `HomeTeam` ASC");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam'].'<form name="form1">1 <input type="radio" name="score" checked value="1" >
N <input type="radio" name="score" value="N" >
2 <input type="radio" name="score" value="2" >
</form>'.'<input type="button" onclick="whichFruit()" value="Parier">'; ?></p>
<?php
}


?>
</div>
<div id="tab-6" class="tab-content">
<h3>Groupe F</h3>
<?php
$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%F%' ORDER BY `HomeTeam` ASC");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam'].'<form name="form1">1 <input type="radio" name="score" checked value="1" >
N <input type="radio" name="score" value="N" >
2 <input type="radio" name="score" value="2" >
</form>'.'<input type="button" onclick="whichFruit()" value="Parier">'; ?></p>
<?php
}


?>
</div>
<div id="tab-7" class="tab-content">
<h3>Groupe G</h3>
<?php
$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%G%' ORDER BY `HomeTeam` ASC");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam'].'<form name="form1">1 <input type="radio" name="score" checked value="1" >
N <input type="radio" name="score" value="N" >
2 <input type="radio" name="score" value="2" >
</form>'.'<input type="button" onclick="whichFruit()" value="Parier">'; ?></p>
<?php
}


?>
</div>
<div id="tab-8" class="tab-content">
<h3>Groupe H</h3>
<?php
$reponse = $pdo->query("SELECT * FROM `matchs` WHERE `Group` LIKE '%H%' ORDER BY `HomeTeam` ASC");

// On affiche chaque entrée une à une et colonne par colonne
while ($donnees = $reponse->fetch())
{
    
?>

<p>
 <?php echo $donnees['HomeTeam']." "."vs"." ".$donnees['AwayTeam'].'<form name="form1">1 <input type="radio" name="score" checked value="1" >
N <input type="radio" name="score" value="N" >
2 <input type="radio" name="score" value="2" >
</form>'.'<input type="button" onclick="whichFruit()" value="Parier">'; ?></p>
<?php
}


?>
</div>
</div><!-- container -->  
</body>
<script>

$(document).ready(function(){
	
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

})

</script>
</html>