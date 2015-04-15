<?
$esifre = md5($_POST["esifre"]);
$ysifre = $_POST["ysifre"];
$ysifre2 =@$_POST["ysifre2"];

$nick = $verified_user;

if (!$okpasswd) {
echo "Höyt ulan !";
}
else {
// degiskenleri ata
$sorgu = "SELECT * FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$sifre=$kayit["sifre"];
} //while
} // if

if ($esifre == "" or $ysifre == "" or $ysifre2 == "") {
echo "Boþ alan býrakmamak iktiza etmekte..";
exit;
}

if ($esifre != $sifre) {
echo "Þuanki þifrenizi doðru yazarsanýz þifrenizi deðiþtiricem ama..";
exit;
}

if ($ysifre != $ysifre2) {
echo "Altý üstü þifreyi 2 yere birden yazýcan onuda beceremiyosun.. Bence sen vazgeç bu yazarlýk sevdasýndan..";
exit;
}




/*$ysifre = ereg_replace("þ","s",$ysifre);
$ysifre = ereg_replace("Þ","S",$ysifre);
$ysifre = ereg_replace("ç","c",$ysifre);
$ysifre = ereg_replace("Ç","C",$ysifre);
$ysifre = ereg_replace("ý","i",$ysifre);
$ysifre = ereg_replace("Ý","I",$ysifre);
$ysifre = ereg_replace("ð","g",$ysifre);
$ysifre = ereg_replace("Ð","G",$ysifre);
$ysifre = ereg_replace("ö","o",$ysifre);
$ysifre = ereg_replace("Ö","O",$ysifre);
$ysifre = ereg_replace("ü","u",$ysifre);
$ysifre = ereg_replace("Ü","U",$ysifre);
$ysifre = ereg_replace("Ö","O",$ysifre);*/



$sorgu = "SELECT nick,sifre FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$nick=$kayit["nick"];
$ysifre = md5($ysifre);
$sorgu = "UPDATE user SET sifre='$ysifre' WHERE nick='$nick'";
mysql_query($sorgu);
session_destroy();
echo "Þifreniz baþarýyla degiþtirildi.Yeniden giriþ yapmak için yönlendiriliyorsunuz, Please wait..
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5;URL=logout.php\">
";
exit;
}
}
}
?>