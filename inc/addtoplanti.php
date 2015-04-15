<?php

if ($zirve == "" || $detay == "" || $tarih == "" || $yer == "" || $tavsiye == "") {
die("<i><b>höyt:</b> heryeri doldur caným</i>
<br><br><input type=button class='but' onClick='history.go(-1)' value='kusura bakma'>"); }

$zirve=mysql_real_escape_string($_POST["zirve"]);
$tarih=htmlspecialchars(strip_tags($_POST["tarih"]));
$yer=htmlspecialchars(strip_tags($_POST["yer"]));
$detay=htmlspecialchars(strip_tags($_POST["detay"]));
$tavsiye=htmlspecialchars(strip_tags($_POST["tavsiye"]));
$sehir=htmlspecialchars(strip_tags($_POST["sehir"]));

if (strlen($zirve)>80) { die("<i><b>bi þey oldu:<b>toplanti adý 80 karakterden fazla olamaz</i>"); }
if (strlen($tarih)>11) { die("<i><b>bi þey oldu:<b>tarih bölümü 9 karakterden fazla olamaz</i>"); }
if (strlen($yer)>50) { die("<i><b>bi þey oldu:<b>mekan adý 50 karakterden fazla olamaz</i>"); }
if (strlen($detay)>200) { die("<i><b>bi þey oldu:<b>detay bölümü 200 karakterden fazla olamaz</i>"); }

$zirve = ereg_replace(">","<br>",$zirve);
$zirve = ereg_replace("ç","c",$zirve);
$zirve = ereg_replace("ð","g",$zirve);
$zirve = ereg_replace("ý","i",$zirve);
$zirve = ereg_replace("ö","o",$zirve);
$zirve = ereg_replace("ü","u",$zirve);

$detay = ereg_replace(">",")",$detay);
$detay = ereg_replace("\n","<br>",$detay);
$detay = ereg_replace("ç","c",$detay);
$detay = ereg_replace("ð","g",$detay);
$detay = ereg_replace("ý","i",$detay);
$detay = ereg_replace("ö","o",$detay);
$detay = ereg_replace("ü","u",$detay);

$tavsiye = ereg_replace(">",")",$tavsiye);
$tavsiye = ereg_replace("\n","<br>",$tavsiye);
$tavsiye = ereg_replace("ç","c",$tavsiye);
$tavsiye = ereg_replace("ð","g",$tavsiye);
$tavsiye = ereg_replace("ý","i",$tavsiye);
$tavsiye = ereg_replace("ö","o",$tavsiye);
$tavsiye = ereg_replace("ü","u",$tavsiye);

$yer = ereg_replace(">","<br>",$yer);
$yer = ereg_replace("ç","c",$yer);
$yer = ereg_replace("ð","g",$yer);
$yer = ereg_replace("ý","i",$yer);
$yer = ereg_replace("ö","o",$yer);
$yer = ereg_replace("ü","u",$yer);

$zirve=strtolower($zirve);
$detay=strtolower($detay);
$yer=strtolower($yer);
$tavsiye=strtolower($tavsiye);

$detay=mysql_real_escape_string($detay);


$btarih = date("Y-m-d/H:i");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("G:i");

$sor = " INSERT INTO zirvemax ";
$sor .= "(tavsiye,detay,zirve,sehir,organizator,yer,tarih,gun,ay,yil,saat)";
$sor .= " VALUES ";
$sor .= "('$tavsiye','$detay','$zirve','$sehir','$verified_user','$yer','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sor);

if ($sor) 
{ echo "$zirve eklendi<br>toplantý sayfasýna gitmek için <a href='sozluk.php?process=toplantigoster'>týklayýn</a>"; } 
else {
echo "<i><b>bi þey oldu galiba:<b>kayýt veritabanýna eklenemedi. lütfen daha sonra tekrar deneyiniz. in english press <b>9</b>.</i><input type=button class='but' onClick='history.go(-1)' value='9'>";}

$konu = " $zirve eklendi ";
$system = "Toplantý Habercisi";
$yazi = "$organizator tarafýndan $zirve eklendi";
$yazar= "SYSTEM"; //buraya istediðin nicki yaz
$starih = date("YmdHi");


$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$yazar','$konu','$yazi','$system','$starih','2','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
?>