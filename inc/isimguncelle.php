<?

$isim=$_POST['isim'];

$isim = ereg_replace("þ","s",$isim);
$isim = ereg_replace("Þ","S",$isim);
$isim = ereg_replace("ç","c",$isim);
$isim = ereg_replace("Ç","C",$isim);
$isim = ereg_replace("ý","i",$isim);
$isim = ereg_replace("Ý","I",$isim);
$isim = ereg_replace("ð","g",$isim);
$isim = ereg_replace("Ð","G",$isim);
$isim = ereg_replace("ö","o",$isim);
$isim = ereg_replace("Ö","O",$isim);
$isim = ereg_replace("ü","u",$isim);
$isim = ereg_replace("Ü","U",$isim);
$isim = ereg_replace("Ö","O",$isim);
$isim = ereg_replace("<",")",$isim);



$sorgu = "UPDATE user SET isim='$isim' WHERE nick='$nick'";
mysql_query($sorgu);
echo "sayýn $nick; <br>en afillisinden ismin deðiþtirildi. süper oldu. ";
exit;
mysql_close();

?>
