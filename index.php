<?
ob_start();
ini_set("session.save_handler", "files");
session_start();
$verified_user = $_SESSION['verified_user'];
$verified_kat = $_SESSION['verified_kat'];
$kat = $_SESSION['kat'];
include "inc/baglan.php";
include "config.php";
if ($verified_user) {
$sorgu1 = "SELECT * FROM user WHERE `nick` = '$verified_user'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$tema=$kayit2["tema"];
}
else {
$tema = "sozluk";
}

?>


<?

$site_ad=$sitename;

echo "
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Frameset//TR\" \"http://www.w3c.org/TR/1999/REC-html401-19991224/frameset.dtd\">
<META http-equiv=Content-Type content=\"text/html; charset=iso-8859-9\">
<META content=\"MSHTML 6.00.2800.1106\" name=GENERATOR>
<SCRIPT language=javascript src=\"sozluk.js\"></SCRIPT>
<LINK href=\"images/$tema.css\" type=text/css rel=stylesheet>
<LINK href=\"favicon.ico\"
rel=\"shortcut Icon\"><LINK href=\"favicon.ico\" rel=icon>";
?>

<meta name="keywords" content="<? echo "$site_ad, $site_ad nedir, $site_ad hakk�nda bilgiler, $site_ad oku, $site_ad bilgi, $site_ad anlam� nedir, $site_ad anlami, $site_ad ne demek, $site_ad ne oluyor - $sitename"; ?>">
<meta name="description" content="<? echo "$site_ad, $site_ad anlam�, $site_ad tan�m� ve $site_ad hakk�nda ayr�nt�l� bilgiler. - $sitename"; ?>">
<title><? echo "$site_ad - $description"; ?></title></head>

<?echo "
</HEAD>
<FRAMESET border=0 frameSpacing=0 rows=50,* frameborder=0 cols=*>
<FRAME name=top src=\"sozluk.php?process=top\" noResize scrolling=no>
<FRAMESET border=0 frameSpacing=0 frameborder=0 cols=250,*>
";

if (!$process)
echo "<FRAME name=left src=\"sozluk.php?process=today\" noresize=noresize>";
else
echo "<FRAME name=left src=\"sozluk.php\" noresize=noresize>";


if (!$process)
echo "<FRAME name=main src=\"sozluk.php?process=master\" noresize=noresize>";
else if ($process == "regreg")
echo "<FRAME name=main src=\"sozluk.php?process=regreg\" noresize=noresize>";


echo "
</FRAMESET>
</html>
";
ob_end_flush();
mysql_close();
?>

