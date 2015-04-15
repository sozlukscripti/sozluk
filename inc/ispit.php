<SCRIPT src="images/new.js" type=text/javascript></SCRIPT>
<?

if ($verified_kat != "gammaz")
die;

if ($sebep and $ok and $id or $text) {
$sorgu1 = "SELECT id,statu FROM mesajciklar WHERE `id` = '$id'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$statu=$kayit2["statu"];

$sorgu = "UPDATE mesajciklar SET `statu` = 'ispit' WHERE id='$id'";
mysql_query($sorgu);
$sorgu = "UPDATE mesajciklar SET `silen` = '$verified_user' WHERE id='$id'";
mysql_query($sorgu);
$sorgu = "UPDATE mesajciklar SET `silsebep` = '$sebep' WHERE id='$id'";
mysql_query($sorgu);



echo "<center><font size=2><img src=images/unlem.gif> #$id silindi ve onaylanmak üzere ispit listesine gönderildi.</center>";
die;
}
else {
echo "
                <FORM name=mesform method=post action=>
      <TABLE class=dash cellSpacing=0 cellPadding=3 width=\"100%\" align=center
      border=0>
        <TBODY>
        <TR>
<TD width=\"11%\" height=\"18\"><p>ispit sebebi</p>
            </TD>
          <TD width=\"89%\"><INPUT class=inp maxLength=50 size=35 name=sebep>
            (admin ve modlar tarafýndan görüntülenecek) </TD>
           <td>&nbsp;</td>
    <td><input type=hidden name=sira value=$sr>
        <input type=hidden name=id value=$id>
        <INPUT type=hidden value=gonder name=gonder>
        </TR>
          <TD>&nbsp;</TD></tr>
<tr>
          <TD><input type=hidden name=ok value=ok> <INPUT class=buton id=kaydet type=submit value=ISPITLE name=kaydet>
          </TD></TR></TBODY></TABLE>
      </FORM>
";
}
?>