<?php
include('config.php');

if(isset($_POST['imie'])){

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$exp = $_POST['exp'];
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

$sql = "INSERT IGNORE INTO `dane` (`imie`,`nazwisko`,`exp`,`wyk`,`jezyki`,`skills`,`zain`,`email`,`numer`,`Urodzony`,`miasto`,`opis`) VALUES (:imie,:nazwisko,:exp,:wyk,:jezyki,:skills,:zain,:email,:numer,:Urodzony,:miasto,:opis);";

$sqlr = $dbh->prepare($sql);

$sqlr->bindParam(':imie',$imie,PDO::PARAM_STR);
$sqlr->bindParam(':nazwisko',$nazwisko,PDO::PARAM_STR);
$sqlr->bindParam(':exp',$exp,PDO::PARAM_STR);
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

$check = $dbh->lastInsertId();

if($check){
	echo "Zostałeś wpisany do bazy.!</br>Gratulujemy i życzymy powodzenia <p> Twój nr w kolejce oczekujących to: ".$check;
}
else{
	echo "Niestety coś poszło nie tak, prawdopodobnie próbowano przeładować, te samo zgłoszenie.";
	$correct = "ALTER TABLE `dane` AUTO_INCREMENT=$check;";
	$crct = $dbh->prepare($correct);
	$crct->execute();
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

	<title>Aplikacja CV</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" 
      type="image/png" 
      href="https://upload.wikimedia.org/wikipedia/commons/8/82/Allmusic_Favicon.png">
	
	<script src="jq.js"></script>
	
	
	
</head>

		
		
		<script>
  //Skrypt na maksymalną ilość znaków w inpucie numeru telefonu
  
  function sprawdzenie(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }

		</script>




<body>
	<fieldset class="cv">
<form  action="" method="POST">
<div class="tytul">
      <span class="main-tytul podtekst centrowanie">Aplikacja CV</span>
      <p class="subtytul centrowanie">
        <span class="przezau">Opracowana przez:</span> Michał Wróblewski 3 I/R
      </p>
	  <p class="subtytul centrowanie">
        <span class="przezau">Dodawanie CV</span>
      </p>
    </div>
	<!-- Imię-->
 <div class="forma-grupowanie">
      <input name="imie" class="inputy_i_textarea2" placeholder="Imię" value="" autofocus="autofocus" type="text" required="required">
    </div>
	<!--Nazwisko -->
  <div class="forma-grupowanie">
      <input name="nazwisko" class="inputy_i_textarea2" placeholder="nazwisko" value="" type="text"  required="required">
    </div>
	<!--Doświadczenie zawodowe-->
	 <div class="forma-grupowanie">
      <textarea class="inputy_i_textarea"  value="" type="text" name='exp' placeholder="Doświadczenie" required="required"></textarea>
    </div>
	<!--Wykształcenie-->
	<div class="forma-grupowanie">
      <textarea class="inputy_i_textarea2"  value="" type="text" name='wyk' placeholder="Wykształcenia" required="required"></textarea>
    </div>
	<!--Języki które zna osoba-->
	<div class="forma-grupowanie">
      <textarea class="inputy_i_textarea2"  value="" type="text" name='jezyki' placeholder="Języki" required="required"></textarea>
    </div>
	<!--Umiejętności-->
	<div class="forma-grupowanie">
      <textarea class="inputy_i_textarea"  value="" type="text" name='skills' placeholder="Umiejętności" required="required"></textarea>
    </div>
	<!--Zainteresowanie/Hobby-->
	<div class="forma-grupowanie">
      <textarea class="inputy_i_textarea"  value="" type="text" name='zain' placeholder="Zainteresowania"></textarea>
    </div>
	<!--Email-->
	<div class="forma-grupowanie">
      <input class="inputy_i_textarea2"  value="" type="email" name='email' placeholder="E-mail" required="required">
    </div>
	<!--Numer telefonu-->
	<div class="forma-grupowanie">
      <input class="inputy_i_textarea2"  value="" type="number" name='numer' placeholder="Numer" required="required" maxlength = "9"  oninput="sprawdzenie(this)">
    </div>
	<!--Urodzony-->
	<div class="forma-grupowanie">
      <input class="inputy_i_textarea2"  value="" type="date" name='Urodzony' placeholder="Data-urodzenia" required="required">
    </div>
	<!--Miasto-->
	<div class="forma-grupowanie">
	<input class="inputy_i_textarea2" type="text" name='miasto' placeholder="Miasto" required="required">
	</div>
	<!--Opis-->
	<div class="forma-grupowanie">
	<textarea class="inputy_i_textarea" name='opis' placeholder="Opis" required="required"></textarea>
	</div>
	
	<!--Guzik potwierdzający-->
	<div class="forma-grupowanie">
     
      <input class="cv_guzik" type="submit" value="Dodaj">
    </div>
	
	<div class="forma-grupowanie">
<a href="aktualizacja.php"> <input class="cv_guzik" type="button" value="Aktualizuj dane"> </a>
</div>

<div class="forma-grupowanie">
<a href="wyswietlanie.php"> <input class="cv_guzik" type="button" value="Wyświetl informacje po ID"> </a>
</div>

<div class="forma-grupowanie">
<a href="usuwanie.php"> <input class="cv_guzik" type="button" value="Usuwanie tabeli/zawartości"> </a>
</div>


</form>

</fieldset>
</body>
</html>



