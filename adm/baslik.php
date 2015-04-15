<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<?
if ($baslik != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?=$sitename?> Baþlýk</title>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>
</head>

<body>
<table width="700" height="21%" border="1">
  <tr>
    <td width="104" height="33%"><strong>TARÝH</strong></td>
    <td width="456"><strong>BAÞLIK</strong></td>
    <td width="50"><strong>SÝL</strong></td>
  </tr>
<?
$sorgu = "SELECT id,baslik,tarih FROM konucuklar ORDER by `tarih` desc LIMIT 0,50";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$konuid=$kayit["id"];
$baslik=$kayit["baslik"];
$tarih=$kayit["tarih"];

$kesbaslik = substr ($baslik, 0, 75);
$baslik = ereg_replace(" ","+",$baslik);

echo "
  <tr>
    <td height=\"33%\">$tarih</td>
    <td><a href=sozluk.php?process=word&q=$baslik>$kesbaslik</a></td>
    <td><a href=sozluk.php?process=adm&islem=basliksil&id=$konuid title=\"Baslik ID: $konuid\">SIL!</td>
  </tr>
  <tr>
    <td height=\"34%\" colspan=\"3\"><hr></td>
  </tr>
";
}
}
echo "
</table>
</body>
</html>";
?>