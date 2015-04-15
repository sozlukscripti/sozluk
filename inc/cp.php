<?


if ($ucur) {
$sorgu = "SELECT yazar,id FROM mesajciklar WHERE `id` = '$ucur' and yazar = '$verified_user'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$id=$kayit["id"];
$sorgu = "DELETE FROM mesajciklar WHERE id = '$id' LIMIT 1";
mysql_query($sorgu);
echo "<div class=dash><center><b>(#$id) entry'iniz sistemden uçuruldu.</div>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=copkutu\">";
die;
}
}
}

if (!$oks) {
$sorgu = "SELECT nick,email FROM user WHERE `nick`='$verified_user'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$email=$kayit["email"];
} //while
} // if
}
else {
// degiskenleri ata
if ($yemail == "") {
echo "Lütfen mail adresinizi yazýnýz.";
exit;
}

$yemail =@$_POST["yemail"];

$site = $_SERVER["HTTP_REFERER"];
$site = explode("/", $site);
$site = $site[2];


$nick = $verified_user;
/*$yemail = ereg_replace("þ","s",$yemail);
$yemail = ereg_replace("Þ","S",$yemail);
$yemail = ereg_replace("ç","c",$yemail);
$yemail = ereg_replace("Ç","C",$yemail);
$yemail = ereg_replace("ý","i",$yemail);
$yemail = ereg_replace("Ý","I",$yemail);
$yemail = ereg_replace("ð","g",$yemail);
$yemail = ereg_replace("Ð","G",$yemail);
$yemail = ereg_replace("ö","o",$yemail);
$yemail = ereg_replace("Ö","O",$yemail);
$yemail = ereg_replace("ü","u",$yemail);
$yemail = ereg_replace("Ü","U",$yemail);
$yemail = ereg_replace("Ö","O",$yemail);*/



$sorgu = "SELECT nick,email FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$nick=$kayit["nick"];
$email=$kayit["email"];
$sorgu = "UPDATE user SET email='$yemail' WHERE nick='$nick'";
mysql_query($sorgu);
echo "email adresin bilinmeyen sebeplerden dolayi (?) <b>$yemail</b> olarak deðiþtirildi.";
exit;
}
}
}
?>
<body>
<div class=div1>
<a href="sozluk.php?process=cp">kontrol panelim</a> | <a href="sozluk.php?process=entrylerim">yazdýklarým</a> | <a href="sozluk.php?process=arkadaslarim">arkadaslarým</a> | <a href="sozluk.php?process=dusmanlarim">düsmanlarým</a> | <a href="sozluk.php?process=yorumlarim">yorumlarým</a> | <a href="sozluk.php?process=gorunum">görünüm</a>
<fieldset>
<table width="500" border="0">
  <tr>
    <td>
    <form action="sozluk.php?process=passwd" method="post">
<table  class=dash vAlign=top width="376" border="0">

  <tr class=dash vAlign=top>
    <td width="203">eski þifreniz</td>
    <td width="15">:</td>
    <td width="144"><input name="esifre" type="password" id="esifre" class=inp></td>
  </tr>
  <tr>
    <td>yeni þifreniz</td>
    <td>:</td>
    <td><input name="ysifre" type="password" id="ysifre" class=inp></td>
  </tr>
  <tr>
    <td>tekrar yeni þifreniz</td>
    <td>:</td>
    <td><input name="ysifre2" type="password" id="ysifre2" class=inp></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <input type=hidden name=okpasswd value=ok>
    <td><input type="submit" name="Submit" value="Kaydet" class=but></td>
  </tr>
</table>
</form>

    </td>
    <td>
    <form action="" method="post">
<table width="376" border="0" class=dash vAlign=top>
  <tr>
    <td width="203">mail adresim buydu</td>
    <td width="15">:</td>
    <td width="144"><? echo "$email"; ?></td>
  </tr>
  <tr>
    <td>artýk bu olsun</td>
    <td>:</td>
    <td><input name="yemail" type="text" id="yemail" class=inp></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <input type=hidden name=oks value=ok>
    <td><input type="submit" name="Submit" value="degistir" class=but></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
    </td>
  </tr>
</table>

</div>
</fieldset>
<br>
<div class=div1>
<?

$sor = mysql_query("select yazar,statu from mesajciklar WHERE `yazar`='$verified_user' and `statu` = '' ");
$kac = mysql_num_rows($sor);
echo "<b><font size=1>entry sayiniz:</b> $kac<br>";

$sor = mysql_query("select yazar,statu from mesajciklar WHERE `yazar`='$verified_user' and `statu` = 'silindi' ");
$kac = mysql_num_rows($sor);
echo "<b>patlayan entry sayiniz:</b> $kac<br>";

$sor = mysql_query("select oy from oylar WHERE `entry_sahibi`='$verified_user' and oy = 1");
$arti = mysql_num_rows($sor);
echo "<b>toplam arti oy sayiniz:</b> $arti<br>";

$sor = mysql_query("select oy from oylar WHERE `entry_sahibi`='$verified_user' and oy = 0");
$eksi = mysql_num_rows($sor);
echo "<b>toplam eksi oy sayiniz:</b> $eksi<br>";

$ortalama = $arti - $eksi;
$toplam = $arti + $eksi;
echo "<b>toplam oy sayiniz:</b> $toplam<br>";
echo "<b>ortalama oy sayiniz:</b> $ortalama<br>";

?>
</div>
<div class=div1>


<?
$max = 20;

if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }

$alt = ($_GET["sayfa"] - 1)  * $max;

echo "
<OL>
";
$say = 0;
$sor = mysql_query("select * from mesajciklar WHERE `yazar`='$verified_user' and `statu` = 'silindi' ");
$w = mysql_num_rows($sor);

$listele = mysql_query("SELECT * FROM mesajciklar WHERE `yazar`='$verified_user' and `statu` = 'silindi' ORDER BY `id` desc limit $alt,$max");
if (mysql_num_rows($listele)>0){
while ($kayit=mysql_fetch_array($listele)) {

$id=$kayit["id"];
$sira=$kayit["sira"];
$mesaj=$kayit["mesaj"];
$updater=$kayit["updater"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$silen=$kayit["silen"];
$silsebep=$kayit["silsebep"];
$update=$kayit["update2"];
$updatesebep=$kayit["updatesebep"];
$ayazar = $yazar;

$yazarlink = ereg_replace("&","",$yazar); // adminlerden ~ kaldýrýyoruz
$yazartitle = ereg_replace("&","Administrator / ",$yazar); // adminlerden ~ kaldýrýyoruz

/*$link = ereg_replace("þ","s",$link);
$link = ereg_replace("Þ","S",$link);
$link = ereg_replace("ç","c",$link);
$link = ereg_replace("Ç","C",$link);
$link = ereg_replace("ý","i",$link);
$link = ereg_replace("Ý","I",$link);
$link = ereg_replace("ð","g",$link);
$link = ereg_replace("Ð","G",$link);
$link = ereg_replace("ö","o",$link);
$link = ereg_replace("Ö","O",$link);
$link = ereg_replace("ü","u",$link);
$link = ereg_replace("Ü","U",$link);
$link = ereg_replace("Ö","O",$link);

$mesaj = ereg_replace("Þ","þ",$mesaj);
$mesaj = ereg_replace("Ç","ç",$mesaj);
$mesaj = ereg_replace("Ý","i",$mesaj);
$mesaj = ereg_replace("Ð","ð",$mesaj);
$mesaj = ereg_replace("Ö","ö",$mesaj);
$mesaj = ereg_replace("Ü","ü",$mesaj);*/

$mesaj = strtolower($mesaj);

$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$mesaj);
$mesaj = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $mesaj);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=view&eid=\\1>#\\1</a>",$mesaj);

$uzunluk = 142;
if($mesaj && strlen($mesaj)>$uzunluk) {
$mesaj=preg_replace("/([^\n\r -]{".$uzunluk."})/i"," \\1\n<br />",$mesaj);
}

$sorgu1 = "SELECT * FROM konucuklar WHERE id = $sira";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];


$say++;

if (!$ayazar)
die;

echo "
  <LI value=$say>
  <DIV class=dash>
  <b>Baþlýk:</b> $baslik<br>
  $mesaj<BR>
  <b>Patlatan:</b> <A href=\"sozluk.php?process=word&q=$silen\" title=\"$silen\"><font size=1><b>$silen</b></font></A> (<b><A  href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$silen&gkonu=$id patlayan entry\"><font size=1>msg</A></font></b>)<br>
  <b>Sebep:</b> $silsebep<br>
  (<a href=sozluk.php?process=cp&ucur=$id>Önce davran</a>) - (<a href=http://ankasozluk.com/sozluk.php?process=eduzenle&id=$id&sr=$sira&akillandim=$id>Dületicem!</a>)
  ";
  echo "
  </DIV>
  <DIV class=div2 align=right><font size=1>(#$id) <B><A href=\"sozluk.php?process=word&q=$echoyazar\" title=\"$yazartitle\"><font size=1>$yazar</A></B>|$gun/$ay/$yil $saat
  </DIV><BR><BR>
  </li>
";

}
}


if ($tema and $process == "cp") {
$tema =@$_GET["tema"];
$sorgu = "SELECT tema,id FROM temalar WHERE `tema` = '$tema'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$dbtema=$kayit["tema"];
if ($dbtema == $tema) {
$sorgu = "UPDATE user SET tema = '$tema' WHERE `nick` ='$verified_user'";
mysql_query($sorgu);
Header("Location: sozluk.php?process=refresh");
}
else {
echo "Böyle bir tema yok ki ?";
die;
}
}
}
}


?>
</div>
<p>&nbsp;</p>
</body>