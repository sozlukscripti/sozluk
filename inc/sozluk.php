<?PHP

// Oturumu Başlat
session_start();
ob_start();

// Dahil Edilen Dosyalar
include "inc/baglan.php";

// Tema Kontrol
if ($verified_user) {
$sorgu1 = "SELECT * FROM user WHERE `nick` = '$verified_user'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$tema=$kayit2["tema"];
if (!$tema)
$tema = "default";
}
else {
$tema = "default";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">

<html>
<head>
	<META http-equiv="Content-Type" content="text/html; charset=WINDOWS-1254">
	<SCRIPT src="images/top.js" type="text/javascript"></SCRIPT>
	<SCRIPT language="text/javascript" src="images/sozluk.js"></SCRIPT>
	<LINK href="favicon.ico" rel="shortcut Icon"><LINK href="favicon.ico" rel="icon">
	<LINK href="images/sozluk.css" type="text/css" rel="stylesheet">
	<LINK href="images/<? echo $tema ?>.css" type="text/css" rel="stylesheet">
</head>



<body>

<?php



$verified_user = $_SESSION['verified_user'];

$verified_kat = $_SESSION['verified_kat'];

$verified_durum = $_SESSION['durum'];
$verified_durum = $_SESSION['durum'];
$gsifre = $_SESSION['kat'];

$yetkikontrol=mysql_query("select * from user where nick='$verified_user'");
$deneyelim=mysql_fetch_array($yetkikontrol);
$nickkontrol=$deneyelim["nick"];
$yetkisi=$deneyelim["yetki"];
$sifrekont=$deneyelim["sifre"];
if ($verified_kat != $yetkisi) { header("Location: logout.php"); }
if ($gsifre != $sifrekont) { header("Location: logout.php"); }
if ($_POST[adm] or $_REQUEST[verified_user] or $_REQUEST[verified_kat] or $_REQUEST[kullanici]) {

 die();

} 

$user_ip = getenv('REMOTE_ADDR');

$sorgu1 = "SELECT ip FROM ipban WHERE `ip` = '$user_ip'";

$sorgu2 = mysql_query($sorgu1);

$kayit2=mysql_fetch_array($sorgu2);

$ip=$kayit2["ip"];

if ($ip and $verified_user != "admin")

header("Location: bakim.php");



$sorgu1 = "SELECT nick,durum FROM user WHERE `nick` = '$verified_user'";

$sorgu2 = mysql_query($sorgu1);

$kayit2=mysql_fetch_array($sorgu2);

$durum=$kayit2["durum"];

$nick=$kayit2["nick"];

if ($durum == "sus")

header ("Location: logout.php");



$sorgu1 = "SELECT * FROM ayar";

$sorgu2 = mysql_query($sorgu1);

mysql_num_rows($sorgu2);

$kayit2=mysql_fetch_array($sorgu2);

$site=$kayit2["site"];

$reg=$kayit2["reg"];



if (eregi('http', $process)) {

    echo "hata";

exit;

}



if (eregi('www', $process)) {

    echo "hata";

exit;

}



if ($site == "off" and $verified_kat == "admin" and $process != "top") {

echo "<font color=red>Uyarı!: Site şuan kapalı konumda.</font>";

}

if ($site == "tech" and $verified_kat == "admin" and $process != "top") {

echo "<font color=red>Uyarı!: Site şuan bakım konumunda.</font>";

}

if ($site == "off" and $verified_kat != "admin" and $process != "top") {

include "kapali";

die;

}

if ($site == "tech" and $verified_kat != "admin" and $process != "top") {

include "bakim.php";

die;

}

if ($site == "bakimda" and $verified_user and $process != "top") {

	echo "Sözlük bakima girmistir. Performans sorunlari yasayabilirsiniz...";

}

if ($site == "radyo" and $verified_user and $process != "top") {

	echo "<b>taktaksozluk Radyo Yayinda...</b> Baglanmak İcin <a href='javascript:od('radyo.php',310,450)'>Tiklayin</a>";

}

if ($verified_user) {       // kontrol

$son_zaman = time() - 1800;

$sorgu = "DELETE FROM online WHERE islem_zamani < $son_zaman";

mysql_query($sorgu);

$simdikizaman = time();

if ($verified_kat == "admin") {

$gnick = "&$verified_user";

$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$gnick'";

mysql_query($sorgu);

}

else if ($verified_kat == "mod") {

$gnick = "+$verified_user";

$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$gnick'";

mysql_query($sorgu);

}

else if ($verified_kat == "gammaz") {

$gnick = "$verified_user*";

$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$gnick'";

mysql_query($sorgu);

}

else {

$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$verified_user'";

mysql_query($sorgu);

}

} // kayitli online kont





if ($process) {

if ($process == "privmsg" and !$verified_user) {

Header ("Location: logout.php");

die;

}



if ($process == "cp" and !$verified_user) {

Header ("Location: logout.php");

die;

}



if ($process == "add" and !$verified_user) {

Header ("Location: logout.php");

die;

}

if ($process == "adm" and !$verified_user) {

Header ("Location: logout.php");

die;

}



if ($process == "msjoku" and !$verified_user) {

Header ("Location: logout.php");

die;

}



if ($process == "msjana" and !$verified_user) {

Header ("Location: logout.php");

die;

}



if ($process == "yenimsj" and !$verified_user) {

Header ("Location: logout.php");

die;

}

if ($process == "adm" and !$verified_user) {

Header ("Location: logout.php");

die;

}



if ($process == "onlines" and !$verified_user) {

Header ("Location: logout.php");

die;

}

if ($_REQUEST[kullanici] or $_REQUEST[sozluk] or $_REQUEST[verified_kat] or $_REQUEST[verified_user]) { echo "kurcuklama boşuna, o eskidendi."; die(); }  

// echo $process;

if ($process!="adm") {

	if (file_exists("inc/$process.php")) {

	include "inc/$process.php";

	} else {

		if ($_GET['q'] and !$process and !$_GET['b']) {

		 include "inc/word.php";

		} else if (!$_GET) {

		 include "inc/word.php";

		} else if ($_GET['q'] and !$process and $_GET['b']="td") {

		 include "inc/word.php";

		} else {

		header("Location: sozluk.php?process=word&q=taktaksozluk");

		}	

	}

} 
if ((!eregi("^[' A-Za-z0-9_]+$", $islem) and $islem != "") or (!eregi("^[' A-Za-z0-9_]+$", $process) and $process != "")) 
die("uygunsuz karakter!");  
else {

	if (file_exists("adm/$process.php")) {

	include "adm/$process.php";

	}

}







if ($process == "word") {

function mtime(){

    list($usec, $sec) = explode(" ",microtime());

    return ((float)$usec + (float)$sec);

    }

$basla = mtime();

for ($i=0; $i < 10000; $i++){

    }

$bitir = mtime();

echo "<br /><br /><br /><br /><br /><center><a href=sozluk.php?process=word&q=taktaksozluk target=main><font size=1>taktaksozluk toplulugu</font></a>";

ob_start();

echo "

<hr>



<font size=1><a href=\"http://www.taktaksozluk.com/birsozlugun+alt+aciklamasi.html\">birsozlugun alt ust ettigi yer</a><br>
Copyright by taktaksozluk 2011 (c) ¿¿¿¿<br>

<a href=\"sozluk.php?process=sikayetgiris\">Yönetimle İletiseyim</a>
<br><a href=\"http://www.taktaksozluk.com/dipnot.html\">dipnot</a>: taktaksozluk.com bünyesi; Kişisel hakaret ve haklara karşı saygılı davranmakta, yazarlar bu gibi durumlardan kendisi sorumludur. Düşüncelerinizin özgürlüğünün pisliğini sözlüğe dökerseniz; sifonu çekmekte bizde yardımcı eleman olarak, bulunacağımızı unutmayın. öptük ciao bye.<br>
<a href=http://www.sozlukerciyes.org/sitemap.xml>sitemap</a>imizde var artık<br>
";

}



}

ob_end_flush();

?>


</body>

</html>

