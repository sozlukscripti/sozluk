<?php
if ($verified_durum == "off" or $verified_durum == "wait")
die("malesef böyle bir lükse sahip degilsin.<br><br>
<input type=button class='but' onClick='history.go(-1)' value='hih cok lazýmdý sanki'>");


if( strlen($ileti) >30) {
die("iletiniz 30 karakter sýnýrlamasýný aþýyor. bu kabul edilemez <br><br> <input type=button class='but' onClick='history.go(-1)' value='saygý duyarým'>");}

$ileti=$_POST['ileti'];

$ileti = ereg_replace("þ","s",$ileti);
$ileti = ereg_replace("Þ","S",$ileti);
$ileti = ereg_replace("ç","c",$ileti);
$ileti = ereg_replace("Ç","C",$ileti);
$ileti = ereg_replace("ý","i",$ileti);
$ileti = ereg_replace("Ý","I",$ileti);
$ileti = ereg_replace("ð","g",$ileti);
$ileti = ereg_replace("Ð","G",$ileti);
$ileti = ereg_replace("ö","o",$ileti);
$ileti = ereg_replace("Ö","O",$ileti);
$ileti = ereg_replace("ü","u",$ileti);
$ileti = ereg_replace("Ü","U",$ileti);
$ileti = ereg_replace("Ö","O",$ileti);
$ileti = ereg_replace("\,","",$ileti);
$ileti = ereg_replace("  "," ",$ileti);
$ileti = ereg_replace("\?","",$ileti);
$ileti = ereg_replace("\!","",$ileti);
$ileti = ereg_replace("<",")",$ileti);

$ileti= strtolower($ileti);


$sorgu = "UPDATE user SET ileti='$ileti' WHERE nick='$nick'";
mysql_query($sorgu);
echo "sayýn $nick; <br>kiþisel iletini '$ileti' olarak belirledin. Ne Mutlu Sana. <br>
<br>
<input type='button' value='eyvallah' onclick='window.close();' class=but>
";
exit;
mysql_close();
?>
