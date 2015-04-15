<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<LINK href="images/default.css" type=text/css rel=stylesheet>
<SCRIPT src="images/new.js" type=text/javascript></SCRIPT>
<?
if ($id and $ybaslik and $baslik) {
$id =@$_POST["id"];
$ybaslik =@$_POST["ybaslik"];
$baslik =@$_POST["baslik"];


/*$ybaslik = ereg_replace("þ","s",$ybaslik);
$ybaslik = ereg_replace("Þ","S",$ybaslik);
$ybaslik = ereg_replace("ç","c",$ybaslik);
$ybaslik = ereg_replace("Ç","C",$ybaslik);
$ybaslik = ereg_replace("ý","i",$ybaslik);
$ybaslik = ereg_replace("Ý","I",$ybaslik);
$ybaslik = ereg_replace("ð","g",$ybaslik);
$ybaslik = ereg_replace("Ð","G",$ybaslik);
$ybaslik = ereg_replace("ö","o",$ybaslik);
$ybaslik = ereg_replace("Ö","O",$ybaslik);
$ybaslik = ereg_replace("ü","u",$ybaslik);
$ybaslik = ereg_replace("Ü","U",$ybaslik);
$ybaslik = ereg_replace("Ö","O",$ybaslik);*/

$ybaslik = strtolower($ybaslik);

/*if (!ereg("^[A-za-z0-9]",$ybaslik)) {
echo "<p class=div1>Basliklarda;<br>sadece ingilizce harfler,<br>bosluk {space},<br>ve rakamlar bulunabilir.<br>Lütfen bu kurallara uygun bir baslik yazin.</p>";
exit;
}*/

//burasi modlog icin
if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$tarih = "$gun/$ay/$yil";
$sorgu = "INSERT INTO history ";
$sorgu .= "(olay,mesaj,moderat,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('baslik tasi','$baslik basligi $ybaslik olarak tasýndý. ','$verified_user','$tarih','$gun','$ay' ,'$yil','$saat')";
mysql_query($sorgu);
//modlog bitti
$sorgu = "UPDATE konucuklar SET `tasi` = '$ybaslik' WHERE id='$id'";
mysql_query($sorgu);

$sorgu1 = "SELECT id FROM konucuklar WHERE `baslik` = '$ybaslik'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$yid=$kayit2["id"];

$sorgu = "SELECT id,sira FROM mesajciklar WHERE sira='$id'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$sira=$kayit["sira"];
$sorgu = "UPDATE mesajciklar SET `sira` = '$yid' WHERE sira = '$id'";
mysql_query($sorgu);
echo "$sira numaralý entry $ybaslik baþlýðýna taþýndý.<br>";
}
}


echo "<br><center><b>Baþlýk \"$ybaslik\" baþlýðýna taþýndý.</center>";
}
else {

if ($id) {
$sorgu = "SELECT id,baslik FROM konucuklar WHERE id='$id'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$baslik=$kayit["baslik"];
}
}

echo "
<form method=post action=>
<table width=\"443\" border=\"0\">
  <tr>
    <td width=\"154\">Baþlýk</td>
    <td width=\"10\">:</td>
    <td width=\"265\"><input name=\"baslik\" type=\"text\" id=\"baslik\" value=\"$baslik\"readonly=\"1\"></td>
  </tr>
  <tr>
    <td>Taþýnacak baþlýk</td>
    <td>:</td>
    <td><input name=\"ybaslik\" type=\"text\" id=\"ybaslik\"></td>
  </tr>
    <input type=hidden name=id value=$id>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name=\"sebep\" type=\"submit\" id=\"sebep\" value=\"Aktar ->\"></td>
  </tr>

</table>
</form>
";
}
}

?>