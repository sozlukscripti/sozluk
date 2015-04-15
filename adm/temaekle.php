<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($temaekle != 1) {
echo "Burasi benim ilim yerim! yalnis geldin bacim..";
die;
}
if ($ok) {
$tema =@$_POST["tema"];

$sorgu = "INSERT INTO temalar ";
$sorgu .= "(tema)";
$sorgu .= " VALUES ";
$sorgu .= "('$tema')";
mysql_query($sorgu);
echo "$tema temasi eklendi.<br />
tema dosyalarini da ekleyelim mi Peki ?<br />
<a href=sozluk.php?process=adm&islem=yuklee>ekleyelim hacim</a>";
}
else {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?=$sitename?> Tema Ekle</title>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>
</head>

<body>
tema eklerken dikkat edilecek hususlar;
</br>
"<b>deneme</b>" adýnda dosyanýz varsa,
</br>
tema ismininde "<b>deneme</b>" olmasý gerek,
</br>
tema ile dosya ayný isimde olmalýdýr,
</br>
yoksa ekleseniz bile gözükmeyecektir.
</br>
</br>
<form METHOD=post action>
<table width="300" border="0">
  <tr>
   <td>tema adi</td>
   <td>:</td>
   <td><textarea cols="100" rows="1" name="tema"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <input TYPE=hidden name=ok value=ok>
    <td><input type="submit" name="Submit" value="Ekle"></td>
  </tr>
</table>
</form>
</body>
</html>
<? } ?>