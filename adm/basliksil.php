<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<?
if ($baslik != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
if ($id and $sebep) {

$sorgu1 = "SELECT baslik FROM konucuklar WHERE `id` = '$id'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];


$sorgu = "DELETE FROM konucuklar WHERE id = '$id' LIMIT 1";
mysql_query($sorgu);
echo "($baslik) baþlýk silindi.<br>Baþlýða baðlý olan mesajcýklar silindi.";
$sorgu = "DELETE FROM mesajciklar WHERE sira = '$id'";
mysql_query($sorgu);


$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$sebep = strtolower($sebep);
$olay = "Baþlýk silindi.";
$mesaj = "<i>$baslik</i> Sebep: <b>$sebep</b>";

$sorgu = "INSERT INTO `history` ";
$sorgu .= "(`olay` , `mesaj` , `mod` , `tarih` , `gun` , `ay` , `yil` , `saat`)";
$sorgu .= " VALUES ";
$sorgu .= "('$olay','$mesaj','$verified_user','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
}
else if ($id) {
echo "
      <FORM name=mesform method=post action=>
      <TABLE class=dash cellSpacing=0 cellPadding=3 width=\"100%\" align=center
      border=0>
        <TBODY>
        <TR>
          <TD width=\"11%\" height=\"18\"><p>Silinme Sebebi</p>
            </TD>
          <TD width=\"89%\"><INPUT class=inp maxLength=50 size=35 name=sebep>
            (admin tarafýndan görüntülenecek) </TD>
            <input type=hidden name=sira value=$sira>
            <input type=hidden name=id value=$id>
        </TR>
          <TD>&nbsp;</TD>
          <TD><INPUT type=hidden value=gonder name=gonder> <INPUT class=buton id=kaydet type=submit value=Sil name=kaydet>
          </TD></TR></TBODY></TABLE>
      </FORM>
";
}
?>