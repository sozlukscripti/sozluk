<?
if (!$verified_user) die("just register yazarlar girebilir lan!");
?>
<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD class=tab>
            
           <DIV><A href="sozluk.php?process=privmsg">inbox</A></DIV></TD>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=cop">ayarlar</A></DIV></TD>
          <TD class=tab>
         <DIV><A href="sozluk.php?process=onlines">olan biten</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=gorunum">tema</A></DIV></TD>
         <TD class=tab>
            <TD class=tabsel>panpa</TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=dusmanlarim">bloke</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=modlog2">modlog</A></DIV></TD>
         <TD class=tab>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=arac">sub-ethna</A></DIV></TD>
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>

<td class="tabin">
<div style="width:600px;height:500px;overflow:scroll;overflow-x:hidden">
<fieldset><legend>panpa</legend>
<?
$sorgu=mysql_query("select * from rehber where kimin='$verified_user' and num='0' order by id desc");
$no=@mysql_num_rows($sorgu);
echo "<div>$no panpan var</div><br>";
while ($oku=mysql_fetch_array($sorgu)) {
$sorgu2=mysql_query("select * from online where nick='$oku[kim]'");
$bul=@mysql_result($sorgu2,0,'ondurum');
if ($bul=="on") {
 $durum="<font color=green>online</font>";
} else {
 $durum="<font color=red>offline</font>";
}
echo "<div><a href='sozluk.php?process=privmsg&islem=yenimsj&gkime=$oku[kim]'>$oku[kim]</a> <a href='sozluk.php?process=rehbersil&num=0&kim=$oku[kim]' title='listemden çýksýn'>(-)</a> $durum</div>";
}
?>
</fieldset>
</div>

</div>
