<center><small>ukdeler (<a href="javascript:od('sozluk.php?process=uktelerin',300,450)">sen?</a>)</small></center>
<?
if ($verified_user) {
$osorgu=mysql_query("select * from online where nick='$verified_user'");
$ono=@mysql_num_rows($osorgu);
$oip = getenv('REMOTE_ADDR');
if ($ono==0) {
$zaman=time();
mysql_query("insert into online values('$verified_user','$zaman','$oip','on')");
} else if ($ono>=2) {
mysql_query("delete from online where nick='$verified_user'");
}
}
?>
<STYLE TYPE="text/css">
BODY
{
scrollbar-base-color: orange;
scrollbar-arrow-color: green;
scrollbar-DarkShadow-Color: blue;
}
</STYLE>
<SCRIPT type=text/javascript>
function sch(s) { var o = document.getElementById("cf");o.checked=(o.disabled=(s=="r"))?true:o.checked; }
function vi(s,v) { var o = document.getElementById(s); if(o) o.style.visibility=v?"visible":"hidden"; }
</SCRIPT>
<body class=bgleft>
          <DIV style="OVERFLOW-X: hidden; WIDTH: 100%">
<?
$bugun = date("d");
$ay = date("m");

if ($verified_user)
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"300;URL=sozluk.php?process=ukde\">";

$btarih = date ("d/m/Y");


$max = 40;
if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }
$alt = ($_GET["sayfa"] - 1)  * $max;

$sor = mysql_query("select id from ukde ORDER BY 'tarih'");
$w = mysql_num_rows($sor);
$ws=ceil($w/40);

$sor = mysql_query("select baslik from ukde");
$entrysayisi = mysql_num_rows($sor);

$goster = $w/$max;
$goster=ceil($goster);
if ($goster >0) {
echo "<center><div class=pagi><font face=Verdana size=1>
$entrysayisi adet ukde doldurulmayý bekliyor<br>
sayfa
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
if (!$yesterday)
echo "<a class=but href=?process=ukde&sayfa=$linksayfa><font face=verdana size=1><<</font></a> ";
else
echo "<a class=but href=?process=ukde&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=2><<</font></a> ";
}
}

}

echo "
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {

if ($sayfa == $i) {
if ($yesterday)
echo " <OPTION value=sozluk.php?process=ukde&yesterday=vlk&sayfa=$i selected>$i</OPTION>";
else
echo " <OPTION value=sozluk.php?process=ukde&sayfa=$i selected>$i</OPTION>";
} // if
else {
if ($yesterday)
echo "<OPTION value=sozluk.php?process=ukde&yesterday=vlk&sayfa=$i>$i</OPTION>";
else
echo "<OPTION value=sozluk.php?process=ukde&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT> / $ws ";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster) {
if (!$yesterday)
echo " <a class=but href=?process=ukde&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
else
echo " <a class=but href=?process=ukde&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}


}

echo "
<br>
</center></center></div>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
";



// $sorgu  = "SELECT id,baslik,tarih,gun, count(mesajciklar.sira) as adet FROM konucuklar, mesajciklar WHERE konucuklar.statu='' and konucuklar.gun = '$bugun' and  konucuklar.ay = '$ay' and mesajciklar.statu='' and mesajciklar.gun = '$bugun' and mesajciklar.ay = '$ay' and mesajciklar.sira = konucuklar.id ORDER BY 'tarih' desc limit $alt,$max";

$listele = mysql_query("SELECT id,baslik,aciklama,yazar,tarih FROM ukde ORDER BY 'tarih' desc limit $alt,$max");
$toplams=@mysql_num_rows($listele);
while ($kayit=mysql_fetch_assoc($listele)) {
$id=$kayit["id"];
$kactane=@mysql_num_rows(mysql_query("select * from ukde where id='$id'"));
$tkac=$kactane;
if ($kactane==0) {
 $kactane2="";
} else {
 $kactane2=$kactane;
}
$enson=mysql_query("select * from ukde where id='$id' order by id desc limit 0,1");
$ensonb=@mysql_result($enson,0,'id');
$ensonk=@mysql_result($enson,0,'yazar');
$baslik=$kayit["baslik"];
$tarih=$kayit["tarih"];
$yazan=$kayit["yazar"];
$gun=$kayit["tarih"];
$aciklama=$kayit["aciklama"];
$link = ereg_replace(" ","+",$baslik);
$saydir++;
$hid=$kayit['id'];
echo "
  <TR onmouseover=\"vi('m$hid',true)\" onmouseout=\"vi('m$hid',false)\">
    <TD>·&nbsp;</TD>
  <TD width='190'><A href=\"$link.html\"
      target=main title='($baslik)'>$baslik</A>";
if ($verified_user) {
echo "<span id=\"m$hid\" style=\"visibility:hidden\"><A href=\"$link.html\"
      target=main title='($baslik)'>..</A></span>";
}
echo "
</TD></TR>
";
}
echo "</TBODY></TABLE>";



$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
echo "<center><div class=pagi>
ukdeler<br>
sayfa
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
if (!$yesterday)
echo "<a class=but href=?process=ukde&sayfa=$linksayfa><font face=verdana size=1><<</font></a>";
else
echo "<a class=but href=?process=ukde&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1><<</font></a>";
}
}

}

echo "
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {

if ($sayfa == $i) {
if ($yesterday)
echo " <OPTION value=sozluk.php?process=ukde&yesterday=vlk&sayfa=$i selected>$i</OPTION>";
else
echo " <OPTION value=sozluk.php?process=ukde&sayfa=$i selected>$i</OPTION>";
} // if
else {
if ($yesterday)
echo "<OPTION value=sozluk.php?process=ukde&yesterday=vlk&sayfa=$i>$i</OPTION>";
else
echo "<OPTION value=sozluk.php?process=ukde&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT> / $ws ";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster) {
if (!$yesterday)
echo "<a class=but href=?process=ukde&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
else
echo "<a class=but href=?process=ukde&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}


}

echo "</div><hr>";
?>