<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<head>
<meta charset="UTF-8">

	<title>Wyswietlanie</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" 
      type="image/png" 
      href="https://upload.wikimedia.org/wikipedia/commons/8/82/Allmusic_Favicon.png">
	
	<script src="jq.js"></script>
	
</head>
<script type="text/javascript">
$(document).ready(function(){
    $("button").click(function(){
        var id = $("input[type='number']").val();
        if(id != ""){
$.ajax({
    method: 'POST',
    url: 'tabela.php',
    data: {
"id" : id
    },
success: function(tabela){
    $("table").html(tabela);
}
});
        }
        else{
            alert("Proszę o padanie ID!");
        }
    });
});
</script>
<body>

<table class="cv">
<div class="cv">
<div class="tytul">
   
	  <p class="subtytul centrowanie">
        <span class="przezau"><b>Proszę podać nr CV z którego, pragniemy uzyskać informacje.</b></span>
      </p>
    </div>
	
<div class="forma-grupowanie">

<input class="inputy_i_textarea2" type="number" min="1">
</div>
<div class="forma-grupowanie">
<button class="cv_guzik" type="button">Pokaż informacje</button>
</div>

<div class="forma-grupowanie">
<a href="wyswietlanie.php"> <input class="cv_guzik" type="button" value="Wyświetl informacje po ID"> </a>
</div>

<div class="forma-grupowanie">
<a href="usuwanie.php"> <input class="cv_guzik" type="button" value="Usuwanie tabeli/zawartości"> </a>
</div>

<div class="forma-grupowanie">
<a href="aktualizacja.php"> <input class="cv_guzik" type="button" value="Powrót do pola aktualizacji"> </a>
</div>

<div class="forma-grupowanie">
<a href="dodawanie.php"> <input class="cv_guzik" type="button" value="Powrót do aplikacji(start)"> </a>
</div>

</div>
</table>

</body>
</html>