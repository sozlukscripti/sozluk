<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<?

if (!$verified_user)
die;

if (!$okmsj) {
echo "Kurcuklama lan!";
exit;
}
else {
// degiskenleri ata
}
$baslik = strtolower($baslik);
$sorgu = "INSERT INTO ukte ";
$sorgu .= "(baslik,veren)";
$sorgu .= " VALUES ";
$sorgu .= "('$baslik','$veren')";
mysql_query($sorgu);

if ($git=="sorgu") {
	if (mysql_query($sorgu)) {
		echo "ukte basariyla kaydedildi";
	}
}

// id yi almak icin dbye baglan
$sorgu = "SELECT id FROM konular WHERE `baslik`='$baslik'";
$sorgulama = mysql_query($sorgu);


