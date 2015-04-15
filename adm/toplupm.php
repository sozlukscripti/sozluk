<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($duyurumsj != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
$aciklama =@$_POST["aciklama"];
$kime =@$_POST["kime"];
$ok =@$_POST["ok"];

if ($ok and $kime and $aciklama) {
$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$aciklama = ereg_replace("<","(",$aciklama);
$aciklama = ereg_replace(">",")",$aciklama);
$aciklama = ereg_replace("\n","<br>",$aciklama);
$aciklama = strtolower($aciklama);


$konu = "<img src=images/unlem.gif> sözlük mesajý";
$aciklama = strtolower($aciklama);

if ($kime == "all")
$sorgu = "SELECT email,nick,durum FROM user WHERE durum != 'sus'";
if ($kime == "gammaz")
$sorgu = "SELECT email,nick,yetki FROM user WHERE yetki = 'gammaz'";
if ($kime == "mods")
$sorgu = "SELECT email,nick,yetki FROM user WHERE yetki = 'mod' or yetki = 'admin' or yetki = 'modust'";
if ($kime == "yazars")
$sorgu = "SELECT email,nick,durum FROM user WHERE durum = 'on'";
if ($kime == "okurs")
$sorgu = "SELECT email,nick,durum FROM user WHERE durum = 'off'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_assoc($sorgulama)){
$nick=$kayit["nick"];
$email=$kayit["email"];

$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$nick','$konu','$aciklama','sözlük robotu','$tarih','2','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

$saydir++;
}
}
echo "<center>$saydir Ki\$iye Gönderildi. .";
}
else {

?>
<form name="form1" method="post" action="">
  <p>
    <select name="kime" id="kime">
      <option value="all">Herkes</option>
      <option value="mods">Modlar</option>
<option value="gammaz">Gammazlar</option>
      <option value="yazars">Yazarlar</option>
      <option value="okurs">Okurlar</option>
    </select>
    <br>
    <textarea name="aciklama" cols="100" rows="6" wrap="VIRTUAL" id="aciklama"></textarea>
    <br>
    <input type=hidden name=ok value=ok>
    <input type="submit" name="Submit" value="Duyduk Duymadýk Demesinler">
</p>
</form>
<?
}
?>