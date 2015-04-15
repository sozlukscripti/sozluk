<?

//burada zirveci bilgileri kaydedilecek

$muzik=$_POST['muzik'];
$film=$_POST['film'];
$ruh=$_POST['ruh'];
$mekan=$_POST['mekan'];
$tanim=$_POST['tanim'];


##film
$film = ereg_replace("Ş","ş",$film);
$film = ereg_replace("Ç","ç",$film);
$film = ereg_replace("İ","i",$film);
$film = ereg_replace("Ğ","ğ",$film);
$film = ereg_replace("Ö","ö",$film);
$film = ereg_replace("Ü","ü",$film);
$film = ereg_replace("Ö","O",$film);
$film = ereg_replace("ç","c",$film);
$film = ereg_replace("Ç","C",$film);
$film = ereg_replace("ı","i",$film);
$film = ereg_replace("ü","u",$film);
$film = ereg_replace("Ü","U",$film);
$film = ereg_replace("ğ","g",$film);
$film = strtolower($film);
##mekan
$mekan = ereg_replace("Ş","ş",$mekan);
$mekan= ereg_replace("Ç","ç",$mekan);
$mekan = ereg_replace("İ","i",$mekan);
$mekan = ereg_replace("Ğ","ğ",$mekan);
$mekan = ereg_replace("Ö","ö",$mekan);
$mekan = ereg_replace("Ü","ü",$mekan);
$mekan = ereg_replace("Ö","O",$mekan);
$mekan = ereg_replace("ç","c",$mekan);
$mekan = ereg_replace("Ç","C",$mekan);
$mekan = ereg_replace("ı","i",$mekan);
$mekan = ereg_replace("ü","u",$mekan);
$mekan = ereg_replace("Ü","U",$mekan);
$mekan = ereg_replace("ğ","g",$mekan);
$mekan = strtolower($mekan);
##tanim
$tanim = ereg_replace("Ş","ş",$tanim);
$tanim = ereg_replace("Ç","ç",$tanim);
$tanim = ereg_replace("İ","i",$tanim);
$tanim = ereg_replace("Ğ","ğ",$tanim);
$tanim = ereg_replace("Ö","ö",$tanim);
$tanim = ereg_replace("Ü","ü",$tanim);
$tanim = ereg_replace("Ö","O",$tanim);
$tanim = ereg_replace("ç","c",$tanim);
$tanim = ereg_replace("Ç","C",$tanim);
$tanim = ereg_replace("ı","i",$tanim);
$tanim = ereg_replace("ü","u",$tanim);
$tanim = ereg_replace("Ü","U",$tanim);
$tanim = ereg_replace("ğ","g",$tanim);
$tanim = strtolower($tanim);

$film = ereg_replace("<","(",$film);
$mekan = ereg_replace(">",")",$mekan);
$tanim = ereg_replace(">",")",$tanim);
$tanim = ereg_replace("\n","<br>",$tanim);

if (strlen($tanim)>200) { die ("egoist misin sen? 200 harf kullanarak anlat kendini.");}
if (strlen($film)>100) { die ("filmi anlatma ismini yaz. bu uzunlukta film adı mı olur lan?");}
if (strlen($tanim)>100) { die ("mekanın adresini sormadik, adini sorduk. bu uzunlukta mekan adı mı olur? birisi sorunca ne diyorsan onu yaz...");}

$sorgu = "INSERT INTO zirveuser ";
$sorgu .= "(zuser,muzik,film,ruh,mekan,tanim)";
$sorgu .= " VALUES ";
$sorgu .= "('$verified_user','$muzik','$film','$ruh','$mekan','$tanim')";
mysql_query($sorgu);

if ($sorgu) {
	echo "toplantıcı kaydın yapıldı. sosyalleşme yanlısı insan seni.";
}
else {
	echo "Anam! bir sey oldu ben de anlamadım. mediterranean e haber ver en iyisi...";
}

?>