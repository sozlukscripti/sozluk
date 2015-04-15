<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
//rudy
echo "<strong><i>Yazarlarýn Günlüðü</i></strong><br><br><a href='sozluk.php?process=adm&islem=gunlukdbsil'>Temizle Sayfayi!</a><hr>";
$query = "SELECT * FROM gunluk";
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
echo "
Kullanici :{$row['kullanici']} <br> " .
"Mesaj: : <b>{$row['msj']} </b><br><hr>";

} 



?>