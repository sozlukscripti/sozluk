<?

$cachetime = (1*60);

include "cache.php";

cache_check("bugun".$_GET[sayfa]); 

?>
<?
if ((isset($_GET["sayfa"])) && ($_GET["sayfa"] <= "0")) {
echo "vaaay akilli!!!";
die();
} 
?>
<script src="tips.js" language="javascript" type="text/javascript"></script>
<body class=bgleft> 
<SCRIPT type=text/javascript> 
function sch(s) { var o = document.getElementById("cf");o.checked=(o.disabled=(s=="r"))?true:o.checked; } 
function vi(s,v) { var o = document.getElementById(s); if(o) o.style.visibility=v?"visible":"hidden"; } 
</SCRIPT> 
<div id="a" class=adiv style="top:44px"><form action="sozluk.php?process=dsearch" target=main id=sr method="POST"> 
<table border=0 cellpadding=0 cellspacing=0 style="width:200px"> 
<tr><td class=aup>&nbsp;</td> 
<td id=amain rowspan=3 class=amain> 
<script type="text/javascript">document.getElementById('amain').disabled=true;</script> 
<input type=hidden name=a value=sr> 
<table class=msg border=0 cellpadding=0 cellspacing=0> 

<tr><td>þey</td><td><input type="text" name="q" size="19" maxlength="100"></td></tr> 
<tr><td>yazari</td><td><input type="text" name="yazar" size="19" maxlength="50" value=""></td></tr> 
</table> 
<fieldset><legend>sýra $ekli</legend> 
<table class=msg><tr> 
<td nowrap><input id=ra type=radio class=radio name=sirala value=1 checked onClick="sch('a')"><label accesskey=a for=ra><u>a</u>lfa-beta</label></td> 
<td nowrap><input id=rr type=radio class=radio name=sirala value=2  onclick="sch('r')"><label accesskey=r for=rr><u>r</u><script type="text/javascript">for(var n=1;n<7;n++)document.write(String.fromCharCode(Math.round(Math.random()*25)+97));</script></label></td></tr> 
<tr> 
<td nowrap><input id=ry type=radio class=radio name=sirala value=0 onClick="sch('y')"><label accesskey=y for=ry><u>y</u>eni-eski</label></td> 

<td nowrap><input id=rg type=radio class=radio name=sirala value=1  onclick="sch('g')"><label accesskey=u for=rg>g<u>u</u>dik</label></td> 
</tr></table> 
</fieldset> 
<fieldset style="white-space:nowrap;text-align:center"><legend>tarih araligi</legend> 
þurdan<br> 
<select name="dc1"><option value=""><option>1<option>2<option>3<option>4<option>5<option>6<option>7<option>8<option>9<option>10<option>11<option>12<option>13<option>14<option>15<option>16<option>17<option>18<option>19<option>20<option>21<option>22<option>23<option>24<option>25<option>26<option>27<option>28<option>29<option>30<option>31</select> 

<select name="dc2"><option value=""><option>1<option>2<option>3<option>4<option>5<option>6<option>7<option>8<option>9<option>10<option>11<option>12</select> 
<select name="dc3"><option value=""><option>2009<option>2008</select> 

<br>þuraya<br> 
<select name="dc1"><option value=""><option>1<option>2<option>3<option>4<option>5<option>6<option>7<option>8<option>9<option>10<option>11<option>12<option>13<option>14<option>15<option>16<option>17<option>18<option>19<option>20<option>21<option>22<option>23<option>24<option>25<option>26<option>27<option>28<option>29<option>30<option>31</select> 

<select name="dc2"><option value=""><option>1<option>2<option>3<option>4<option>5<option>6<option>7<option>8<option>9<option>10<option>11<option>12</select> 
<select name="dc3"><option value=""><option>2009<option>2008</select> 

</fieldset> 
<fieldset><legend>ývýr ývýr</legend> 
<input id=cf accesskey=h type=checkbox class=checkbox name=sirala value=1> <label for=cf><u>h</u>izli yaþa genc öl</label><br> 
<input id=cr accesskey=g type=checkbox class=checkbox name=sirala value=0 CHECKED> <label for=cr><u>g</u>uzelinden olsun</label> 

</fieldset><br><center><input type=submit name="Submit" class=but value="ara ulen"></center> 
</td></tr> 
<tr><td class=amid accesskey=1 onClick="pp()" onfocus="pp()">i n s a n &nbsp; a r a</td></tr> 

<tr><td class=abot>&nbsp;</td></tr> 
</table></form></div> 
<script type="text/javascript">window.onscroll=os;</script> 



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
<script src="tips.js" language="javascript" type="text/javascript"></script>

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
unction od(u,w,h,x,y)
{
  if(!w)w=320;if(!h)h=200;if(!x)x=(screen.width-w)/2;if(!y)y=(screen.height-h)/2;
  var w=window.open(u,"_blank","resizable=yes,scrollbars=yes,top="+x.toString()+",left="+y.toString()+",width="+w.toString()+",height="+h.toString());
  w.focus();
}
</SCRIPT>
<body class=bgleft>
          <DIV style="OVERFLOW-X: hidden; WIDTH: 100%">
<?
$bugun = date("d");
$ay = date("m");

if ($verified_user)

echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"200;URL=sozluk.php?process=today&sayfa=1\">";

$btarih = date ("d/m/Y");


$max = 50;
if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }
$alt = ($_GET["sayfa"] - 1)  * $max;

$sor = mysql_query("select id from konucuklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay' ORDER BY 'tarih'");
$w = mysql_num_rows($sor);
$ws=ceil($w/50);

$sor = mysql_query("select gun from mesajciklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay'");
$entrysayisi = mysql_num_rows($sor);
$sayac = 0;
$goster = $w/$max;
$goster=ceil($goster);
if ($goster >0) {
echo "<center><div class=pagi><font face=Verdana size=1>
gunun ba\$liklari.. ($w ba\$lik<a title='tarih girerek baslik cagir' href='sozluk.php?process=tarihgir'>?</a>)<br>sayfa

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
<br>
</center></center></div>
<TABLE cellSpacing=0 cellPadding=0 border=0>


<!-- toplantý kodu baþlangýç  -->




<!-- toplantý kodu bitiþ  -->


  <TBODY>


";

$ay=date("m");


// $sorgu  = "SELECT id,baslik,tarih,gun, count(mesajciklar.sira) as adet FROM konucuklar, mesajciklar WHERE konucuklar.statu='' and konucuklar.gun = '$bugun' and  konucuklar.ay = '$ay' and mesajciklar.statu='' and mesajciklar.gun = '$bugun' and mesajciklar.ay = '$ay' and mesajciklar.sira = konucuklar.id ORDER BY 'tarih' desc limit $alt,$max";

$listele = mysql_query("SELECT id,baslik,tarih,gun FROM konucuklar WHERE statu='' and `gun` = '$bugun' and  `ay` = '$ay' ORDER BY 'tarih' desc limit $alt,$max");
$toplams=@mysql_num_rows($listele);
while ($kayit=mysql_fetch_array($listele)) {
$id=$kayit["id"];
$kactane=@mysql_num_rows(mysql_query("select * from mesajciklar where sira='$id' and gun='$bugun' and ay='$ay'"));
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
$gun=$kayit["gun"];
$link = ereg_replace(" ","+",$baslik);
$saydir++;
$hid=$kayit['id'];
echo "
  <TR onmouseover=\"vi('m$hid',true)\" onmouseout=\"vi('m$hid',false)\">
    <TD>·&nbsp;</TD>
  <TD width='190'><A href=\"$link.html\" target=main title='($tkac)'>$baslik</A>&nbsp;($kactane2)&nbsp;";
	  
echo "<span id=\"m$hid\" style=\"visibility:hidden\"><a href='sozluk.php?process=wordtoday&q=$link' target='main' title='(#$ensonb)'>...</a></span>";

echo "
</TD></TR>
";
}
echo "</TBODY></TABLE>";



$goster = $w/$max;
$goster=ceil($goster);
if ($goster >0) {
echo "<center><div class=pagi>
gunun ba\$liklari.. ($w ba\$lik)<br>
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
?>
<?

cache_save('bugun');

?>
