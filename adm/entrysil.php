<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<?
if ($entry != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
if ($id and $sebep and $yazar and $sira) {
$sebep =@$_POST["sebep"];
$aciklama =@$_POST["aciklama"];
$yazar =@$_POST["yazar"];
$id =@$_POST["id"];
$sira =@$_POST["sira"];

$sorgu1 = "SELECT baslik,id FROM konucuklar WHERE `id` = '$sira'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];

$sorgu1 = "SELECT mesaj,id FROM mesajciklar WHERE `sira` = '$sira'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$mesaj=$kayit2["mesaj"];

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$sebep = strtolower($sebep);
$olay = "Entry silindi.";
$mesaj = "$baslik -> <i>$mesaj</i> <b>[$yazar]</b> Sebep: <b>$sebep</b>";

$sorgu = "INSERT INTO `history` ";
$sorgu .= "(`olay` , `mesaj` , `mod` , `tarih` , `gun` , `ay` , `yil` , `saat`)";
$sorgu .= " VALUES ";
$sorgu .= "('$olay','$mesaj','$verified_user','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

/* $yazi = "
<br><i>$baslik</i> basligina yazdiginiz $id numarali entry\'iniz yöneticiler tarafindan silinmiþtir.
<br><br>Sebep: $sebep <br><br>Açýklama: $aciklama
";
$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$yazar','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
*/

$sorgu = "UPDATE mesajciklar SET `statu` = 'silindi' WHERE id='$id'";
mysql_query($sorgu);
echo "$id silinenler listesine eklendi.";
}
else if ($id) {
$sorgu = "SELECT id,mesaj,yazar,sira FROM mesajciklar WHERE id = '$id'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
$sira=$kayit["sira"];
$mesaj=$kayit["mesaj"];
$yazar=$kayit["yazar"];
$mesaj = substr ($mesaj, 0, 60);
echo "
      <FORM name=mesform method=post action=>
      <TABLE class=dash cellSpacing=0 cellPadding=3 width=\"100%\" align=center
      border=0>
        <TBODY>
        <TR>
          <TD height=\"18\">&nbsp;</TD>
          <TD>$mesaj... (Yazar: $yazar)</TD>
        </TR>
        <TR>
          <TD width=\"11%\" height=\"18\"><p>Silinme Sebebi</p>
            </TD>
          <TD width=\"89%\"><INPUT class=inp maxLength=50 size=35 name=sebep>
            (admin tarafýndan görüntülenecek) </TD>
            <input type=hidden name=yazar value=$yazar>
            <input type=hidden name=sira value=$sira>
            <input type=hidden name=id value=$id>
        </TR>
          <TD>&nbsp;</TD>
          <TD><INPUT type=hidden value=gonder name=gonder> <INPUT class=buton id=kaydet type=submit value=Sil name=kaydet>
          </TD></TR></TBODY></TABLE>
      </FORM>
";
}
}
}
?>