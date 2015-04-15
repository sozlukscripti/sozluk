<?
ob_start();
session_start();
include "inc/baglan.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<SCRIPT src="images/top.js" type=text/javascript></SCRIPT>
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
<LINK href="images/sozluk.css" type=text/css rel=stylesheet>
<LINK href="images/default.css" type=text/css rel=stylesheet>
<LINK href="favicon.ico" rel="shortcut Icon"><LINK href="favicon.ico" rel=icon>
<style type="text/css">
<!--
.yazi {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 9px;
}
.baslik {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.kalinbas {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.kalinyazi {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; font-weight: bold; }
-->
</style>
</head>

<body CLASS="body">
<?

$gnick =@$_POST["gnick"];
$gsifre = md5($_POST["gsifre"]);
$gnick = strtolower($gnick);

$sorgu = "SELECT * FROM user WHERE nick='$gnick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayytlary listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
$nick=$kayit["nick"];
$yetki=$kayit["yetki"];
$sifre=$kayit["sifre"];
$email=$kayit["email"];
$kat=$kayit["kat"];
$durum=$kayit["durum"];
$epostaakt=$kayit["epostaakt"];


if ($nick == "$gnick" and $sifre == "$gsifre") {

if ($epostaakt == "yapmadi") {
echo "hesabiniz aktiflestirilmemis. lutfen e-posta adresinize gonderilen aktivasyon linkine tiklayiniz.. ";
die;
}

if ($durum == "sus") {
echo "<font color=\"red\">senin bu hesabýn var ya. silinmiþ o.</font>";
die;
}



$verified_user = $gnick;
$verified_kat = $yetki;
$yazdurum = $durum;
$sid = $PHPSESSID;
$ip = getenv('REMOTE_ADDR');
$islem_zamani = time();
$sorguip = mysql_query("UPDATE user SET regip='$ip' WHERE nick='$verified_user'");
if ($yetki == "admin")
$gnick = "$gnick";
if ($yetki == "mod")
$gnick = "$gnick";
if ($yetki == "gammaz")
$gnick = "$gnick";

$sorgu1 = "SELECT nick FROM online WHERE `nick` = '$gnick'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);$sorguip = mysql_query("UPDATE user SET regip='$ip' WHERE nick='$verified_user'");
$kayit2=mysql_fetch_array($sorgu2);
$onnick=$kayit2["nick"];
if (!$onnick) {
$sorgu = "INSERT INTO online ";
$sorgu .= "(nick,islem_zamani,ip,ondurum)";
$sorgu .= " VALUES ";
$sorgu .= "('$gnick','$islem_zamani','$ip','$durum')";
mysql_query($sorgu);$sorguip = mysql_query("UPDATE user SET regip='$ip' WHERE nick='$verified_user'");
}
else {
$simdikizaman = time();
$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$verified_user'";
mysql_query($sorgu);$sorguip = mysql_query("UPDATE user SET regip='$ip' WHERE nick='$verified_user'");
}

#session_register("verified_user", "sid", "kat", "verified_kat", "durum", "gsifre");
$_SESSION["verified_user"] = $verified_user;
$_SESSION["sid"] = $sid;
$_SESSION["kat"] = $kat;
$_SESSION["verified_kat"] = $verified_kat;
$_SESSION["durum"] = $durum;
$_SESSION["gsifre"] = $gsifre;

        echo "
        <SCRIPT language=javascript src=\"images/sozluk.js\"></SCRIPT>
        <script language=\"javascript\">goUrl('index.php','_top');</script>
        ";
        }
		else if ($durum == "sus") {
        echo "
        <center><font size=2><img src=images/unlem.gif> Sozluk kurallarina uymadiginiz icin hesabiniz kapatilmistir.</center>
        <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"10;URL=sozluk.php?process=master\">";
        die;
        }
        else if ($durum == "sus") {
        echo "
        <center><font size=2><img src=images/unlem.gif> Sozluk kurallarina uymadiginiz icin hesabiniz kapatilmistir.</center>
        <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"10;URL=sozluk.php?process=master\">";
        die;
        }
        else {
echo "
<font size=2 color=blue> kullanýcý adý veya þifreni hatalý girdin. tekrar dene.
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3;URL=sozluk.php?process=master&login=yescanem\">";

}

}
}
else {
echo "<font size=2 color=blue> kullanýcý adý veya þifreni hatalý girdin. tekrar dene.
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3;URL=sozluk.php?process=master&login=yescanem\">

";

}
ob_end_flush();
?>