<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($yazarislem != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
if ($ok and $gnick) {
$gnick =@$_POST["gnick"];
$gnick = strtolower($gnick);
$sorgu = "SELECT * FROM user WHERE `nick` = '$gnick'";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$nick=$kayit["nick"];
$isim=$kayit["isim"];
$yetki=$kayit["yetki"];
$email=$kayit["email"];
$durum=$kayit["durum"];
$dt=$kayit["dt"];
$cinsiyet=$kayit["cinsiyet"];
$sehir=$kayit["sehir"];
$bolum=$kayit["bolum"];
$regip=$kayit["regip"];
//burasi modlog icin
if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust") {
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$tarih = "$gun/$ay/$yil";
$sorgu = "INSERT INTO history ";
$sorgu .= "(olay,mesaj,moderat,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('profil inceleme','$nick accountu incelendi','$verified_user','$tarih','$gun','$ay' ,'$yil','$saat')";
mysql_query($sorgu);}
//modlog bitti
#############################
if ($yetki == "admin")
$admin = "selected";
if ($yetki == "user")
$user = "selected";
if ($yetki == "gammaz")
$gammaz = "selected";
if ($yetki == "mod")
$mod = "selected";
if($yetki == "modust")
$modust = "selected";
#############################
if ($durum == "on")
$on = "selected";
if ($durum == "off")
$off = "selected";
if ($durum == "wait")
$wait = "selected";
if ($durum == "sus")
$sus = "selected";
############################
if ($cinsiyet == "f")
$f = "selected";
if ($cinsiyet == "m")
$m = "selected";
if ($cinsiyet == "mf")
$mf = "selected";
if ($cinsiyet == "fm")
$fm = "selected";
echo "
<form name=\"form1\" method=\"post\" action=\"sozluk.php?process=adm&islem=entrysilall\">
  <input name=\"Submit\" type=\"submit\" value=\"$nick nickine ait tüm entryleri sil!\">
  <input name=\"yazar\" type=\"hidden\" id=\"yazar\" value=\"$nick\">
</form>
<form method=post action=>
<table width=\"351\" border=\"0\">
  <tr>
    <td width=\"111\">Nick</td>
    <td width=\"9\">:</td>
    <td width=\"217\"><input name=\"nick\" type=\"text\" id=\"nick\" value=\"$nick\" readonly>
    </td>
  </tr>
  <tr>
    <td>Isim</td>
    <td>:</td>
    <td><input name=\"isim\" type=\"text\" id=\"isim\" value=\"$isim\"></td>
  </tr>
  <tr>
    <td>E-Mail</td>
    <td>:</td>
    <td><input name=\"email\" type=\"text\" id=\"email\" value=\"$email\"></td>
  </tr>
  <tr>
    <td>Doðuum T. </td>
    <td>:</td>
    <td><input name=\"dt\" type=\"text\" id=\"dt\" value=\"$dt\"></td>
  </tr>
  <tr>
    <td>Yetki</td>
    <td>:</td>
    <td><select name=\"yetki\" id=\"yetki\">
      <option value=\"user\" $user>kullan&#305;c&#305;</option>
      <option value=\"gammaz\" $gammaz>ispitci</option>
      <option value=\"mod\" $mod>co-mod</option>
    </select></td>
  </tr>
  <tr>
    <td>Durum</td>
    <td>:</td>
    <td><select name=\"durum\" id=\"durum\">
      <option value=\"on\" $on>yazar</option>
      <option value=\"off\" $off>çaylak</option>
      <option value=\"wait\" $wait>çömez</option>
            </select></td>
  </tr>
  <tr>
    <td>Cinsiyet</td>
    <td>:</td>
    <td>          <SELECT name=cinsiyet id=\"cinsiyet\">
          <OPTION value=f $f>kadin
            <OPTION value=m $m>erkek
            <option value=mf $mf>erkek gibi</option>
              <option value=fm $fm>kadin gibi</option>
    </SELECT>&nbsp;</td>
  </tr>
  <tr>
    <td>Þehir</td>
    <td>:</td>
    <td><input name=\"sehir\" type=\"text\" id=\"sehir\" value=\"$sehir\"></td>
  </tr>
  <tr>
	<td>Kayýtlý olduðu ip</td>
    <td>:</td>
    <td><input name=\"regip\" type=\"text\" id=\"regip\" value=\"$regip\" disabled=\"disabled\"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <input type=hidden name=okupdate value=ok>
    <td><input type=\"submit\" name=\"Submit\" value=\"Apdeyt\"></td>
  </tr>
</table>
</form>
";
}
}
}
else if ($okupdate) {
$nick =@$_POST["nick"];
$sifre =@$_POST["sifre"];
$isim =@$_POST["isim"];
$email =@$_POST["email"];
$yetki =@$_POST["yetki"];
$durum =@$_POST["durum"];
$dt =@$_POST["dt"];
$cinsiyet =@$_POST["cinsiyet"];
$sehir =@$_POST["sehir"];
$bolum =@$_POST["bolum"];
$regip =@$_POST["regip"];

if ($sifre)
$sifre = md5($sifre);

$sorgu = "UPDATE user SET email = '$email' WHERE nick='$nick'";
mysql_query($sorgu);

if ($sifre) {
$sorgu = "UPDATE user SET sifre = '$sifre' WHERE nick='$nick'";
mysql_query($sorgu);
}
$sorgu = "UPDATE user SET isim = '$isim' WHERE nick='$nick'";
mysql_query($sorgu);

$sorgu = "UPDATE user SET yetki = '$yetki' WHERE nick='$nick'";
mysql_query($sorgu);

$sorgu = "UPDATE user SET durum = '$durum' WHERE nick='$nick'";
mysql_query($sorgu);

$sorgu = "UPDATE user SET dt = '$dt' WHERE nick='$nick'";
mysql_query($sorgu);

$sorgu = "UPDATE user SET cinsiyet = '$cinsiyet' WHERE nick='$nick'";
mysql_query($sorgu);

$sorgu = "UPDATE user SET sehir = '$sehir' WHERE nick='$nick'";
mysql_query($sorgu);

$sorgu = "UPDATE user SET bolum = '$bolum' WHERE nick='$nick'";
mysql_query($sorgu);


echo "<center><b>$nick Apdeytýd.</center></b>";
}
else if (!$update) {
echo "
<img src=images/new.gif><a href=?process=adm&islem=yazarislem&update=ok>Kullanýcý düzenle</a>
<table width=\"601\" border=\"1\">
  <tr>
    <td width=\"170\"><div align=\"center\"><strong>NICK</strong></div></td>
    <td width=\"300\"><div align=\"center\"><strong>EMAIL</strong></div></td>
    <td width=\"120\"><div align=\"center\"><strong>DURUM</strong></div></td>
    <td width=\"100\"><div align=\"center\"><strong>YETKI</strong></div></td>
  </tr>
  ";
$sorgu = "SELECT * FROM user ORDER BY `id` desc LIMIT 200";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$nick=$kayit["nick"];
$email=$kayit["email"];
$durum=$kayit["durum"];
$yetki=$kayit["yetki"];
echo "<tr>
    <td><a href=\"sozluk.php?process=adm&islem=yazarislem&update=ok&gnick=$nick\">$nick</a></td>
    <td>$email</td>
    <td>$durum</td>
    <td>$yetki</td>
  </tr>";
}
}
echo "</table>";

}
else if ($update) {
$gnick =@$_GET["gnick"];
echo "
<form method=post action=>
<table width=\"306\" border=\"0\">
  <tr>
    <td width=\"116\">Yazar Nick</td>
    <td width=\"10\">:</td>
    <td width=\"173\"><input name=\"gnick\" type=\"text\" id=\"gnick\" value=\"$gnick\"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type=\"submit\" name=\"Submit\" value=\"Getir Bakam\"></td>
    <input type=hidden name=ok value=ok>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
";
}
?>