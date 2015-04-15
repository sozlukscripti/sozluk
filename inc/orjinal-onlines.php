<?
$cachetime = (5*60);
include "cache.php";
cache_check('onlinespanel');
?>
<META http-equiv=Content-Type content="text/html; charset=windows-1254"><LINK href="css/default/default.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
</HEAD>
<BODY>

<?
if ($statu) {
if ($statu != "disarida" and $statu != "mesgul" and $statu != "yemekte" and $statu != "iceride") {
die;
}
else {
$snerde = $statu;
session_register("snerde");
}
}

$snerde = $_SESSION['snerde'];

$listele = mysql_query("SELECT okundu,id FROM privmsg WHERE `kime`='$verified_user'");
while ($kayit=mysql_fetch_array($listele)) {
$okundu=$kayit["okundu"];
$id=$kayit["id"];
if ($okundu != 0) {
$okunmayan++;
}
if ($okundu == 2) {
$notice++;
$sorgu = "UPDATE privmsg SET okundu = '1' WHERE id= '$id'";
mysql_query($sorgu);
}
}

if ($notice)
echo "<SCRIPT>alert('$notice okunmayan mesajınız var.postahane bölümünden kontrol edebilirsiniz.');</SCRIPT>";

if ($okunmayan)
$pms = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a title=\"$okunmayan okunmayan hede var\" href=sozluk.php?process=privmsg><img src=images/new.gif alt=\"$okunmayan okunmayan hede var\"> ($okunmayan)</a>";

?>
<TABLE width="95%" align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top width="75%">
      <fieldset><LEGEND><B>flash flash flash!</B></LEGEND>
          <DIV>
          <?
$sorgu = "SELECT * FROM haberler ORDER BY `tarih` desc LIMIT 5";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayıtları listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$konu=$kayit["konu"];
$aciklama=$kayit["aciklama"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];
$ay=$kayit["ay"];
$gun=$kayit["gun"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];



$aciklama = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$aciklama);
$aciklama = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$aciklama);
$aciklama = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$aciklama);
$aciklama = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $aciklama);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);

echo "
<a class=highligth>$konu
      [$gun/$ay/$yil $saat]</a><BR>
      <font size=1>$aciklama</font>
      <BR>
      <strong>$yazar</strong>
      <HR SIZE=1>
      ";
}
}
?>
        </DIV>
      </fieldset></TD>
    <TD vAlign=top align=left width="20%">

      <fieldset noresize="noresize"><LEGEND><B>online yazarlar</B></LEGEND>
<div style="width:170px;height:275px;overflow:scroll;overflow-x:hidden">

<?

$sayac = 0;
$sorgu = "SELECT * FROM online ORDER BY nick asc";
$sorgulama = mysql_query($sorgu);
$kac = mysql_num_rows($sorgulama);

echo "<center>
";
if (!$snerde) {
/*echo "
<SELECT class=but onchange=\"jm('self',this,0);\" name=sayfa>
<OPTION value=sozluk.php?process=onlines&statu=disarida selected>dı\$arıda</OPTION>
<OPTION value=sozluk.php?process=onlines&statu=mesgul selected>me\$gul</OPTION>
<OPTION value=sozluk.php?process=onlines&statu=yemekte selected>yemekte</OPTION>
<OPTION value=sozluk.php?process=onlines&statu=iceride selected>iceride</OPTION>
";
*/
}
if ($snerde == "disarida")
$disarida = "selected";
if ($snerde == "mesgul")
$mesgul = "selected";
if ($snerde == "yemekte")
$yemekte = "selected";
if ($snerde == "iceride" or !$snerde)
$iceride = "selected";

/*echo "
<OPTION value=sozluk.php?process=onlines&statu=disarida $disarida>dı\$arıda</OPTION>
<OPTION value=sozluk.php?process=onlines&statu=mesgul $mesgul>me\$gul</OPTION>
<OPTION value=sozluk.php?process=onlines&statu=yemekte $yemekte>yemekte</OPTION>
<OPTION value=sozluk.php?process=onlines&statu=iceride $iceride>iceride</OPTION>
</select>
";
*/
echo "

</center>
<img src=images/yazarlar.gif alt=\"$kac kayitli onlayn\"> <a title=\"$kac kayitli onlayn\">($kac)</a>$pms<hr>";
if (mysql_num_rows($sorgulama)>0){
//kayytlary listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$nick=$kayit["nick"];
$ondurum=$kayit["ondurum"];
$ip=$kayit["ip"];
$sayac++;

if ($ondurum == "on")
$echodurum = "Yazar";
if ($ondurum == "off")
$echodurum = "Çömez";
if ($ondurum == "wait")
$echodurum = "Yazar Adayı";
if ($ondurum == "sus")
$echodurum = "Tekmelenmiş";

$checknick = explode("+", $nick);
$checknick = $checknick[1];

$msgnick = str_replace(".","",$nick);
$msgnick = str_replace("&","",$nick);

if ($checknick)
$nick = "$nick";



if ($verified_kat == "admin") {
$iptit = "<a title=\"$ip blockla\" href=\"sozluk.php?process=adm&islem=ipban&ip=$ip\" class=link><img src=images/unlem.gif></a>";
}


if ($ondurum == "off")
echo "$iptit<a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$msgnick\" title=\"$echodurum\"><font size=1>·&nbsp;$nick</a> <a href='sozluk.php?process=arkadasekle&n=$msgnick' title='arkadaşım olsun'>(+)</a> <a href='sozluk.php?process=dusmanekle&n=$msgnick' title='düşmanım olsun'>(-)</a></font><br>";
if ($ondurum == "on")
echo "$iptit<a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$msgnick\" title=\"$echodurum\"><font size=1>·&nbsp;$nick</a> <a href='sozluk.php?process=arkadasekle&n=$msgnick' title='arkadaşım olsun'>(+)</a> <a href='sozluk.php?process=dusmanekle&n=$msgnick' title='düşmanım olsun'>(-)</a><br>";
if ($ondurum == "wait")
echo "$iptit<a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$msgnick\" title=\"$echodurum\"><font size=1>·&nbsp;$nick</a> <a href='sozluk.php?process=arkadasekle&n=$msgnick' title='arkadaşım olsun'>(+)</a> <a href='sozluk.php?process=dusmanekle&n=$msgnick' title='düşmanım olsun'>(-)</a><br>";

}
}

?>

</div>
<br>
      </FIELDSET>    </TD></TR>
  <TR>
    <TD colSpan=2>
      <FIELDSET><LEGEND></LEGEND>
</SELECT>
      <table width="509" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr align=center>
    <td width="509" colspan="2"><div align="center"><strong>tema seçimi</strong></div></td>
  </tr>
  <tr>
<td><a href="sozluk.php?process=cp&tema=default">default</a> |
<a href="sozluk.php?process=cp&tema=defaultgri">default gri</a> | 
<a href="sozluk.php?process=cp&tema=defaultlila">default lila</a> | 
<a href="sozluk.php?process=cp&tema=bayrak">bayrak</a> | 
<a href="sozluk.php?process=cp&tema=simsiyah">simsiyah</a> | 
<a href="sozluk.php?process=cp&tema=cokpis">çok pis</a> | 
<a href="sozluk.php?process=cp&tema=absolute">absolute</a> | 
<a href="sozluk.php?process=cp&tema=simpsons2">simpsons2</a> | 
<a href="sozluk.php?process=cp&tema=simpsons">simpsons</a> | 
<a href="sozluk.php?process=cp&tema=toa">toa</a> | 
<a href="sozluk.php?process=cp&tema=wall">Wall</a> | 
<a href="sozluk.php?process=cp&tema=metallica">metallica</a> | 
<a href="sozluk.php?process=cp&tema=comodore64">comodore64</a> | 
<a href="sozluk.php?process=cp&tema=gecegorusu">gecegorusu</a> | 
<a href="sozluk.php?process=cp&tema=ledzeppelin">ledzeppelin</a> | 
<a href="sozluk.php?process=cp&tema=yigitozgur">yigitozgur</a> | 
<a href="sozluk.php?process=cp&tema=evanescence">evanescence</a> | 
<a href="sozluk.php?process=cp&tema=dragon">dragon</a> | 
<a href="sozluk.php?process=cp&tema=cogitonair">cogitonair</a> | 
<a href="sozluk.php?process=cp&tema=lost">LOST</a> | 
<a href="sozluk.php?process=cp&tema=barisakarsu">Barış Akarsu</a> | 
<a href="sozluk.php?process=cp&tema=kata">kata</a></td>
  </tr>
  </table>
      </FIELDSET>
      </TD>
</TR></TBODY></TABLE>

</BODY></HTML>
<?
cache_save('onlinespanel');
?>