<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?php

$e = $_POST['e'];
$m = $_POST['m'];
$k = $_POST['k'];
//$_POST['hede']; 

if ($e == "" || $k == "" || $m == "") die("Heryeri doldurun!");

$m = ereg_replace("<","",$m);
$m = ereg_replace(">","",$m);
$e = ereg_replace(">","",$e);
$k = ereg_replace(">","",$k);
//
$s = "INSERT into sikayet";
$s.= "(e,m,k)";
$s.= "VALUES";
$s.= "('$e','$m','$k')";

$s = mysql_query ($s);
//

if ($s) {    
    echo "Görüþünüzü kaydettik. Teþekkürler.";
} else {    
    echo "Ups! Trajedik bir hata oluþtu. Görüþünüz kaydedilemedi.";
}

?> 