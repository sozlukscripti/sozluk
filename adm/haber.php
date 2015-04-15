<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($haber != 1) {
echo "Bu islem için gerekli yetkiye sahip deðilsiniz";
die;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>
</head>

<body>
<a href=sozluk.php?process=adm&islem=haberekle1x><img src=images/new.gif>yeni olan biten</a><br><br>
<table width="804" border="1">
  <tr>
    <td width="106"><strong>TARIH</strong></td>
    <td width="481"><strong>HABER</strong></td>
    <td width="134"><strong>YAZAR</strong></td>
  </tr>
<?
$sorgu = "SELECT id,konu,tarih,yazar FROM haberler ORDER by `tarih` desc";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$haberid=$kayit["id"];
$konu=$kayit["konu"];
$tarih=$kayit["tarih"];
$yazar=$kayit["yazar"];

echo "
  <tr>
    <td>$tarih</td>
    <td>$konu</td>
    <td>$yazar</td>
  </tr>
  <tr>
    <td colspan=\"3\"><a href=sozluk.php?process=adm&islem=habersil&id=$haberid>Sil</a> - <a href=sozluk.php?process=adm&islem=haberduzenle&id=$haberid>Düzenle</a><br>
    <hr></td>
  </tr>
";
}
}
echo "
</table>
</body>
</html>";
?>