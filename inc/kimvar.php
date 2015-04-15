<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD class=tab>
            
           <DIV><A href="sozluk.php?process=privmsg">mesajlar</A></DIV></TD>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=cop">kiþisel</A></DIV></TD>
          <TD class=tab>
         <DIV><A href="sozluk.php?process=onlines">olan biten</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=gorunum">tema</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=arkadaslarim">dost</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=dusmanlarim">düsman</A></DIV></TD>
         <TD class=tab>
             <TD class=tabsel>kim var</TD>
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>

<td class="tabin">
<SCRIPT LANGUAGE="JavaScript">
 <!-- 
function Start(page)
 {
 OpenWin = this.open(page, "CtrlWindow","toolbar=No,menubar=No,location=No,scrollbars=No,resizable=No,status=No,left=150,top=150,");
 }
 //-->
</SCRIPT>
<fieldset noresize="noresize"><legend><b>online yazarlar</b></legend>
<div style="width:225px;height:300px;">
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
<OPTION value=sozluk.php?process=onlines&statu=disarida selected>dý\$arýda</OPTION>
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
<OPTION value=sozluk.php?process=onlines&statu=disarida $disarida>dý\$arýda</OPTION>
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
$echodurum = "Yazar Adayý";
if ($ondurum == "sus")
$echodurum = "Tekmelenmiþ";

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
echo "$iptit<a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$msgnick\" title=\"$echodurum\"><font size=1>·&nbsp;$nick</a> <a href='sozluk.php?process=arkadasekle&n=$msgnick' title='arkadaþým olsun'>(+)</a> <a href='sozluk.php?process=dusmanekle&n=$msgnick' title='düþmaným olsun'>(-)</a></font><br>";
if ($ondurum == "on")
echo "$iptit<a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$msgnick\" title=\"$echodurum\"><font size=1>·&nbsp;$nick</a> <a href='sozluk.php?process=arkadasekle&n=$msgnick' title='arkadaþým olsun'>(+)</a> <a href='sozluk.php?process=dusmanekle&n=$msgnick' title='düþmaným olsun'>(-)</a><br>";
if ($ondurum == "wait")
echo "$iptit<a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$msgnick\" title=\"$echodurum\"><font size=1>·&nbsp;$nick</a> <a href='sozluk.php?process=arkadasekle&n=$msgnick' title='arkadaþým olsun'>(+)</a> <a href='sozluk.php?process=dusmanekle&n=$msgnick' title='düþmaným olsun'>(-)</a><br>";

}
}

?>

</td>
  </tr>
  </table></div></fieldset>
