<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($oluler != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
if ($canlandir) {

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$sorgu = "UPDATE konucuklar SET tarih='$tarih' WHERE id='$canlandir'";
mysql_query($sorgu);
$sorgu = "UPDATE konucuklar SET gun='$gun' WHERE id='$canlandir'";
mysql_query($sorgu);
$sorgu = "UPDATE konucuklar SET ay='$ay' WHERE id='$canlandir'";
mysql_query($sorgu);
$sorgu = "UPDATE konucuklar SET yil='$ay' WHERE id='$canlandir'";
mysql_query($sorgu);

$sorgu = "UPDATE konucuklar SET statu = '' WHERE id='$canlandir'";
mysql_query($sorgu);
$sorgu = "UPDATE konucuklar SET silmod = '' WHERE id='$canlandir'";
mysql_query($sorgu);
$sorgu = "UPDATE konucuklar SET siltarih = '' WHERE id='$canlandir'";
mysql_query($sorgu);
$sorgu = "UPDATE konucuklar SET silsebep = '' WHERE id='$canlandir'";
mysql_query($sorgu);

$sorgu = "UPDATE mesajciklar SET statu = '' WHERE sira = '$canlandir'";
mysql_query($sorgu);

echo "$canlandir canlandýrýldý.
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=adm&islem=olubasliklar\">

";
}
else {



$max = 40;
if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }
$alt = ($_GET["sayfa"] - 1)  * $max;

$sor = mysql_query("SELECT id FROM konucuklar WHERE statu = 'silindi' ORDER BY `tarih`");
$w = mysql_num_rows($sor);

$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
echo "<center><p class=eol><font face=Verdana size=1>
<b>Toplam $w/$max adet baþlýk listeleniyor</b><br>
Sayfalar:
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
echo "<a class=link href=?process=adm&islem=olubasliklar&sayfa=$linksayfa><font face=verdana size=1><<</font></a>";
}
}

}

echo "
<SELECT class=ksel onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {

if ($sayfa == $i) {
echo " <OPTION value=sozluk.php?process=adm&islem=olubasliklar&sayfa=$i selected>$i</OPTION>";
} // if
else {
echo "<OPTION value=sozluk.php?process=adm&islem=olubasliklar&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT>";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster) {
echo "<a class=link href=?process=adm&islem=olubasliklar&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}


}






echo "
<table width=\"685\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\" bordercolor=\"#669999\">
  <tr>
    <td width=\"112\"><div align=\"center\"><strong>ISLEM</strong></div></td>
    <td width=\"269\"><div align=\"center\"><strong>BASLIK</strong></div></td>
    <td width=\"200\"><div align=\"center\"><strong>SEBEP</strong></div></td>
    <td width=\"192\"><div align=\"center\"><strong>MOD/ADMIN</strong></div></td>
  </tr>

  ";
$sorgu = "SELECT id,silsebep,siltarih,silmod,tarih,gun,ay,yil,baslik FROM konucuklar WHERE statu = 'silindi' ORDER BY `tarih` desc limit $alt,$max";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
$siltarih=$kayit["siltarih"];
$silmod=$kayit["silmod"];
$silsebep=$kayit["silsebep"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$baslik=$kayit["baslik"];

$link = ereg_replace(" ","+",$baslik);

echo "  <tr>
    <td><div align=\"center\">(<a href=sozluk.php?process=adm&islem=olubasliklar&canlandir=$id>Canlandir</a>)</div></td>
    <td><a title=\"$siltarih\" href=\"sozluk.php?process=word&q=$link\" target=_blank>$baslik</td>
    <td><div>$silsebep</div></td>
    <td><div align=\"center\"><a title=\"$silsebep\" href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$silmod&gkonu=[MOD] patlattiginiz $baslik basligi hakkinda\">$silmod</div></td>
  </tr>
";
}
}
echo "</table>";
}

?>