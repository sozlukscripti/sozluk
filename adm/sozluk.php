<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($sozluk != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}

if ($ok and $site and $reg) {
$site =@$_POST["site"];
$reg =@$_POST["reg"];
$sorgu = "UPDATE ayar SET site = '$site'";
mysql_query($sorgu);
$sorgu = "UPDATE ayar SET reg = '$reg'";
mysql_query($sorgu);
echo "Site ayarlarý Apdeyt edildi.";
}
else {
?>
<form method=post action=>
<table width="428" border="0">
  <tr>
    <td width="135">Site</td>
    <td width="8">:</td>
    <td width="263"><select name="site" id="site">
      <option value="on" selected>Açýk</option>
      <option value="off">Kapalý</option>
      <option value="tech">Bakýmda</option>
      <option value="bakimda">Kullanicilar Ýçin</option>
    </select></td>
  </tr>
  <tr>
    <td>Yazar alýmý </td>
    <td>:</td>
    <td><select name="reg" id="reg">
      <option value="off" selected>Açýk</option>
      <option value="on">Kapalý</option>
            </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Apdeyt"></td>
<input type=hidden name=ok value=ok>
  </tr>
</table>
</form>
<? } ?>