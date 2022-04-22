<?php
include('config.php');
if(isset($_POST['identyfikator'])){
  $id = $_POST['identyfikator'];
$sql = "SELECT * FROM dane WHERE id=$id;";
$query = $dbh->prepare($sql);
$query->execute();

$form = $query->fetch(PDO::FETCH_ASSOC);
if($form){
?>
<form class="cv" name="aktualizacja" action="" method="POST">
<div class="tytul">
      <span class="main-tytul podtekst centrowanie">Aplikacja CV</span>
      <p class="subtytul centrowanie">
        <span class="przezau">Opracowana przez:</span> Michał Wróblewski 3 I/R
      </p>
	  <p class="subtytul centrowanie">
        <span class="przezau">Aktualizacja Tabeli</span>
      </p>
    </div>
	
	<!-- Identyfikator-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="number" name="id" value="<?php echo $form['id']; ?>" readonly>
<div>

	<!-- Imię-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="text" name="imie" value="<?php echo $form['imie']; ?>" placeholder="Imię">
</div>
	<!-- Nazwisko-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="text" name="nazwisko" value="<?php echo $form['nazwisko']; ?>" placeholder="Nazwisko">
</div>

	<!-- Doświadczenie-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea" type="text" name="exp" value="<?php echo $form['exp']; ?>" placeholder="Doświadczenie">
</div>

	<!-- Wykształcenie-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="text" name="wyk" value="<?php echo $form['wyk']; ?>" placeholder="Wykształcenie">
</div>

	<!-- Języki-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="text" name="jezyki" value="<?php echo $form['jezyki']; ?>" placeholder="Języki">
</div>

	<!-- Umiejętności-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea" type="text" name="skills" value="<?php echo $form['skills']; ?>" placeholder="Umiejętności">
</div>

	<!-- Zainteresowania-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="text" name="zain" value="<?php echo $form['zain']; ?>" placeholder="Zainteresowania">
</div>

	<!-- Email-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="email" name="email" value="<?php echo $form['email']; ?>" placeholder="E-mail">
</div>

	<!-- Numer-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="number" name="numer" value="<?php echo $form['numer']; ?>" placeholder="Numer" maxlength = "9"  oninput="sprawdzenie(this)" >
</div>

	<!-- Data urodzenia-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="date" name="Urodzony" value="<?php echo $form['Urodzony']; ?>" placeholder="Data-urodzenia">
</div>

	<!-- Miasto-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="text" name="miasto" value="<?php echo $form['miasto']; ?>" placeholder="Miasto">
</div>

	<!-- Opis-->
<div class="forma-grupowanie">
<input class="inputy_i_textarea" type="text" name="opis" value="<?php echo $form['opis']; ?>" placeholder="Opis">
</div>
	<!-- Zatwierdzenie danych do aktualizacji-->
<div class="forma-grupowanie">
<input class="cv_guzik" type="submit" value="Wyślij" name="zatwierdz">
</div>

<div class="forma-grupowanie">
<a href="aktualizacja.php"> <input class="cv_guzik" type="button" value="Powrót do pola ID"> </a>
</div>
</form>

<?php
}

}

else{
	
    ?>
	
    <form class="cv" action="" method="POST">
	<div class="tytul">
      <span class="main-tytul podtekst centrowanie">Aplikacja CV</span>
      <p class="subtytul centrowanie">
        <span class="przezau">Opracowana przez:</span> Michał Wróblewski 3 I/R
      </p>
	  <p class="subtytul centrowanie">
        <span class="przezau">Proszę podać nr CV, którę pragniemy zmienić</span>
      </p>
    </div>
	<div class="forma-grupowanie">
<input class="inputy_i_textarea2" type="number" name="identyfikator" placeholder="Proszę wprowadzić id użytkownika w celu aktualizacji danych" min="1">
</div>

<div class="forma-grupowanie">
<input class="cv_guzik" type="submit" value="Wyślij">
</div>

<div class="forma-grupowanie">
<a href="wyswietlanie.php"> <input class="cv_guzik" type="button" value="Wyświetl informacje po ID"> </a>
</div>

<div class="forma-grupowanie">
<a href="usuwanie.php"> <input class="cv_guzik" type="button" value="Usuwanie tabeli/zawartości"> </a>
</div>

<div class="forma-grupowanie">
<a href="dodawanie.php"> <input class="cv_guzik" type="button" value="Powrót do aplikacji"> </a>
</div>

</form>
<?php
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

	<title>Aktualizacja</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" 
      type="image/png" 
      href="https://img.icons8.com/carbon-copy/2x/resume.png">
	
	<script src="jq.js"></script>
	
	
	
</head>


		
		
		<script>
  //Skrypt na maksymalną ilość znaków w inpucie numeru numeru
  
  function sprawdzenie(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }

		</script>



<?php

if(isset($_POST['zatwierdz'])){
    $id = $_POST['id'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
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

    $aktualizuj = "UPDATE `dane`
SET 
imie = '$imie',
nazwisko = '$nazwisko',
wyk = '$wyk',
jezyki = '$jezyki',
skills = '$skills',
zain = '$zain',
email = '$email',
numer = '$numer',
Urodzony = '$Urodzony',
miasto = '$miasto',
opis = '$opis'
WHERE id = $id;";

$formUpdate = $dbh->prepare($aktualizuj);
$formUpdate->execute();
if($formUpdate){
	echo "Pomyślnie zaktualizowano twoje CV";
}
}
?>
<body>
</body>
</html>