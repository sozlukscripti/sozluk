<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
$sorgu1 = "SELECT * FROM stat";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];
$entry=$kayit2["entry"];
$silbaslik=$kayit2["silbaslik"];
$silentry=$kayit2["silentry"];
$hit=$kayit2["hit"];
$tekil=$kayit2["tekil"];
$yazar=$kayit2["yazar"];
$okur=$kayit2["okur"];
$mod=$kayit2["moderat"];
$op=$kayit2["op"];
$pilot=$kayit2["pilot"];
$admin=$kayit2["admin"];
$ortbaslik=$kayit2["ortbaslik"];
$ortentry=$kayit2["ortentry"];
$enhitbaslik=$kayit2["enhitbaslik"];
$tarih=$kayit2["tarih"];

$basliklink = ereg_replace(" ","+",$enhitbaslik);

echo "
<LINK href=\"images/default.css\" type=text/css rel=stylesheet>
<SCRIPT src=\"images/sozluk.js\" type=text/javascript></SCRIPT>
<META http-equiv=Content-Type content=\"text/html; charset=iso-8859-9\">
<center><a class=link><b>Bi ton zırva..</b></center>
<table align=center width=\"400\" border=\"0\" cellSpacing=0 cellPadding=0>
  <tr>
    <td width=\"300\"><a class=div><b>Toplam Baslik Sayisi</td>
    <td width=\"4\">:</td>
    <td width=\"271\">$baslik</td>
  </tr>
  <tr>
    <td><a class=div><b>Toplam Entry Sayisi</a></td>
    <td>:</td>
    <td>$entry</td>
  </tr>
  <tr>
    <td><a class=div><b>Silinen Baslik Sayisi </td>
    <td>:</td>
    <td>bilinmiyor</td>
  </tr>
  <tr>
    <td><a class=div><b>Silinen Entry Sayisi </td>
    <td>:</td>
    <td>$silentry</td>
  </tr>
  <tr>
    <td><a class=div><b>Toplam Baslik Gösterimi </td>
    <td>:</td>
    <td>$hit</td>
  </tr>
  <tr>
    <td><a class=div><b>Toplam Ziyaretçi </td>
    <td>:</td>
    <td>$tekil</td>
  </tr>
  <tr>
    <td colspan=\"3\"></td>
  </tr>
  <tr>
    <td><a class=div><b>Aktif Yazar Sayisi </td>
    <td>:</td>
    <td>$yazar</td>
  </tr>
  <tr>
    <td><a class=div><b>Çömez Yazar Sayisi </td>
    <td>:</td>
    <td>$okur</td>
  </tr>
  <tr>
    <td><a class=div><b>Pilot Yazar Sayisi </td>
    <td>:</td>
    <td>$pilot</td>
  </tr>
  <tr>
    <td><a class=div><b>Moderatör Sayisi </td>
    <td>:</td>
    <td>$mod</td>
  </tr>
  <tr>
    <td><a class=div><b>Operatör Sayisi </td>
    <td>:</td>
    <td>0</td>
  </tr>
  <tr>
    <td><a class=div><b>Y&ouml;netici Sayisi </td>
    <td>:</td>
    <td>$admin</td>
  </tr>
  <tr>
    <td><a class=div><b>En hit baslik </td>
    <td>:</td>
    <td><a href=sozluk.php?process=word&q=$basliklink>$enhitbaslik</a></td>
  </tr>

  <tr>
    <td colspan=\"3\"></td>
  </tr>
  <tr>
    <td><a class=div>Yazar basina d&uuml;sen ortalama baslik sayisi </td>
    <td>:</td>
    <td>$ortbaslik</td>
  </tr>
  <tr>
    <td><a class=div>Yazar basina d&uuml;sen ortalama entry sayisi </td>
    <td>:</td>
    <td>$ortentry</td>
  </tr>
</table> <br>
<center>Son Güncelleme: $tarih</center>
";

?>