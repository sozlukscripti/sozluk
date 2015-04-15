<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<?
if ($kullanici != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
#################################
if ($yazar and $ok) {
$yazar =@$_POST["yazar"];
$sorgu = "SELECT id,yazar FROM mesajciklar WHERE yazar = '$yazar' and statu = ''";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$id=$kayit["id"];
$sorgu = "UPDATE mesajciklar SET `statu` = 'silindi' WHERE id='$id'";
mysql_query($sorgu);
echo "<b>$id ($yazar) </b>silinenler listesine eklendi.<br>";
}
}
}
#################################
else {
echo "
<form name=\"form1\" method=\"post\" action=\"\">
$yazar nickine ait tüm entry'lar silenecek.<br>
Emin misiniz ?
  <input name=\"Submit\" type=\"submit\" value=\"evet $yazar nickine ait tüm entryleri sil!\">
  <input name=\"yazar\" type=\"hidden\" id=\"yazar\" value=\"$yazar\">
  <input name=\"ok\" type=\"hidden\" id=\"ok\" value=\"ok\">
</form>
";
}


?>