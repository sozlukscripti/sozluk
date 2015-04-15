
<?

//coded by tonymontana


$kullanici = htmlspecialchars(trim($_POST['kullanici']));

$msj = htmlspecialchars(trim($_POST['msj']));

//db ye yaziyoruz...

$sorgu = "INSERT into gunluk";
$sorgu.= "(kullanici,msj)";
$sorgu.= "VALUES";
$sorgu.= "('$kullanici','$msj')";
mysql_query ($sorgu); 

if ($sorgu) {
	
	echo "Bu kalbin kadar temiz sayfayi doldurdun. Tebrikler";
}

else {
	include "config.php";
	echo "ziki tuttu ellam. eger senden kaynaklandýðýný düþünüyorsan çaktirmadan kapat bu sayfayý, yok ben bi sey yapmadým diyorsan $sitename e duygu sömürüsü dolu pm at.";
}

?>
