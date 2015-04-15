
<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD class=tab>
            
           <TD class=tabsel>inbox</TD>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=cop">ayarlar</A></DIV></TD>
          <TD class=tab>
         <DIV><A href="sozluk.php?process=onlines">olan biten</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=gorunum">tema</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=arkadaslarim">panpa</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=dusmanlarim">bloke</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=modlog2">modlog</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=arac">sub-ethna</A></DIV></TD>
         <TD class=tab>


          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>

<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
<td class="tabin">
<?

echo "
<TABLE cellSpacing=3 cellPadding=3 width=\"100%\" align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top>
      <input class=\"but\" type=\"button\" name=\"ymsj\" value=\"yeni msj\" onclick=\"top.main.location.href='sozluk.php?process=privmsg&islem=yenimsj'\" accesskey=x>
  <input class=\"but\" type=\"button\" name=\"gmsj\" value=\"inbox\" onclick=\"top.main.location.href='sozluk.php?process=privmsg'\" accesskey=c>
  
  <input class=\"but\" type=\"button\" name=\"smsj\" value=\"outbox\" onclick=\"top.main.location.href='sozluk.php?process=privmsg&islem=sentmsg'\" accesskey=s>
";
if ($islem) {
if (file_exists("inc/$islem.php"))
include "inc/$islem.php";
else if (file_exists("$islem.php"))
include "inc/$islem.php";
else
echo "
Bu bölüm geçici olarak servis dýþý.";
}
else {
include "msjana.php";
}
echo "
    </TD>
</TR></TBODY>

</TABLE>
";

?>
</tab>