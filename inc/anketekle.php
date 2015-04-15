<fieldset>
<?php
if (!$verified_user) die("just register yazarlar girebilir lan!");
include "config.php"; 
echo "
<a href='sozluk.php?process=anketgoster'>anketler</a> | <a href='sozluk.php?process=anketstat'>istatistikler</a>
<fieldset><legend>anket aç</legend><br>
<form action='sozluk.php?process=addanket' method='POST'>
anket adi:<br>
<input type='text' name='zirve' size='30'><br>
<table width='290' border='0'>
  <tr>
    <td width='290'>anket sorusu:</td>
	
	 </tr>
	  <tr>
    <td><textarea name='detay' rows='5' cols='10'></textarea></td>
	</table><br>
	<table width='290' border='0'>
  <tr>
    <td width='290'>anketörün cevabý:</td>
	
	 </tr>
	  <tr>
    <td><textarea name='tavsiye' rows='5' cols='10'></textarea></td>
	</table><br>
	<input type='submit' value='anket aç!' class='but'>
	</form>
	<div class='copyright'><br>açtýðýnýz anketler ''en sevdiðiniz renk'',''en hýzlý araba'',''en büyük takým'' þeklinde zeka sýnýrlarýmýzý zorlayýp bize efor sarfettirmeyin. ayrýca anketör bölümünde yazdýklarýnýz hiç bir þekilde entry sayýnýza ve oy sayýnýza etki etmeyecektir.
	.<br>
	".$sitename." anketör eklentisi</div>
	<br></fieldset>
	
";

?>
</fieldset>