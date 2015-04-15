<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>feyk kontrol</title>
<style type="text/css">
body {
background-color:#ccc;
font-family:Verdana;
font-size:12px
}
a {
  color : #000080;
  text-decoration: none;
}
a:hover {
  background-color: #c0c0c0;
}
</style>
</head>
<body>
<?
include("inc/baglan.php");


$verified_user = $_SESSION['verified_user'];
$verified_kat = $_SESSION['verified_kat'];
$verified_durum = $_SESSION['durum'];
$gsifre = $_SESSION['kat'];

if ($verified_kat == "admin" or $verified_kat == "mod") {

$nick = $_GET["nick"];

$kullanicisql = mysql_query("SELECT * FROM user WHERE nick='$nick'");
$kullanici = mysql_fetch_array($kullanicisql);
$kullanici_ip = $kullanici["regip"];
$kullanici_nick = $kullanici["nick"];
$ayniipler = mysql_query("SELECT * FROM user WHERE regip='$kullanici_ip'");
$ayniiplerw = mysql_query("SELECT * FROM user WHERE regip='$kullanici_ip' ORDER BY id ASC");
$kactane = mysql_num_rows($ayniipler);
$uyevarmi = mysql_num_rows($kullanicisql);

if ($uyevarmi > 0) {


if ($kactane > 1) {
$feykvarmi = "<font color=red><b>var</b></font>";
}
else if ($kactane <= 1) {
$feykvarmi = "<font color=green><b>yok</b></font>";
}


echo "<table border=0>";
echo "<tr><td>nicki:</td><td>$kullanici_nick</td></tr>";
echo "<tr><td>ip numarasý:</td><td>$kullanici_ip</td></tr>";
echo "<tr><td>feyk var mý?:</td><td>$feykvarmi</td></tr>";
if ($kactane > 1) {
echo "<tr><td>kaç adet?:</td><td><font color=red><b>$kactane</b></font></td></tr>";
}
echo "</table>";


if ($kactane > 1) {
echo "<br/><br/><br/><b>feyk hesaplar:</b><br/><br/>";
echo "<table border=0>";
echo "<tr><td align=center><b>nick</b></td><td align=center><b>durum</b></td><td align=center><b>üyelik tarihi</b></td></tr>";
while ($whilehesaplar = mysql_fetch_array($ayniipler)) {
$wnick = $whilehesaplar["nick"];
$wdurum = $whilehesaplar["durum"];
$wtarih = $whilehesaplar["regtarih"];

echo "<tr><td><a target='main' href='sozluk.php?process=adm&islem=kullanici&update=ok&gnick=$wnick'>$wnick</a></td><td align=center>$wdurum</td><td>$wtarih</td></tr>";
}
echo "</table>";
}

} //uye var mi ?
else {
echo "üye bulunamadý";
}

}
else {
echo "yetkiniz yok";
}

?>
</body>
</html>