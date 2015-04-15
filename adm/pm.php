<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
 if ($_SESSION[verified_kat]!="admin") {
   die();
 }
 if ($mesaj="") die("doldur");
 $mesaj=strip_tags($_POST[mesaj]);
 $uyeler=mysql_query("select nick from user where durum='on'");
 $gonderen="$sitename Haberci";
 while($row=mysql_fetch_array($uyeler)) {
  $kime=$row['nick'];
$konu="duyuru (toplu pm)";
$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(gonderen,kime,mesaj,konu,okundu)";
$sorgu .= " VALUES ";
$sorgu .= "('$gonderen','$kime','$mesaj','$konu','2')";
mysql_query($sorgu);
}
if ($sorgu) {
	echo "herkese pm gönderildi.";
}
else { echo "sorun! vaar bi terslik ama hayýrlýsý";

 }

?>