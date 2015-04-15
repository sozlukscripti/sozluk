<?
$cachetime = (60*1) * 60;
include "cache.php";
cache_check("dun".$_GET[sayfa]);
?>
<? 
$saatfark = '-21'; 
$bugun = gmdate("d", time()+(3600*$saatfark)); 
$ay = gmdate("m", time()+(3600*$saatfark)); 

if ($verified_user) 
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"300;URL=sozluk.php?process=yesterday2\">"; 
$btarih = gmdate ("d/m/Y", time()+(3600*$saatfark)); 


$max = 50; 
if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; } 
$alt = ($_GET["sayfa"] - 1)  * $max; 

$sor = mysql_query("select id from konucuklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay' ORDER BY 'tarih'"); 
$w = mysql_num_rows($sor); 
$ws=ceil($w/50); 

$sor = mysql_query("select gun from mesajciklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay'"); 
$entrysayisi = mysql_num_rows($sor); 

$goster = $w/$max; 
$goster=ceil($goster); 
if ($goster >1) { 
echo "<center><div class=pagi><font face=Verdana size=1> 
dünün baþlýklarý.. ($w ba\$lik)<br> 
sayfa 
"; 

if ($sayfa >= 1 or !$sayfa) { 

$linksayfa = $sayfa - 1; 
if ($sayfa > 1 or $sayfa) { 
if ($sayfa != 1) { 
if (!$yesterday) 
echo "<a class=but href=?process=yesterday2&sayfa=$linksayfa><font face=verdana size=1><<</font></a> "; 
else 
echo "<a class=but href=?process=yesterday2&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=2><<</font></a> "; 
} 
} 

} 

echo " 
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>"; 
for ($i=1;$i<=$goster;$i++) { 

if ($sayfa == $i) { 
if ($yesterday) 
echo " <OPTION value=sozluk.php?process=yesterday2&yesterday=vlk&sayfa=$i selected>$i</OPTION>"; 
else 
echo " <OPTION value=sozluk.php?process=yesterday2&sayfa=$i selected>$i</OPTION>"; 
} // if 
else { 
if ($yesterday) 
echo "<OPTION value=sozluk.php?process=yesterday2&yesterday=vlk&sayfa=$i>$i</OPTION>"; 
else 
echo "<OPTION value=sozluk.php?process=yesterday2&sayfa=$i>$i</OPTION>"; 
} // new 

} 
echo "</SELECT> / $ws "; 

if ($sayfa >= 1 or !$sayfa) { 
if (!$sayfa) 
$sayfa = 1; 

$linksayfa = $sayfa + 1; 

if ($linksayfa <= $goster) { 
if (!$yesterday) 
echo " <a class=but href=?process=yesterday2&sayfa=$linksayfa><font face=verdana size=1>>></font></a>"; 
else 
echo " <a class=but href=?process=yesterday2&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>"; 
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

$listele = mysql_query("SELECT id,baslik,tarih,gun FROM konucuklar WHERE statu='' and `gun` = '$bugun' and  `ay` = '$ay' ORDER BY 'tarih' desc limit $alt,$max"); 
$toplams=@mysql_num_rows($listele); 
while ($kayit=mysql_fetch_array($listele)) { 
$id=$kayit["id"]; 
$kactane=@mysql_num_rows(mysql_query("select * from mesajciklar where sira='$id' and gun='$bugun'")); 
$tkac=@mysql_num_rows(mysql_query("select * from mesajciklar where sira='$id'")); 
if ($kactane==0) { 
 $kactane2=""; 
} else { 
 $kactane2=$kactane; 
} 
$enson=mysql_query("select * from mesajciklar where sira='$id' order by id desc limit 0,1"); 
$ensonb=@mysql_result($enson,0,'id'); 
$ensonk=@mysql_result($enson,0,'yazar'); 
$baslik=$kayit["baslik"]; 
$tarih=$kayit["tarih"]; 
$yazan=$kayit["yazan"]; 
$gun=$kayit["gun"]; 
$link = ereg_replace(" ","+",$baslik); 
$saydir++; 
$hid=$kayit['id']; 
echo " 
  <TR onmouseover=\"vi('m$hid',true)\" onmouseout=\"vi('m$hid',false)\"> 
    <TD>· </TD> 
  <TD width='190'><A href=\"$link.html\" 
      target=main title='($tkac)'>$baslik</A> ($kactane2) "; 
if ($verified_user) { 
echo "<span id=\"m$hid\" style=\"visibility:hidden\"><a href='sozluk.php?process=eid&eid=$ensonb' target='main' title='(#$ensonb)'>..</a></span>"; 
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
dunun ba\$liklari.. ($w ba\$lik)<br> 
sayfa 
"; 

if ($sayfa >= 1 or !$sayfa) { 

$linksayfa = $sayfa - 1; 
if ($sayfa > 1 or $sayfa) { 
if ($sayfa != 1) { 
if (!$yesterday) 
echo "<a class=but href=?process=yesterday2&sayfa=$linksayfa><font face=verdana size=1><<</font></a>"; 
else 
echo "<a class=but href=?process=yesterday2&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1><<</font></a>"; 
} 
} 

} 

echo " 
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>"; 
for ($i=1;$i<=$goster;$i++) { 

if ($sayfa == $i) { 
if ($yesterday) 
echo " <OPTION value=sozluk.php?process=yesterday2&yesterday=vlk&sayfa=$i selected>$i</OPTION>"; 
else 
echo " <OPTION value=sozluk.php?process=yesterday2&sayfa=$i selected>$i</OPTION>"; 
} // if 
else { 
if ($yesterday) 
echo "<OPTION value=sozluk.php?process=yesterday2&yesterday=vlk&sayfa=$i>$i</OPTION>"; 
else 
echo "<OPTION value=sozluk.php?process=yesterday2&sayfa=$i>$i</OPTION>"; 
} // new 

} 
echo "</SELECT> / $ws "; 

if ($sayfa >= 1 or !$sayfa) { 
if (!$sayfa) 
$sayfa = 1; 

$linksayfa = $sayfa + 1; 

if ($linksayfa <= $goster) { 
if (!$yesterday) 
echo "<a class=but href=?process=yesterday2&sayfa=$linksayfa><font face=verdana size=1>>></font></a>"; 
else 
echo "<a class=but href=?process=yesterday2&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>"; 
} 

} 


} 

echo "</div><br><br>"; 
cache_save('dun');
mysql_close();
?>
</BODY>