<?
if (!$verified_user) die("just register yazarlar girebilir lan!");
?>
<?
if($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
{
?>

</SCRIPT>
<LINK href="images/dhtmlgoodies_calendar.css" 
rel=stylesheet type="text/css" media=screen></LINK>
<SCRIPT src="images/dhtmlgoodies_calendar.js" 
type=text/javascript></SCRIPT>
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
            <DIV><A href="sozluk.php?process=dusmanlarim">duþman</A></DIV></TD>
			<TD class=tabsel>modlog</TD>
            <TD class=tab>
            <DIV><A href="sozluk.php?process=yorumlarim">yorum alaný</A></DIV></TD>
			
          <TD class=tab style="WIDTH: 100%">&nbsp;</TD></TR></TBODY></TABLE></TD></TR>
<?
				if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_user == "modust") {
echo "<center><br><br><a  class=but type=submit title=\"yönetim\" target=\"main\" href=\"javascript:od('sozluk.php?process=adm&islem=modlogyazi',600,400)\">&nbsp;&nbsp;&nbsp;&nbsp;modlog yönetim diyalog penceresi&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</td><br><br></center>";
}
if ($verified_kat == "gammaz") {
echo "<center><br><br><a  class=but type=submit title=\"yönetim\" target=\"main\" href=\"javascript:od('sozluk.php?process=adm&islem=modlogyazi',600,400)\">&nbsp;&nbsp;&nbsp;&nbsp;modlog yönetim diyalog penceresi&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</td><br><br></center>";
}
?>


  <TR>
    <TD class=tabin>
<?
if($verified_user) {
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$btarih= date("d/m/Y");
$tarih =@$_POST["tarih"];




echo"bugünün tarihi $btarih <br> ";

echo"liste tarihi: $tarih ";

if($_POST["tarih"]) {
$sorgu = "select * from history where `tarih`='$tarih'  ORDER BY id desc";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)==0){
echo"secilen tarihte moderasyon calismamis. ense yapmis...";
die;
}
} else {
$sorgu = "select * from history where `tarih`='$btarih' ORDER BY id desc";
}
echo "
<TABLE class=msg cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
    <tr>
    <td colspan=\"4\"></td>
  </tr>
  <tr>
    <TD noWrap>
                  <FORM action=\"\" method=post><INPUT readOnly size=11 
                  value=\"$gun/$ay/$yil\" name=tarih> <A 
                  onclick=\"displayCalendar(document.forms[0].tarih,'dd/mm/yyyy',this)\" 
                  href=\"javascript:;\">tarih seç</A> <INPUT class=but type=submit value=getir> 
                  <DIV id=debug></DIV></FORM></TD>
  </tr>
  <tr>
    
    <td width=\"50\"><strong>an</strong></td>
    <td width=\"150\"><div align=\"center\"><strong>mod/adm</strong></div></td>
    <td width=\"184\"><div align=\"center\"><strong>olay</strong></div></td>
	    <td width=\"384\"><div align=\"center\"><strong>aciklama</strong></div></td>

  </tr>
  <tr>
";

$sorgulama = mysql_query($sorgu);
while ($kayit=mysql_fetch_array($sorgulama)){
$id=$kayit["id"];
$olay=$kayit["olay"];
$mesaj=$kayit["mesaj"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$moderat=$kayit["moderat"];
$tarih=$kayit["tarih"];
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1><b>#\\1</b></a>",$mesaj);
echo "
      <tr>
        <td width=\"50\">&nbsp;$saat</td>
        <td width=\"150\"><a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$moderat\">&nbsp;$moderat</a></td>
        <td width=\"180\">&nbsp;$olay</td>
		<td width=\"380\">&nbsp;$mesaj</td>
      </tr>
";
}
echo"
 </tbody>
    </table>";
	
	}
	

//tonymontana if sonu burda mod ve admýnler harýcý gýrmesýn
}
else

echo "özel admin ve moderator bölgesi";	
?>
 </tr>
    </table></TD>
  </TR></TBODY></TABLE>