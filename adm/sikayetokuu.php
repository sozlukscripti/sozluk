<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?php
if ($sikayetokuu != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}

//rudy
echo "<strong><i>Gelen Sikayetler</i></strong><br><b> $sitename </b><br> <br><a href='sozluk.php?process=adm&islem=sikayetsill'>Temizle Sayfayi!</a><hr>";
$query = "SELECT * FROM sikayet";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
echo "
E-Mail :{$row['e']} <br> " .
"Kullanici Adi: {$row['k']} <br>" .
"Mesaj: : <b>{$row['m']} </b><br><hr>";

} 



?> 