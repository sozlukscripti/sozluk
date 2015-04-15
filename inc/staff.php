<table border=0>
<tr><td>

<script language="javascript">
b("main","sozluk.php?process=staff","hakkýmýzda","hakkýmýzda");
b("main","sozluk.php?process=nedediler","bizim için ne dediler","ne demisler");
b("main","sozluk.php?process=iletisim","iletiþim","iletiþim");
b("main","sozluk.php?process=destek","destek","destekleyenler ve desteklenenler");
</script>
</td></tr>
</table><script type="text/javascript">
_uacct = "UA-1376617-1";
urchinTracker();
</script>


<script type="text/javascript"><!--
document.mst.stop();
//--></script>
<a href=# onClick="document.mst.stop()"><center>
</center></a>
<fieldset>
<table width="500" border="0">
<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>

  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
  <TR>
    <TD>
	 <div style="text-align:center">

<br><br> 
 <DIV id=sc style="OVERFLOW: hidden; CURSOR: default; HEIGHT: 200px; TEXT-ALIGN: center">
      <DIV style="WIDTH: 1px; HEIGHT: 200px"></DIV>
<small><? include "config.php";  echo $sitename;?> kadrosu</small><br>
<br><br>
tarihçe
<br>
<b>ailesekiz</b>
<b>anka sözçük 05 ocak 2015 tarihinde açýlmýþtýr,
</br>
sanal bir aile kurulan,
</br>
eksisekiz.com sitesinden,
</br>
çýkan kararla özgürlüðe ve anarþizme,
</br>
adým atan bir sözlük ortamý kurulmuþtur,
</br>
bazý yazarlarýnda destekleriyle,
</br>
artýk büyümesi için elinde hiç bir engel yoktur.</b><br>
<br>
admin<br>
<b>
<?$sorgu = "SELECT nick,durum,email,id,isim FROM user WHERE `yetki` = 'admin'";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_assoc($sorgulama)){
echo "<a href=\"$kayit[nick].html\">$kayit[nick]</a><br>";
}} ?></b><br>
<br>
moderatör<br>
<b><?
$sorgu = "SELECT nick,durum,email,id,isim FROM user WHERE `yetki` = 'modust' ";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_assoc($sorgulama)){
echo "<a href=\"$kayit[nick].html\">$kayit[nick]</a><br>";
}} ?></b><br>
<br>
co-mod<br>
<b><?
$sorgu = "SELECT nick,durum,email,id,isim FROM user WHERE `yetki` = 'mod' ";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_assoc($sorgulama)){
echo "<a href=\"$kayit[nick].html\">$kayit[nick]</a><br>";
}}?></b><br>
<br>
gammaz<br>
<b><?

$sorgu = "SELECT nick,durum,email,id,isim FROM user WHERE `yetki` = 'gammaz'";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_assoc($sorgulama)){
echo "<a href=\"$kayit[nick].html\">$kayit[nick]</a><br>";
}}?></b><br>
<br>
altyapý<br>
<b>eksisekiz</b><br>
<br>
geliþtirmenator<br>
<b>metalist</b><br>
<b>renvacy</b><br>
<b>fisting</b><br>
<br><br><br>
<br>
<b><?=$sitename;?> 2015©</b>
<br><br><br><br><br><br><br><br><br><br>
</div>



		<br>
            <DIV style="WIDTH: 1px; HEIGHT: 200px"></DIV></DIV>
      <SCRIPT type=text/javascript>
    var o=document.getElementById("sc");
    function vov(){if(++o.scrollTop>o.scrollHeight-o.clientHeight)o.scrollTop=0;setTimeout(vov,20);}
    setTimeout(vov,20);
    </SCRIPT>
      &nbsp;</TD></TR></TBODY></TABLE>    <tr>
      

    </tr>
