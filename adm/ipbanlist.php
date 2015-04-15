<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($ipban != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
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
<a href=sozluk.php?process=adm&islem=ipban><img src=images/new.gif>Yeni Ip Ekle</a><br><br>
<?
$sorgu = "SELECT id,ip FROM ipban";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$ip=$kayit["ip"];
$id=$kayit["id"];
$saydir++;
echo "
$saydir-) $ip (<a href=sozluk.php?process=adm&islem=ipbansil&id=$id>Sil</a>)<br>
";
}
}
echo "
</body>
</html>";
?>