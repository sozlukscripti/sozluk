<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?php

//rudy
echo "<strong><i>Güzin Abla Kösesi</i></strong><br><i>Sorular, Sorunlar</i>
<b>
<a href='sozluk.php?process=adm&islem=sikayetsil'>Temizle Sayfayý!</a><hr>";
$query = "SELECT * FROM sikayet";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
echo "
 <font color='black'><b>E-Mail :</b></font>{$row['e']} <br> " .
"<font color='black'><b>Kullanici Adi:</b></font> {$row['k']} <br>" .
"<font color='black'><b>Mesaj: </b></font>{$row['m']} <br><hr>";

} 


?> 
