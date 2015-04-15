<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz") {
die;
}
?>

<?
if ($stat != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}

$sorgu = "TRUNCATE TABLE `eniyiler`";
mysql_query($sorgu);

$sorgu = "SELECT entry_id,entry_sahibi,oy FROM oylar ORDER by oy desc";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$entry_id=$kayit["entry_id"];
$entry_sahibi=$kayit["entry_sahibi"];
$oy=$kayit["oy"];

$sorgu = "SELECT id,sira FROM mesajciklar WHERE id = '$entry_id'";
$sorgulama = mysql_query($sorgu);
$kayit=mysql_fetch_array($sorgulama);
$sira=$kayit["sira"];

$sorgu = "SELECT id,baslik FROM konucuklar WHERE id = '$sira'";
$sorgulama = mysql_query($sorgu);
$kayit=mysql_fetch_array($sorgulama);
$baslik=$kayit["baslik"];

}
}



$sor = mysql_query("select tema from user where tema = ''");
$temasay = mysql_num_rows($sor);

$sor = mysql_query("select tema from user where tema = 'default'");
$temasay2 = mysql_num_rows($sor);

$temasay = $temasay + $temasay2;

$sorgu = "UPDATE stat SET temadefault = '$temasay'";
mysql_query($sorgu);

$sor = mysql_query("select tema from user where tema = 'mavi'");
$temasay = mysql_num_rows($sor);
$sorgu = "UPDATE stat SET temamavi = '$temasay'";
mysql_query($sorgu);

$sor = mysql_query("select tema from user where tema = 'portakal'");
$temasay = mysql_num_rows($sor);
$sorgu = "UPDATE stat SET temaportakal = '$temasay'";
mysql_query($sorgu);

$sor = mysql_query("select tema from user where tema = 'yesil'");
$temasay = mysql_num_rows($sor);
$sorgu = "UPDATE stat SET temayesil = '$temasay'";
mysql_query($sorgu);


$sor = mysql_query("select tema from user where tema = 'zeppelin'");
$temasay = mysql_num_rows($sor);
$sorgu = "UPDATE stat SET temazeppelin = '$temasay'";
mysql_query($sorgu);

$sor = mysql_query("select tema from user where tema = 'diablo'");
$temasay = mysql_num_rows($sor);
$sorgu = "UPDATE stat SET temadiablo = '$temasay'";
mysql_query($sorgu);

$sor = mysql_query("select tema from user where tema = 'ekolayzir'");
$temasay = mysql_num_rows($sor);
$sorgu = "UPDATE stat SET temaekolayzir = '$temasay'";
mysql_query($sorgu);







$sorgu = "SELECT id FROM konucuklar ORDER by id desc";
$sorgulama = mysql_query($sorgu);
$kayit=mysql_fetch_array($sorgulama);
$baslik=$kayit["id"];

$sor = mysql_query("select id from konucuklar where statu = 'silindi'");
$silbaslik = mysql_num_rows($sor);

$sorgu = "SELECT id FROM mesajciklar ORDER by id desc";
$sorgulama = mysql_query($sorgu);
$kayit=mysql_fetch_array($sorgulama);
$entry=$kayit["id"];


$sor = mysql_query("select id from mesajciklar where statu = 'silindi'");
$silentry = mysql_num_rows($sor);


$t = 0;
$sorgu = "SELECT hit,id,baslik FROM konucuklar WHERE statu = ''";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$hit=$kayit["hit"];
$gbaslik=$kayit["baslik"];
$id=$kayit["id"];
if ($hit > $tophit and $gbaslik != "sozluk yazim kurallari" and $gbaslik != "sozluk hakkinda en cok sorulan sorular" and $gbaslik != "yalowa" and $gbaslik != "eksi sozluk") {
$tophit = $hit;
$enhit = $id;
}
}
}
$sorgu = "SELECT hit,id,baslik FROM konucuklar WHERE id = $enhit";
$sorgulama = mysql_query($sorgu);
$kayit=mysql_fetch_array($sorgulama);
$enhitbaslik=$kayit["baslik"];


$listele = mysql_query("SELECT hit FROM konucuklar");
while ($kayit=mysql_fetch_array($listele)) {
$hit=$kayit["hit"];
$totalhit = $totalhit + $hit;
}
$hits = $totalhit;

$listele = mysql_query("SELECT hit FROM ayar");
$kayit=mysql_fetch_array($listele);
$tekil=$kayit["hit"];

$sor3 = mysql_query("select id from user WHERE durum = 'on'");
$yazar = mysql_num_rows($sor3);

$sor3 = mysql_query("select id from user WHERE durum = 'off'");
$okur = mysql_num_rows($sor3);

$sor3 = mysql_query("select id from user WHERE yetki = 'mod'");
$mod = mysql_num_rows($sor3);

$sor3 = mysql_query("select id from user WHERE durum = 'sus'");
$pilot = mysql_num_rows($sor3);

$sor3 = mysql_query("select id from user WHERE yetki = 'admin'");
$admin = mysql_num_rows($sor3);

$ortbaslik = $baslik / $yazar;
$ortentry = $entry / $yazar;

$ortbaslik = ceil($ortbaslik);
$ortentry = ceil($ortentry);

$sorgu = "UPDATE stat SET baslik = '$baslik'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET entry = '$entry'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET silbaslik = '$silbaslik'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET silentry = $silentry";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET hit = '$hits'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET tekil = '$tekil'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET yazar = '$yazar'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET okur = '$okur'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET moderat = '$mod'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET op = '$op'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET pilot = '$pilot'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET admin = '$admin'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET ortbaslik = '$ortbaslik'";
mysql_query($sorgu);


$sorgu = "UPDATE stat SET ortentry = '$ortentry'";
mysql_query($sorgu);

$sorgu = "UPDATE stat SET enhitbaslik = '$enhitbaslik'";
mysql_query($sorgu);

$tarih = date("d.m.Y - H:i");

$sorgu = "UPDATE stat SET tarih = '$tarih'";
mysql_query($sorgu);




$listele = mysql_query("SELECT entry_id, SUM(oy) as toplam FROM oylar GROUP BY entry_id ORDER BY toplam DESC LIMIT 0,10");
while ($kayit=mysql_fetch_array($listele)) {
$entry_id=$kayit["entry_id"];
$sayi++;
$sorgu = "UPDATE stat SET eniyientry$sayi = '$entry_id'";
mysql_query($sorgu);

}


echo "<p class='payar'><center><b>istatistikler güncellendi</b><br />Son güncelleme: ($tarih)</center></p>";
//burasi modlog icin
if ($verified_kat == "admin" or $verified_kat == "mod");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$tarih = "$gun/$ay/$yil";
$sorgu = "INSERT INTO history ";
$sorgu .= "(olay,mesaj,moderat,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('guncelleme','istatistikler güncellendi','$verified_user','$tarih','$gun','$ay' ,'$yil','$saat')";
mysql_query($sorgu);
//modlog bitt

?>
