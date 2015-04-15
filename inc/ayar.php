<?

// bu gece bir götlük var


$sorgu = "SELECT nick,sehir FROM user WHERE `nick`='$verified_user'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
// kayýtlari ver ibne
while ($kayit=mysql_fetch_array($sorgulama)){

$nick=$kayit["nick"];
$sehir=$kayit["sehir"];
}
}

echo "sayin $nick<br> yasadiginiz sehir: $sehir";


$rudy= "UPDATE user SET sehir='$sehir' WHERE nick='$nick'";
mysql_query($rudy);



?>




