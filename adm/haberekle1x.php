<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($haber != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
if ($ok) {

$konu=($_POST["konu"]);
$aciklama = addslashes($_POST["aciklama"]);
$aciklama = ereg_replace("\n","<br>",$aciklama);


$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("G:i");

$sorgu = "INSERT INTO haberler ";
$sorgu .= "(konu,aciklama,yazar,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$konu','$aciklama','$verified_user','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
if ($sorgu){
echo "bi saniye..
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=adm&islem=olanbitenisik\">";
}else {echo "$konu hakkýnda haber eklenemedi!";}
}else {


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
<form METHOD=post action>
<table width="600" border="0">
  <tr>
    <td width="116">Konu</td>
    <td width="8">:</td>
    <td width="341"><input name="konu" size=60 type="text" id="konu"></td>
  </tr>
  <tr>
   <td>Açýklama:</td>
   <td>:</td>
   <td><textarea cols="50" rows="6" name="aciklama"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <input TYPE=hidden name=ok value=ok>
    <td><input type="submit" name="Submit" value="Ekle"></td>
  </tr>
</table>
</form>
</body>
</html>
<? } ?>