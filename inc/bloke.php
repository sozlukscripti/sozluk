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
            

            <TD class=tabsel>bloke</TD>

          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>

<td class="tabin">
<div style="width:600px;height:500px;overflow:scroll;overflow-x:hidden">
<fieldset><legend>blokeler</legend>
<?
$sorgu=mysql_query("select * from rehber where kimin='$verified_user' and num='1' order by id desc");
$no=@mysql_num_rows($sorgu);
echo "<div>$no msj blokeri var</div><br>";
while ($oku=mysql_fetch_array($sorgu)) {
$sorgu2=mysql_query("select * from online where nick='$oku[kim]'");
$bul=@mysql_result($sorgu2,0,'ondurum');
if ($bul=="on") {
 $durum="<font color=green>online</font>";
} else {
 $durum="<font color=red>offline</font>";
}
echo "<div><a href='sozluk.php?process=inbox&gkime=$oku[kim]'>$oku[kim]</a> <a href='sozluk.php?process=rehbersil&num=1&kim=$oku[kim]' title='listemden ��ks�n'>(-)</a> $durum</div>";
}
?>
</fieldset>
</div>

</div>
