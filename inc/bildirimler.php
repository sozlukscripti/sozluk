<?php
session_start();


include("ayarsiz.php");

$verified_user = $_SESSION['verified_user'];
$verified_kat = $_SESSION['verified_kat'];
$verified_durum = $_SESSION['durum'];
$gsifre = $_SESSION['kat'];

if (!($verified_user == "")) {




$sorgu1 = "SELECT * FROM user WHERE nick = '$verified_user'";

$sorgu2 = mysql_query($sorgu1);

$kayit2=mysql_fetch_array($sorgu2);

$tema=$kayit2["tema"];
$silikmi=$kayit2["durum"];

if (!$tema) {

$tema = "default"; }

if ($silikmi == "sus") {
header("Location:logout.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<base href="http://www.daginiksozluk.com" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" >
<meta http-equiv="Content-Language" content="tr" >
<title>bir derdim var</title>
<LINK href="css/sozluk.css" type="text/css" rel="stylesheet">
<LINK href="css/<?php echo $tema ?>.css" type="text/css" rel="stylesheet">
<style type="text/css">

</style>
</head>
<body>
<a href="inc/bildirimler.php"><span style="font-size:18px;">bildirimler</span></a>
<br/><br/><br/>
<table border=1>
<tr><td style="width:600px;"><b>bildirim</b></td><td><b>tarih</b></td></tr>
<?php
$bildirim = mysql_query("SELECT * FROM bildirim WHERE nick='$verified_user' ORDER BY id DESC LIMIT 100");

while($bildirimf = mysql_fetch_array($bildirim)) {
?>
<tr>
<td>
<?php
if ($bildirimf["okundu"] == "0") {
echo "".$bildirimf["bildirim"]." <b>(yeni)</b>";
}
else {
echo $bildirimf["bildirim"];
}
?>
</td>
<td>
<?php
echo date("d.m.Y H:i" ,$bildirimf["tarih"]);
?>
</td>
</tr>
<?php
}
?>

</table>


<br/><br/>


</body>
</html>

<?php
mysql_query("UPDATE bildirim SET okundu='1'  WHERE nick = '$verified_user' and okundu = '0'");


}
else {
echo "yetkiniz yok";
}
?>