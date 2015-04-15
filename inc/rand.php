<HTML><HEAD><TITLE>iletişim</TITLE>
<META http-equiv=Content-Type content="text/html; charset=windows-1254"><LINK href="css/default/default.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
</HEAD>
<BODY>
<?

$sor = mysql_query("select id from konucuklar where statu = ''");
$w = mysql_num_rows($sor);

mt_srand ((double)microtime()*1000000);
$maxran = $w;
$sayi = mt_rand(1, $maxran);
if (!$sayi)
echo "var bisiler var";

$sorgu = "select * from konucuklar WHERE id = $sayi and statu = ''";
$sorgulama = mysql_query($sorgu);
include "config.php"; 
if (mysql_num_rows($sorgulama)>0){
//kayıtları listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$baslik=$kayit["baslik"];
$link = ereg_replace(" ","+",$baslik);
header ("Location: sozluk.php?process=word&q=$link");
}
}
else {
header ("Location: sozluk.php?process=word&q=$link");
}
?>
</BODY></HTML>