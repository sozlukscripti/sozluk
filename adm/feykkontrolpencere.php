<?php
session_start();
ob_start();

include("inc/baglan.php");


$verified_user = $_SESSION['verified_user'];
$verified_kat = $_SESSION['verified_kat'];
$verified_durum = $_SESSION['durum'];
$gsifre = $_SESSION['kat'];

if ($verified_kat == "admin") {

$nick = $_GET["nick"];

function feykmi($kullaniciadi) {

$kullanici = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE nick='$kullaniciadi'"));
$kullanici_ip = $kullanici["regip"];
$ayniipler = mysql_query("SELECT * FROM user WHERE ip='$kullanici_ip'");
$kactane = mysql_num_rows($ayniipler);
if ($kactane > 1) {
$feykvarmi = "1";
}
else if ($kactane <= 0) {
$feykvarmi = "0";
}
return $feykvarmi;

}

echo feykmi($nick);



}
else {
echo "yetkiniz yok";
}

?>