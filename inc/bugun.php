<? 

if ($kullanici) { 

$osorgu=mysql_query("select * from online where nick='$kullanici'"); 

$ono=@mysql_num_rows($osorgu); 

$oip = getenv('REMOTE_ADDR'); 

if ($ono==0) { 

$zaman=time(); 

mysql_query("insert into online values('$kullanici','$zaman','$oip','on')"); 

} else if ($ono>=2) { 

mysql_query("delete from online where nick='$kullanici'"); 

} 

} 

?>

<SCRIPT src="images/tips.js" type=text/javascript></SCRIPT>
<SCRIPT type=text/javascript>
function sch(s) { var o = document.getElementById("cf");o.checked=(o.disabled=(s=="r"))?true:o.checked; }
function vi(s,v) { var o = document.getElementById(s); if(o) o.style.visibility=v?"visible":"hidden"; }
</SCRIPT>

<body class=bgleft>
        
<DIV class=adiv id=a style="TOP: 44px">
<FORM id=sr action=sozluk.php?process=dsearch target=main method=post>
<TABLE style="WIDTH: 200px" cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD class=aup>&nbsp;</TD>
    <TD class=amain id=amain rowSpan=3>
      <SCRIPT type=text/javascript>document.getElementById('amain').disabled=true;</SCRIPT>
      <INPUT type=hidden value=sr name=a> 
      <TABLE class=msg cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR>
          <TD>$ey</TD>
          <TD><INPUT maxLength=100 size=19 name=q></TD></TR>
        <TR>
          <TD>yazari</TD>
          <TD><INPUT maxLength=50 size=19 name=yazar></TD></TR></TBODY></TABLE>
      <FIELDSET>
      <LEGEND>sirala</LEGEND>
      <TABLE class=msg>
        <TBODY>
        <TR>
          <TD noWrap><INPUT class=radio id=ra onClick="sch('a')" type=radio 
            CHECKED value=1 name=sirala>
          <LABEL accessKey=a 
            for=ra><U>a</U>lfabetik</LABEL></TD>
          <TD noWrap><INPUT class=radio id=rr onClick="sch('r')" type=radio 
            value=2 name=sirala>
          <LABEL accessKey=r for=rr><u>karma</u>
          <SCRIPT type=text/javascript>for(var n=1;n<7;n++)document.write(String.fromCharCode(Math.round(Math.random()*25)+97));</SCRIPT>
            </LABEL></TD></TR>
        <TR>
          <TD noWrap><INPUT class=radio id=ry onClick="sch('y')" type=radio 
            value=0 name=sirala><LABEL accessKey=y 
            for=ry><U>y</U>eni-eski</LABEL></TD>
          <TD noWrap><INPUT class=radio id=rg onClick="sch('g')" type=radio 
            value=1 name=sirala>
          <LABEL accessKey=u 
        for=rg>accaip</LABEL></TD></TR></TBODY></TABLE></FIELDSET> 
      <FIELDSET style="WHITE-SPACE: nowrap; TEXT-ALIGN: center"><LEGEND>tarih 
      araligi</LEGEND>$urdan<BR><SELECT name=dc1><OPTION value="" 
        selected><OPTION>1<OPTION>2<OPTION>3<OPTION>4<OPTION>5<OPTION>6<OPTION>7<OPTION>8<OPTION>9<OPTION>10<OPTION>11<OPTION>12<OPTION>13<OPTION>14<OPTION>15<OPTION>16<OPTION>17<OPTION>18<OPTION>19<OPTION>20<OPTION>21<OPTION>22<OPTION>23<OPTION>24<OPTION>25<OPTION>26<OPTION>27<OPTION>28<OPTION>29<OPTION>30<OPTION>31</OPTION></SELECT> 
      <SELECT name=dc2><OPTION value="" 
        selected><OPTION>1<OPTION>2<OPTION>3<OPTION>4<OPTION>5<OPTION>6<OPTION>7<OPTION>8<OPTION>9<OPTION>10<OPTION>11<OPTION>12</OPTION></SELECT> 
      <SELECT name=dc3><OPTION value="" 
        selected><OPTION>2008<OPTION>2009</OPTION></SELECT> 
      <BR>$uraya<BR><SELECT name=dc1><OPTION value="" 
        selected><OPTION>1<OPTION>2<OPTION>3<OPTION>4<OPTION>5<OPTION>6<OPTION>7<OPTION>8<OPTION>9<OPTION>10<OPTION>11<OPTION>12<OPTION>13<OPTION>14<OPTION>15<OPTION>16<OPTION>17<OPTION>18<OPTION>19<OPTION>20<OPTION>21<OPTION>22<OPTION>23<OPTION>24<OPTION>25<OPTION>26<OPTION>27<OPTION>28<OPTION>29<OPTION>30<OPTION>31</OPTION></SELECT> 
      <SELECT name=dc2><OPTION value="" 
        selected><OPTION>1<OPTION>2<OPTION>3<OPTION>4<OPTION>5<OPTION>6<OPTION>7<OPTION>8<OPTION>9<OPTION>10<OPTION>11<OPTION>12</OPTION></SELECT> 
      <SELECT name=dc3><OPTION value="" 
        selected><OPTION>2008<OPTION>2009</OPTION></SELECT> 
      </FIELDSET> 
      <FIELDSET><LEGEND>ivir zivir</LEGEND><INPUT class=checkbox id=cf 
      accessKey=h type=checkbox value=1 name=sirala> <LABEL for=cf><u>s</u>on bir ay </LABEL>
      &#305;n girdisi 
      <BR>
      <INPUT class=checkbox id=cr accessKey=g 
      type=checkbox CHECKED value=0 name=sirala> <LABEL for=cr><U>g</U>uzeller i&ccedil;inden bul </LABEL> 
      </FIELDSET><BR>
      <CENTER><INPUT class=but type=submit value="ara" name=Submit></CENTER></TD></TR>
  <TR>
    <TD class=amid onfocus=pp() accessKey=1 onclick=pp()>i n s a n &nbsp; a r a</TD></TR>
  <TR>
    <TD class=abot>&nbsp;</TD></TR></TBODY></TABLE></FORM></DIV>
	<SCRIPT type=text/javascript>window.onscroll=os;</SCRIPT>  
	<DIV style="OVERFLOW-X: hidden; WIDTH: 100%">
<? 
$bugun = date("d"); 

$ay = date("m"); 
$yil=date("Y"); 


if ($kullanici) 

echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"300;URL=sozluk.php?process=today\">"; 


$btarih = date ("d/m/Y"); 





$max = 30; 

if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; } 

$alt = ($_GET["sayfa"] - 1)  * $max; 



$sor = mysql_query("select id from konucuklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil' ORDER BY 'tarih'"); 

$w = mysql_num_rows($sor); 

$ws=ceil($w/30); 



$sor = mysql_query("select gun from mesajciklar WHERE statu='' and `gun` = '$bugun' and `ay` = '$ay'"); 

$entrysayisi = mysql_num_rows($sor); 


echo"<DIV class=tips id=tips_div name=tips_div></DIV>";
$goster = $w/$max; 

$goster=ceil($goster); 

if ($goster >=1) { 

echo "<center><div class=pagi><font face=Verdana size=1> 
$btarih<br>
günün ba\$lýklarý.. ($w ba\$lýk)<br>($entrysayisi entry)<br> 

sayfa 

"; 



if ($sayfa >= 1 or !$sayfa) { 



$linksayfa = $sayfa - 1; 

if ($sayfa > 1 or $sayfa) { 

if ($sayfa != 1) { 

if (!$yesterday) 

echo "<a class=but href=?do=today&sayfa=$linksayfa><font face=verdana size=1><<</font></a> "; 

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
  
";





$cumle = " 
   SELECT 
      id, 
      baslik,hit, 
      tarih, 
      ( 
         SELECT count(id) 
         FROM mesajciklar 
         WHERE sira = konucuklar.id and statu = ''   and gun='$bugun' and ay='$ay' and yil='$yil' 
      ) AS say 
   FROM konucuklar 
   WHERE gun='$bugun' and ay='$ay' and yil='$yil' and statu='' 
   ORDER BY tarih DESC 
   LIMIT $alt,$max 
"; 



$listele = mysql_query($cumle); 

$toplams=@mysql_num_rows($listele); 

while ($kayit=mysql_fetch_array($listele)) { 
$id=$kayit['id']; 
$tkac=@mysql_num_rows(mysql_query("select * from mesajciklar where sira='$id'"));
$enson=mysql_query("select * from mesajciklar where sira='$id' order by id desc LIMIT 0,1 ");
  $son=@mysql_result($enson,0,'yazar');
$enbas=mysql_query("select * from mesajciklar where sira='$id' order by id asc LIMIT 0,1 ");
  $bas=@mysql_result($enbas,0,'yazar');

 
$hit=$kayit['hit']; 
$link = str_replace(" ","+",$kayit['baslik']); 



echo " 
  <TR onmouseover=\"vi('m$kayit[id]',true)\" onmouseout=\"vi('m$kayit[id]',false)\"> 
  <td>°&nbsp;</td> 
  <TD width='190'><A href='$link.html' 
      target='main' tips='&#13;&#10;<b>En Bas:</b>$bas<br>&#13;&#10;<b>En Son:</b>$son<br>&#13;&#10;<b>Toplam:</b>$tkac<br>&#13;&#10;<b>Bugün:</b> $kayit[say]<br>&#13;&#10;<b>Okunma:</b> $hit'>$kayit[baslik]</A> "; 
  
  echo "<span id=\"m$id\" style=\"visibility:hidden\"><a href='$link.htmx' target='main' title='bugünün entryleri'>...</a></span>"; 
echo "      </td></tr>"; 

} 

echo "</TBODY></TABLE>"; 








$goster = $w/$max; 

$goster=ceil($goster); 

if ($goster >=1) { 

echo "<center><div class=pagi> 
<br/>
günün ba\$lýklarý.. ($w ba\$lýk)<br> 

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