<?

//ayýkla

if ($ilanbilgi=="") {
die("boþ alan býrakmamak iktiza etmekte<br><br>
<input type=button class='but' onClick='history.go(-1)' value='o zaman geri döneyim'>"); } 

//post et html ayýkla

$ilanbilgi= $_POST['ilanbilgi'];

//turkce karakter çözüm
$ilanbilgi = ereg_replace("&lt","(",$ilanbilgi);
$ilanbilgi = ereg_replace("&gt",")",$ilanbilgi);
$ilanbilgi = ereg_replace("<","(",$ilanbilgi);
$ilanbilgi = ereg_replace(">",")",$ilanbilgi);
$ilanbilgi = ereg_replace("\n","<br>",$ilanbilgi);
$ilanbilgi = ereg_replace("þ","s",$ilanbilgi);
$ilanbilgi = ereg_replace("Þ","S",$ilanbilgi);
$ilanbilgi = ereg_replace("ç","c",$ilanbilgi);
$ilanbilgi = ereg_replace("Ç","C",$ilanbilgi);
$ilanbilgi = ereg_replace("ý","i",$ilanbilgi);
$ilanbilgi = ereg_replace("Ý","I",$ilanbilgi);
$ilanbilgi = ereg_replace("ð","g",$ilanbilgi);
$ilanbilgi = ereg_replace("Ð","G",$ilanbilgi);
$ilanbilgi = ereg_replace("ö","o",$ilanbilgi);
$ilanbilgi = ereg_replace("Ö","O",$ilanbilgi);
$ilanbilgi = ereg_replace("ü","u",$ilanbilgi);
$ilanbilgi = ereg_replace("Ü","U",$ilanbilgi);
$ilanbilgi = ereg_replace("Ö","O",$ilanbilgi);
//büyük harf önlem
$ilanbilgi=strtolower($ilanbilgi);

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$sorgu = "INSERT INTO ilansayfasi ";
$sorgu .= "(ilanbaslik,ip,tarih,gun,ay,yil,saat,nick,ilanbilgi)";
$sorgu .= " VALUES ";
$sorgu .= "('$ilanbaslik','$ip','$tarih','$gun','$ay','$yil','$saat','$verified_user','$ilanbilgi')";
mysql_query($sorgu);

if($sorgu) { 

header("Location: sozluk.php?process=ilan"); }

else {
header("Location: sozluk.php?process=ilanx");
}


?>