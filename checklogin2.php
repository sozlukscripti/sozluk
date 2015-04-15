<?
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

if ($nick == "$gnick" and $sifre == "$gsifre") {
$verified_user = $gnick;
$verified_kat = $yetki;
$sid = $PHPSESSID;
$ip = getenv('REMOTE_ADDR');
$islem_zamani = time();

if ($yetki == "admin")
$gnick = "$gnick";
if ($yetki == "mod")
$gnick = "$gnick";
if ($yetki == "gammaz")
$gnick = "$gnick";

$sorgu1 = "SELECT nick FROM online WHERE `nick` = '$gnick'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$onnick=$kayit2["nick"];
if (!$onnick) {
$sorgu = "INSERT INTO online ";
$sorgu .= "(nick,islem_zamani,ip,ondurum)";
$sorgu .= " VALUES ";
$sorgu .= "('$gnick','$islem_zamani','$ip','$durum')";
mysql_query($sorgu);
}
else {
$simdikizaman = time();
$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$verified_user'";
mysql_query($sorgu);
}

session_register("verified_user", "sid", "kat", "verified_kat", "durum");
        echo "
        <SCRIPT language=javascript src=\"images/sozluk.js\"></SCRIPT>
        <script language=\"javascript\">goUrl('index.php','_top');</script>
        ";
        }
         if ($durum == "sus") {
        echo "
        <center><font size=2 color=red><img src=images/unlem.gif> senin bu hesabýn var ya. silinmiþ o.</center>
        <META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3;URL=sozluk.php?process=master\">";
        die;
        }
        else {
echo "
<font size=2> <a href=\"http://ankasozluk.com/index.php\"><u>anka s&ouml;zl&uuml;k a&ccedil;ýlsýn</u></a>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3;URL=sozluk.php?process=master&login=yescanem\">";
}

}
}
else {
echo "<center><font size=2><img src=images/unlem.gif> Yanliþ kullanici adý ya da þifre</center>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3;URL=sozluk.php?process=master&login=yescanem\">
";
}
?>