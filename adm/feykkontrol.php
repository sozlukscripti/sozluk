<?php
session_start();
ob_start();

include("inc/baglan.php");


$verified_user = $_SESSION['verified_user'];
$verified_kat = $_SESSION['verified_kat'];
$verified_durum = $_SESSION['durum'];
$gsifre = $_SESSION['kat'];

if ($verified_kat == "admin") {

}
else {
echo "yetkiniz yok";
}

?>