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
            <DIV><A href="sozluk.php?process=dusmanlarim">düþman</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=modlog2">modlog</A></DIV></TD>
         <TD class=tab>
            <TD class=tabsel>yorum alaný</TD>
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>

<td class="tabin">
<table>
<tr>
<td>
<fieldset><legend>Yorum Alaný</legend>
<?
$sorgu=mysql_query("select * from yorum where kime='$verified_user'");
$kac=@mysql_num_rows($sorgu);
echo "<div align=center>Toplam $kac adet yorumunuz var</div>";
while ($oku=mysql_fetch_array($sorgu)) {
?>
<table width="100%" border="0">
 <tr>
  <td><a href='#' onclick="window.open('sozluk.php?process=eid&eid=<?=$oku[num]?>','yeni','width=700, height=300,scrollbar=1,navbar=0,toolbar=0');" class="title">#<?=$oku[num]?></a> numaralarý entry'nize <a href="sozluk.php?process=yenimsj&gkime=<?=$oku[kimden]?>"><?=$oku[kimden]?></a> yorum yapmýþtýr.</td>
 </tr>
 <tr>
  <td><?=$oku[yorum]?></td>
 </tr>
 <tr>
  <td align="right"><a href="sozluk.php?process=yorumsil&id=<?=$oku[id]?>">anladim ve silmek istiyorum</a></td>
 </tr>
</table><br>
<?
}
?>
</fieldset>
</div>
</td>
</tr>
</table>
