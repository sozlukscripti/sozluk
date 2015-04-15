<?
//zirveditle
$detay=htmlspecialchars($_POST['detay']);


/*$detay = ereg_replace("þ","s",$detay);
$detay = ereg_replace("Þ","S",$detay);
$detay = ereg_replace("ç","c",$detay);
$detay = ereg_replace("Ç","C",$detay);
$detay = ereg_replace("ý","i",$detay);
$detay = ereg_replace("Ý","I",$detay);
$detay = ereg_replace("ð","g",$detay);
$detay = ereg_replace("Ð","G",$detay);
$detay = ereg_replace("ö","o",$detay);
$detay = ereg_replace("Ö","O",$detay);
$detay = ereg_replace("ü","u",$detay);
$detay = ereg_replace("Ü","U",$detay);
$detay = ereg_replace("Ö","O",$detay);*/
$detay = ereg_replace("\,","",$detay);
$detay = ereg_replace("  "," ",$detay);
$detay = ereg_replace("\?","",$detay);
$detay = ereg_replace("\!","",$detay);

$detay= strtolower($ileti);

$sorgu = "UPDATE zirvebox SET detay='$detay' WHERE id='$id'";
mysql_query($sorgu);

if ($sorgu) { echo " süper bir þekilde düzenledim"; } else { echo "düzenleyemedim moruk bir hata oldu"; }

?>



