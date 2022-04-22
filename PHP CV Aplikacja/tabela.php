
<?php
include('config.php'); 
$id = $_POST['id'];
$sql = "SELECT * FROM dane WHERE id=$id;";
$query = $dbh->prepare($sql);
$query->execute();
while($tabela = $query->fetch(PDO::FETCH_ASSOC)):
?>

<div class="tytul">
   <span class="main-tytul podtekst centrowanie">Aplikacja CV</span>
      <p class="subtytul centrowanie">
        <span class="przezau">Opracowana przez:</span> Michał Wróblewski 3 I/R
      </p>
	  <p class="subtytul centrowanie">
        <span class="przezau">Dane CV Użytkownika <B>NR:</B> <?php echo $tabela['id']; ?> <B>Imię:</B> <?php echo $tabela['imie']; ?> <B>Nazwisko:</B> <?php echo $tabela['nazwisko']; ?></span>
      </p>
    </div>
<tr class="cv">

<td class="inputy_i_textarea2"><span><b>Imię:</b></span> <?php echo $tabela['imie']; ?></td>
<td class="inputy_i_textarea2"><span><b>Nazwisko:</b></span> <?php echo $tabela['nazwisko']; ?></td>
<td class="inputy_i_textarea2"><span><b>Doświadczenie:</b></span> <?php echo $tabela['exp']; ?></td>
<td class="inputy_i_textarea2"><span><b>Wykształcenie:</b></span> <?php echo $tabela['wyk']; ?></td>
<td class="inputy_i_textarea2"><span><b>Języki:</b></span> <?php echo $tabela['jezyki']; ?></td>
<td class="inputy_i_textarea2"><span><b>Umiejętności:</b></span> <?php echo $tabela['skills']; ?></td>
<td class="inputy_i_textarea2"><span><b>Zainteresowania:</b></span> <?php echo $tabela['zain']; ?></td>
<td class="inputy_i_textarea2"><span><b>E-mail:</b></span> <?php echo $tabela['email']; ?></td>
<td class="inputy_i_textarea2"><span><b>Numer Telefonu:</b></span> <?php echo $tabela['numer']; ?></td>
<td class="inputy_i_textarea2"><span><b>Urodzony:</b></span> <?php echo $tabela['Urodzony']; ?></td>
<td class="inputy_i_textarea2"><span><b>Miasto:</b></span> <?php echo $tabela['miasto']; ?></td>
<td class="inputy_i_textarea2"><span><b>Opis:</b></span> <?php echo $tabela['opis']; ?></td>
</tr>
<?php endwhile; ?>