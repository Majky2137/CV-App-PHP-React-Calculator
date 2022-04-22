<?php
include('config.php');

if(isset($_POST['imie'])){

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$dsw = $_POST['exp'];
$wyk = $_POST['wyk'];
$jezyki = $_POST['jezyki'];
$skills = $_POST['skills'];
$zain = $_POST['zain'];
$email = $_POST['email'];
$numer = $_POST['numer'];
$Urodzony = $_POST['Urodzony'];
$miasto = $_POST['miasto'];
$opis = $_POST['opis'];

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT IGNORE INTO `dane` (`imie`,`nazwisko`,`exp`,`wyk`,`jezyki`,`skills`,`zain`,`email`,`telefon`,`data_ur`,`miasto`,`opis`) VALUES (:imie,:nazwisko,:dsw,:wyk,:jezyki,:skills,:zain,:email,:numer,:Urodzony,:miasto,:opis);";

$sqlr = $dbh->prepare($sql);

$sqlr->bindParam(':imie',$imie,PDO::PARAM_STR);
$sqlr->bindParam(':nazwisko',$nazwisko,PDO::PARAM_STR);
$sqlr->bindParam(':dsw',$dsw,PDO::PARAM_STR);
$sqlr->bindParam(':wyk',$wyk,PDO::PARAM_STR);
$sqlr->bindParam(':jezyki',$jezyki,PDO::PARAM_STR);
$sqlr->bindParam(':skills',$skills,PDO::PARAM_STR);
$sqlr->bindParam(':zain',$zain,PDO::PARAM_STR);
$sqlr->bindParam(':email',$email,PDO::PARAM_STR);
$sqlr->bindParam(':numer',$numer,PDO::PARAM_STR);
$sqlr->bindParam(':Urodzony',$Urodzony,PDO::PARAM_STR);
$sqlr->bindParam(':miasto',$miasto,PDO::PARAM_STR);
$sqlr->bindParam(':opis',$opis,PDO::PARAM_STR);

$sqlr->execute();

$sprawdzenie = $dbh->lastInsertId();

if($sprawdzenie){
	echo "Zapytanie wykonane poprawnie. </br> Id wpisu: ".$sprawdzenie;
}
else{
	echo "Wystąpił błąd!";
	$correct = "ALTER TABLE `dane` AUTO_INCREMENT=$sprawdzenie;";
	$crct = $dbh->prepare($correct);
	$crct->execute();
}
}
if(isset($_POST['usuntab'])){
    $usuntabele = "DELETE TABLE dane;";
    $usuntabeler = $dbh->prepare($usuntabele);
    $usuntabeler->execute();
}
if(isset($_POST['usunzw'])){
    $usunzawartosc = "TRUNCATE TABLE dane;";
    $usunzawartosctab = $dbh->prepare($usunzawartosc);
    $usunzawartosctab->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

	<title>Usuwanie</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" 
      type="image/png" 
      href="https://img.icons8.com/carbon-copy/2x/resume.png">
	
	<script src="jq.js"></script>
	
	
	
</head>


<body>





<div class="cv">
<div class="tytul">
      <span class="main-tytul podtekst centrowanie">Aplikacja CV</span>
      <p class="subtytul centrowanie">
        <span class="przezau">Opracowana przez:</span> Michał Wróblewski 3 I/R
      </p>
	  <p class="subtytul centrowanie">
        <span class="przezau">Usuwanie tabeli/zawartości</span>
      </p>
    </div>
<form  name="usuntabele" action="" method="POST">
    <input class="inputy_i_textarea2" type="number" name="usuntab" value="1" hidden>
    <input class="cv_guzik"  type="submit" value="Usuń tabelę">
</form> 
<form name="usunzawartosctabeli" action="" method="POST">
<input class="inputy_i_textarea2" type="number" name="usunzw" value="1" hidden>
    <input class="cv_guzik" type="submit" value="Usuń całą zawartość tabeli">
</form>
<br>
</br> 
<div class="forma-grupowanie">
<a href="aktualizacja.php"> <input class="cv_guzik" type="button" value="Powrót do pola aktualizacji"> </a>
</div>

<div class="forma-grupowanie">
<a href="dodawanie.php"> <input class="cv_guzik" type="button" value="Powrót do aplikacji(start)"> </a>
</div>
</div>


</body>
</html>