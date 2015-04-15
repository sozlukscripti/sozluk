<SCRIPT src="images/new.js" type=text/javascript></SCRIPT>
<?
$sorgu1 = "SELECT id,sira,statu FROM konucuklar WHERE `id` = '$sr'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$statu=$kayit2["statu"];

if ($statu == "silindi") {
echo "<center><font size=2><img src=images/unlem.gif> Bu entry'in bagli oldugu baslik ucurulmus.</center>";
die;
}

$sorgu1 = "SELECT id,statu FROM mesajciklar WHERE `id` = '$id'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$statu=$kayit2["statu"];

if ($statu == "wait" and $verified_kat != "admin") {
echo "<center><font size=2><img src=images/unlem.gif>Bir cömez bu hareketi yapamaz caným.</center>";
die;
}


if ($ok and $mesaj) {
$id = htmlspecialchars(strip_tags($_POST["id"]));
$mesaj = htmlspecialchars(strip_tags($_POST["mesaj"]));
$sebep = htmlspecialchars(strip_tags($_POST["sebep"]));

$mesaj = ereg_replace("&lt","(",$mesaj);
$mesaj = ereg_replace("&gt",")",$mesaj);
$mesaj = ereg_replace("<","(",$mesaj);
$mesaj = ereg_replace(">",")",$mesaj);
$mesaj = ereg_replace("\n","<br>",$mesaj);
$mesaj = ereg_replace("'","`",$mesaj);
$tarih = date("d/m/Y G:i");
$sorgu = "UPDATE mesajciklar SET `update` = '$tarih' WHERE id='$id'";
mysql_query($sorgu);

$sorgu = "UPDATE mesajciklar SET `updater` = '$verified_user' WHERE id='$id'";
mysql_query($sorgu);


if ($verified_kat == "modust" or $verified_kat == "admin") {
$sorgu1 = "SELECT baslik FROM konucuklar WHERE `id` = '$id'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$sebep = strtolower($sebep);

}

if ($sebep) {
$sorgu = "UPDATE mesajciklar SET `updatesebep` = '$sebep' WHERE id='$id'";
mysql_query($sorgu);
}

$sorgu = "UPDATE mesajciklar SET mesaj = '$mesaj' WHERE id='$id'";
mysql_query($sorgu);

if ($akillandim) {
$sorgu = "UPDATE mesajciklar SET statu = 'akillandim' WHERE id='$id'";
mysql_query($sorgu);
echo "<center><font size=2><img src=images/unlem.gif> Entry önceden patlatýldýðý için yayýna girmek için admin onayýna sunuldu.</center>";
}
else {
$sorgu = "UPDATE mesajciklar SET statu = '' WHERE id='$id'";
mysql_query($sorgu);
}

if ($yazar != $verified_user) {
$sorgu = "SELECT id,baslik FROM konucuklar WHERE id='$sr'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$baslik=$kayit["baslik"];
}
}
else {
echo "yok lan";
}
$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
//burasi modlog icin
if ($verified_kat == "admin" or $verified_kat == "modust") {
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$tarih = "$gun/$ay/$yil";
$sorgu = "INSERT INTO history ";
$sorgu .= "(olay,mesaj,moderat,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('entry duzenle','#$id nolu entry duzenlendi','$verified_user','$tarih','$gun','$ay' ,'$yil','$saat')";
mysql_query($sorgu);}
//modlog bitti


$konu = "<img src=images/unlem.gif> entry\'iniz düzenlendi!";
$system = "SYSTEM";
$yazi = "
<br><i>$baslik</i> basligina yazdiginiz <a href=sozluk.php?process=eid&eid=$id>#$id</a> numarali entry\'iniz yöneticiler tarafindan düzenlenmiþtir.
<br><br>Sebep: $sebep <br><br>(bkz: <a href=sozluk.php?process=word&q=$baslik>$baslik</a>)
";
$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$yazar','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

}

echo "<center>entry düzenlendi.</center>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=eid&eid=$id\">
";
}
else {
if ($id) {
$sorgu = "SELECT * FROM mesajciklar WHERE `id` = '$id' ORDER BY `tarih`";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
$mesaj=$kayit["mesaj"];
$yazar=$kayit["yazar"];
if ($yazar != $verified_user and $verified_kat != "admin" and $verified_kat != "modust") {
echo "Hop bilader ?";
die;
}
$mesaj = ereg_replace("<br>","\n",$mesaj);
include("kufurs.php");
echo "
<form method=post action=>
  <table width=\"100%\" align=\"left\" class=\"dash\">
    <tr>
      <td colspan=\"2\">
<div style=\"float:left\">
<input class=\"but\" type=\"button\" name=\"bkz\" value=\"(bkz: )\" onclick=\"hen('aciklama','(bkz: ',')')\" accesskey=x>
<input class=\"but\" type=\"button\" name=\"bkz\" value=\"(gbkz: )\" onclick=\"hen('aciklama','(gbkz: ',')')\" accesskey=c>
<input class=\"but\" type=\"button\" name=\"bkz\" value=\"*\" onclick=\"hen('aciklama','(u: ',')')\" accesskey=v>
<input class=\"but\" type=\"button\" name=\"bkz\" value=\"-s!-\" onclick=\"hen('aciklama','--- (gbkz: spoiler) ---\n\n','--- (gbkz: spoiler) ---')\" accesskey=s> </div><div style=\"clear:both;\"></div>
          </td>
    </tr>
    <tr>
      <td colspan=\"2\">
                  <textarea id=\"aciklama\" name=\"mesaj\" rows=\"8\" style=\"width:100%;\">$mesaj</textarea>
          </td>
    </tr>
<tr>
<td width=\"788\">
<input id=\"kaydet\" class=\"but\" type=\"submit\" name=\"kaydet\" value=\"düzelt\">
<input type=\"hidden\" name=\"ok\" value=\"kaydet\">
<input type=\"hidden\" name=\"yazar\" value=\"$yazar\">
<input type=\"hidden\" name=\"id\" value=\"$id\">
<input type=\"hidden\" name=\"akillandim\" value=\"$akillandim\">
<input type=\"hidden\" name=\"sr\" value=\"$sr\">

</td>
<td width=\"90\" align=\"right\" valign=\"top\">

</td>
</tr>
    <tr>
<input type=hidden name=id value=$id>
      <td valign=\"top\"  colspan=\"2\"> 
     </tr>
  </table>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
";
}
}
}
}

?>