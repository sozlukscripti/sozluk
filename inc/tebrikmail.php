<?
include "config.php";
if ($verified_user)
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"86000;URL=sozluk.php?process=tebrikmail\">";
//Dogum Günü Tebrik Maili {rudy}
$konu="Doðum Gününüz Kutlu Olsun";
$mesaj="Deðerli yazarýmýz \n doðum gününü unuttuk mu sandýn? Doðum gününü en içten dileklerimizle kutlariz.\n Hayatin tum guzellikleri sizinle olsun \n  $sitename \n  $site";
$ek="From: $sitename  <$sitemail>\n";
$day=date("d");
$month=date("n");
$today="$day/$month";
$dtsorgu = mysql_query("SELECT * FROM user WHERE dt like '$today%'");
$dttarihtoplam = mysql_num_rows($dtsorgu);
while($goster = mysql_fetch_assoc($dtsorgu)) {	
mail($goster['email'], $konu, $mesaj,$ek) ;
}
?>