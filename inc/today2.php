<?
$cachetime = (1*5);
include "cache.php";
cache_check("bugun".$_GET[sayfa]); 
?>
<?
if ((isset($_GET["sayfa"])) && ($_GET["sayfa"] <= "0")) {
echo "vaaay akilli!!!";
die();
} 
include "hayvanara.php";
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
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"60;URL=sozluk.php?process=today\">";
$yil=date("Y");
$btarih = date ("d/m/Y");

?>
<meta name="keywords" content="<? echo "Bugünün baþlýklarý - $sitename - $description"; ?>">
<meta name="description" content="<? echo "Bugünün baþlýklarý - $sitename - $description"; ?>">
<title><? echo "Bugünün baþlýklarý - $sitename - $description"; ?></title></head>
<?
$max = 40;
if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }
$alt = ($_GET["sayfa"] - 1)  * $max;

$sor = mysql_query("select id from konucuklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil' ORDER BY 'tarih'");
$w = mysql_num_rows($sor);
$ws=ceil($w/40);

$sor = mysql_query("select gun from mesajciklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay'");
$entrysayisi = mysql_num_rows($sor);

$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
echo "<center><div class=pagi><font face=Verdana size=1>
gunun baþlýklarý.. ($w baþlýk)<br>
sayfa
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
if (!$yesterday)
echo "<a class=but href=?process=today&sayfa=$linksayfa><font face=verdana size=1><<</font></a> ";
else
echo "<a class=but href=?process=today&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=2><<</font></a> ";
}
}

}

echo "
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {

if ($sayfa == $i) {
if ($yesterday)
echo " <OPTION value=sozluk.php?process=today&yesterday=vlk&sayfa=$i selected>$i</OPTION>";
else
echo " <OPTION value=sozluk.php?process=today&sayfa=$i selected>$i</OPTION>";
} // if
else {
if ($yesterday)
echo "<OPTION value=sozluk.php?process=today&yesterday=vlk&sayfa=$i>$i</OPTION>";
else
echo "<OPTION value=sozluk.php?process=today&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT> / $ws ";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster) {
if (!$yesterday)
echo " <a class=but href=?process=today&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
else
echo " <a class=but href=?process=today&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}


}

echo "

</center></center></div>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  
<TBODY>
";


$cumle = "
   SELECT
      id,
      baslik,
      tarih,
      (
         SELECT count(id)
         FROM mesajciklar
         WHERE sira = konucuklar.id and statu = '' and gun='$bugun' and ay='$ay' and yil='$yil'
      ) AS say
   FROM konucuklar
   WHERE gun='$bugun' and ay='$ay' and yil='$yil' and statu=''
   ORDER BY tarih DESC
   LIMIT $alt,$max
";


$enson=mysql_query("select * from mesajciklar where sira='$id' order by id desc limit 0,1");
$ensonb=@mysql_result($enson,0,'id');

$listele = mysql_query($cumle);
$toplams=@mysql_num_rows($listele);
while ($kayit=mysql_fetch_array($listele)) {
$id=$kayit['id'];
$link = str_replace(" ","+",$kayit['baslik']);
$link = str_replace("'","%27",$kayit['baslik']);
echo "
  <TR onmouseover=\"vi('m$kayit[id]',true)\" onmouseout=\"vi('m$kayit[id]',false)\">
  <td>.&nbsp;</td>
  <TD width='190'><A href='$link.html'
      target='main' title='$kayit[toplam]'>$kayit[baslik]</A>&nbsp;";
  if ($kayit['say']>1) {
  echo "($kayit[say])&nbsp;";
  }
  
echo "<span id=\"m$kayit[id]\" style=\"visibility:hidden\"><a href='sozluk.php?process=wordtoday&q=$link' target='main' title='(#$ensonb)'>...</a></span>";  
  
  
echo "      </td></tr>";
}
echo "</TBODY></TABLE>";



$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
echo "<center><div class=pagi>
gunun baþlýklarý.. ($w baþlýk)<br>
sayfa
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
if (!$yesterday)
echo "<a class=but href=?process=today&sayfa=$linksayfa><font face=verdana size=1><<</font></a>";
else
echo "<a class=but href=?process=today&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1><<</font></a>";
}
}

}

echo "
<SELECT class=pagis onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {

if ($sayfa == $i) {
if ($yesterday)
echo " <OPTION value=sozluk.php?process=today&yesterday=vlk&sayfa=$i selected>$i</OPTION>";
else
echo " <OPTION value=sozluk.php?process=today&sayfa=$i selected>$i</OPTION>";
} // if
else {
if ($yesterday)
echo "<OPTION value=sozluk.php?process=today&yesterday=vlk&sayfa=$i>$i</OPTION>";
else
echo "<OPTION value=sozluk.php?process=today&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT> / $ws ";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster) {
if (!$yesterday)
echo "<a class=but href=?process=today&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
else
echo "<a class=but href=?process=today&yesterday=vlk&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}


}

echo "</div><hr>";


function getir($url){
	if(function_exists('curl_init')){
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_TIMEOUT, 0);
		$xml = curl_exec($ch);
		curl_close($ch);
	}else{
		$xml = file_get_contents($url);
	}
	return $xml;
}
include "config.php";
$rss = "$site/rss.php";
$rss=getir($rss);


cache_save('bugun');
mysql_close();
?>