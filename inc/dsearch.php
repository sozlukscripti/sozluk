
<?

echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"300;URL=sozluk.php?process=dsearch&dsearch=resolve\">";

if ($q)
Header ("Location: sozluk.php?process=search&q=$q&sirala=$sirala");
$eid =@$_POST["eid"];
$eid = ereg_replace("#","",$eid);
if ($eid)
Header ("Location: sozluk.php?process=eid&eid=$eid");
if ($yazar)
Header ("Location: sozluk.php?process=yazar&yazar=$yazar");

if (!$q and !$eid and !$yazar and $dsearch != "resolve") {
echo "<div class=dash><center><b><img src=images/unlem.gif> Neye baktin ki ? Anlamadým!";
die;
}

?>
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
<STYLE type=text/css>BODY {
        MARGIN: 0px
}
</STYLE>
<SCRIPT language=javascript src="images/dsearch.js"></SCRIPT>
<META content="MSHTML 6.00.2800.1106" name=GENERATOR></HEAD>

<BODY class=bgleft>

<TABLE cellSpacing=0 cellPadding=0 width=205 border=0 class=highlight>
  <TBODY>
  <TR>
    <TD vAlign=top height=20>
      <FORM id=a name=a method=post target=main action=?process=dsearch>
      <TABLE cellSpacing=0 cellPadding=0 width=180 align=center border=0>
        <TBODY>
        <TR>
          <TD>
            <TABLE class=1pxcerceve2 cellSpacing=1 cellPadding=0 width=180
            border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE cellSpacing=1 cellPadding=0 width=175 align=center
                  border=0>
                    <TBODY>
                    <TR>
                      <TD class=cssNumarala colSpan=2><IMG height=4
                        src="spacer.gif" width=4></TD></TR>
                    <TR>
                      <TD class=cssNumarala colSpan=2>
                        <DIV align=left>esasl&#305; ara:</DIV></TD></TR>
                    <TR>
                      <TD class=cssNumarala colSpan=2><IMG height=1
                        src="spacer.gif" width=1></TD></TR>
                    <TR>
                      <TD class=cssNumarala width=47>kelime:</TD>
                      <TD width=150 height=20><INPUT class=inp id=key
                        style="WIDTH: 120px" maxLength=75 name=q></TD></TR>
                    <TR>
                      <TD class=cssNumarala>yazar:</TD>
                      <TD height=20><INPUT class=inp id=yazar
                        style="WIDTH: 120px" maxLength=75 name=yazar></TD></TR>
                    <TR>
                      <TD class=cssNumarala>#id:</TD>
                      <TD height=20><INPUT class=inp id=yazar
                        style="WIDTH: 120px" maxLength=75 name=eid></TD></TR>
                    <TR vAlign=bottom>
                      <TD class=cssNumarala colSpan=2 height=25>
                        <DIV align=left>Kriterim &#351;u olsun:</DIV></TD></TR>
                    <TR>
                      <TD class=cssNumarala colSpan=2><IMG height=1
                        src="spacer.gif" width=1></TD></TR>
                    <TR>
                      <TD colspan="2" class=cssNumarala><TABLE cellSpacing=0 cellPadding=0 width="100%"
border=0>
                        <TBODY>
                          <TR>
                            <TD width="17%"><INPUT type=radio value=1
                            name=sirala></TD>
                            <TD class=cssNumarala width="83%">yeniden eskiye </TD>
                          </TR>
                          <TR>
                            <TD><INPUT type=radio value=2 name=sirala></TD>
                            <TD class=cssNumarala width="83%">entrylisinden</TD>
                          </TR>
                          <TR>
                            <TD><INPUT type=radio CHECKED value=0 name=sirala></TD>
                            <TD class=cssNumarala>farketmez </TD>
                          </TR>
                        </TBODY>
                      </TABLE></TD>
                      </TR>
                    <TR>
                      <TD class=cssNumarala height=30>&nbsp;</TD>
                      <TD vAlign=bottom>
                        <DIV align=right>
                        <input type=hidden name=heyt value=eheheh>
                          <input type="submit" name="Submit" class="but" value="Tara">
                        </DIV></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></FORM></TD></TR></TBODY></TABLE>
<IFRAME
id=gToday:contrast:/takvim/agenda.js
style="Z-INDEX: 999; LEFT: -500px; VISIBILITY: visible; POSITION: absolute; TOP: 0px"
name=gToday:contrast:/takvim/agenda.js src="detay_ara_dosyalar/ipopeng.htm"
frameBorder=0 width=174 scrolling=no height=189></IFRAME>
<SCRIPT>document.frm.key.focus();</SCRIPT>
</BODY></HTML>