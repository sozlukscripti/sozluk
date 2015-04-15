<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check("gecenay".$_GET[sayfa]); 
?>

<STYLE TYPE="text/css">
BODY
{
scrollbar-base-color: orange;
scrollbar-arrow-color: green;
scrollbar-DarkShadow-Color: blue;
}
</STYLE>

<?
$bugun = date("d");
$ay = date("m");
$ay = $ay - 1;
$ay = "0$ay";

if ($verified_user)
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"300;URL=sozluk.php?process=lastmonth\">";

$btarih = date ("d/$ay/Y");

$max = 40;
if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }
$alt = ($_GET["sayfa"] - 1)  * $max;

$sor = mysql_query("select id from konucuklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay' ORDER BY 'tarih'");
$w = mysql_num_rows($sor);

$sor = mysql_query("select gun from mesajciklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay'");
$entrysayisi = mysql_num_rows($sor);


$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
echo "<center><p class=eol><font face=Verdana size=1>
<b>$btarih</b><br>$w baslik, $entrysayisi entry<br>
Sayfalar:
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
if (!$yesterday)
echo "<a class=but href=?process=lastmonth&sayfa=$linksayfa><font face=verdana size=1><<</font></a> ";
else
echo "<a class=but href=?process=lastmonth&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=2><<</font></a> ";
}
}

}

echo "
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {

if ($sayfa == $i) {
if ($yesterday)
echo " <OPTION value=sozluk.php?process=lastmonth&yesterday=vlk&sayfa=$i selected>$i</OPTION>";
else
echo " <OPTION value=sozluk.php?process=lastmonth&sayfa=$i selected>$i</OPTION>";
} // if
else {
if ($yesterday)
echo "<OPTION value=sozluk.php?process=lastmonth&yesterday=vlk&sayfa=$i>$i</OPTION>";
else
echo "<OPTION value=sozluk.php?process=lastmonth&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT>";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster) {
if (!$yesterday)
echo " <a class=but href=?process=lastmonth&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
else
echo " <a class=but href=?process=lastmonth&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}


}

echo "
<br>
</center>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
";



// $sorgu  = "SELECT id,baslik,tarih,gun, count(mesajciklar.sira) as adet FROM konucuklar, mesajciklar WHERE konucuklar.statu='' and konucuklar.gun = '$bugun' and  konucuklar.ay = '$ay' and mesajciklar.statu='' and mesajciklar.gun = '$bugun' and mesajciklar.ay = '$ay' and mesajciklar.sira = konucuklar.id ORDER BY 'tarih' desc limit $alt,$max";

$listele = mysql_query("SELECT id,baslik,tarih,gun FROM konucuklar WHERE statu='' and `gun` = '$bugun' and  `ay` = '$ay' ORDER BY 'tarih' desc limit $alt,$max");
while ($kayit=mysql_fetch_array($listele)) {
$id=$kayit["id"];
$baslik=$kayit["baslik"];
$tarih=$kayit["tarih"];
$yazan=$kayit["yazan"];
$gun=$kayit["gun"];
$link = ereg_replace(" ","+",$baslik);
$saydir++;

echo "
  <TR onmouseover=\"vi('m0',true)\" onmouseout=\"vi('m0',false)\">
    <TD>·&nbsp;</TD>
  <TD width=190><A title=\"\"href=\"sozluk.php?process=word&q=$link\"
      target=main>$baslik</A>&nbsp;</TD></TR>
";
}
echo "</TBODY></TABLE>";



$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
echo "<center><p class=eol><font face=Verdana size=1>
$w adet baslik listeleniyor<br>
Sayfalar:
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
if (!$yesterday)
echo "<a class=but href=?process=lastmonth&sayfa=$linksayfa><font face=verdana size=1><<</font></a>";
else
echo "<a class=but href=?process=lastmonth&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1><<</font></a>";
}
}

}

echo "
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {

if ($sayfa == $i) {
if ($yesterday)
echo " <OPTION value=sozluk.php?process=lastmonth&yesterday=vlk&sayfa=$i selected>$i</OPTION>";
else
echo " <OPTION value=sozluk.php?process=lastmonth&sayfa=$i selected>$i</OPTION>";
} // if
else {
if ($yesterday)
echo "<OPTION value=sozluk.php?process=lastmonth&yesterday=vlk&sayfa=$i>$i</OPTION>";
else
echo "<OPTION value=sozluk.php?process=lastmonth&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT>";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster) {
if (!$yesterday)
echo "<a class=but href=?process=lastmonth&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
else
echo "<a class=but href=?process=lastmonth&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}


}

echo "</div>";
?>
<?
cache_save('gecenay');
?>