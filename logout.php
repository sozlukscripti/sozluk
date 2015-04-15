<?
session_start();
include "inc/baglan.php";
baglan();
if ($verified_kat == "admin") {
$gnick = "&$verified_user";
$sorgu = "DELETE FROM online WHERE nick = '$gnick' LIMIT 1";
mysql_query($sorgu);
}
else if ($verified_kat == "mod") {
$gnick = "+$verified_user";
$sorgu = "DELETE FROM online WHERE nick = '$gnick' LIMIT 1";
mysql_query($sorgu);
}
else {
$sorgu = "DELETE FROM online WHERE nick = '$verified_user' LIMIT 1";
mysql_query($sorgu);
}

session_destroy();

?>
<SCRIPT src="images/top.js" type=text/javascript></SCRIPT>
<SCRIPT language=javascript src=\"images/sozluk.js\"></SCRIPT>
<META content="bar ortamlari" name=keywords>
<META content="bar ortamlari" name=description><LINK href="favicon.ico"
rel="shortcut Icon"><LINK href="favicon.ico" rel=icon><LINK
href="images/sozluk.css" type=text/css rel=stylesheet>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-9">
<SCRIPT language=javascript src="images/sozluk.js"></SCRIPT>
<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=sozluk.php?process=word&q=Anka+Sözlük">
<center>bay bay canim<br>
anka sözlük kapansın
<script language="javascript">goUrl('index.php','_top');</script>