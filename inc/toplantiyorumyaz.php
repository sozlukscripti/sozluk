
<?

$sorg=mysql_query("SELECT zirve,id from zirvemax where id= '$id'");

$comment=$_POST['comment'];

$comment = ereg_replace("%u0131","ý",$comment);
$comment = ereg_replace("%u0130","Ý",$comment);
$comment = ereg_replace("%u011F","ð",$comment);
$comment = ereg_replace("%u011E","Ð",$comment);
$comment = ereg_replace("%u015F","þ",$comment);
$comment = ereg_replace("%u015E","Þ",$comment);
/*
$comment = ereg_replace("&#305;","ý",$comment);
$comment= ereg_replace("&#287;","ç",$comment);
$comment = ereg_replace("Þ","þ",$comment);
$comment = ereg_replace("Ç","ç",$comment);
$comment = ereg_replace("Ý","i",$comment);
$comment = ereg_replace("Ð","ð",$comment);
$comment = ereg_replace("Ö","ö",$comment);
$comment = ereg_replace("Ü","ü",$comment);
$comment = ereg_replace("Ö","O",$comment);
$comment = ereg_replace("ç","c",$comment);
$comment = ereg_replace("Ç","C",$comment);
$comment = ereg_replace("ý","i",$comment);
$comment = ereg_replace("ü","u",$comment);
$comment = ereg_replace("Ü","U",$comment);
$comment = ereg_replace("ð","g",$comment);
$comment = strtolower($comment);
*/
$sorgu= "SELECT zirve,id from zirvemax where id = '$id'";
$sorguyap= @mysql_query ($sorgu);
if(mysql_num_rows($sorguyap)>0) {

	
	while ($do=@mysql_fetch_array($sorguyap)) {
	
$zirve=$do['zirve'];
$list=$do['id'];

}
}

$btarih = date("Y-m-d/H:i");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("G:i");

$sor = " INSERT INTO zirvecom ";
$sor .= "(yazan,comment,list,tarih,gun,ay,yil,saat)";
$sor .= " VALUES ";
$sor .= "('$verified_user','$comment','$list','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sor);
echo "yorumunuz eklendi";



?>
