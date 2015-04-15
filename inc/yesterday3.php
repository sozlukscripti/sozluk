<?
$cachetime = (60*1) * 60;
include "cache.php";
cache_check("dun2".$_GET[sayfa]);
?>
<?
include "config.php";
$xxgun = rand (1,31);
//apex

if (0<$xxgun && $xxgun<10) {
$dun = "0$xxgun";
} else {
$dun = $xxgun ;
}?>
<?
$xxgun = rand (1,31);
//apex

if (0<$xxgun && $xxgun<10) {
$dun = "0$xxgun";
} else {
$dun = $xxgun ;
$max=$_GET['sayfa'];
}
$sorgu = "SELECT * FROM konular where gun='$dun' and ay='$ay' order by id desc limit $max,40";
$sorgulama = mysql_query($sorgu);
$sorguk=mysql_query("select * from konular where gun='$dun' and ay='$ay'");
$sorgu2=mysql_num_rows($sorguk);
if ($sorgu2>0){
//kayýtlarý listele
$no=$sorgu2;
$tsayfa=$no/40;
$tyeni=ceil($tsayfa);
if ($tsayfa >1) {
echo "<center><div class=pagi><font face=Verdana size=1>
dünün baþlýklarý.. ($sorgu2 ba\$lik)<br>
sayfa
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
if (!$yesterday)
echo "<a class=but href=?process=yesterday&sayfa=$linksayfa><font face=verdana size=1><<</font></a> ";
else
echo "<a class=but href=?process=yesterday&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=2><<</font></a> ";
}
}

}
echo "
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$tyeni;$i++) {

if ($sayfa == $i) {
if ($yesterday)
echo " <OPTION value=sozluk.php?process=yesterday&yesterday=vlk&sayfa=$i selected>$i</OPTION>";
else
echo " <OPTION value=sozluk.php?process=yesterday&sayfa=$i selected>$i</OPTION>";
} // if
else {
if ($yesterday)
echo "<OPTION value=sozluk.php?process=yesterday&yesterday=vlk&sayfa=$i>$i</OPTION>";
else
echo "<OPTION value=sozluk.php?process=yesterday&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT> / $tyeni ";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $tyeni) {
if (!$yesterday)
echo " <a class=but href=?process=yesterday&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
else
echo " <a class=but href=?process=yesterday&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}


}
echo "
<br>
</center> </center>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
";
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
$baslik=$kayit["baslik"];
$tarih=$kayit["tarih"];
$yazan=$kayit["yazan"];

$link = ereg_replace(" ","+",$baslik);
echo "
  <tr>
    <td><font color=#0062AD>· </font><a href=\"sozluk.php?process=word&q=$link\" target=main>$baslik</a></td>
  </tr>
";
}
}
echo "</TBODY></TABLE>";
if ($tsayfa >1) {
echo "<center><div class=pagi><font face=Verdana size=1>
dünün baþlýklarý.. ($sorgu2 ba\$lik)<br>
sayfa
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
if (!$yesterday)
echo "<a class=but href=?process=yesterday&sayfa=$linksayfa><font face=verdana size=1><<</font></a> ";
else
echo "<a class=but href=?process=yesterday&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=2><<</font></a> ";
}
}

}
echo "
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$tyeni;$i++) {

if ($sayfa == $i) {
if ($yesterday)
echo " <OPTION value=sozluk.php?process=yesterday&yesterday=vlk&sayfa=$i selected>$i</OPTION>";
else
echo " <OPTION value=sozluk.php?process=yesterday&sayfa=$i selected>$i</OPTION>";
} // if
else {
if ($yesterday)
echo "<OPTION value=sozluk.php?process=yesterday&yesterday=vlk&sayfa=$i>$i</OPTION>";
else
echo "<OPTION value=sozluk.php?process=yesterday&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT> / $tyeni ";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $tyeni) {
if (!$yesterday)
echo " <a class=but href=?process=yesterday&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
else
echo " <a class=but href=?process=yesterday&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}


}
echo "</div><br><br>";

cache_save('dun2');
mysql_close();
?>