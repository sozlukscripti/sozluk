<?
if (!$verified_user) die("just register yazarlar girebilir lan!");
?>
<?php
//include("baglan.php");
//$sql=mysql_query("select * from user where nick='$verified_user'");
//while ($record = mysql_fetch_object($sql)) {
?>
<script  type="text/javascript" src="images/dinamikresim.js"></script>
<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
                    <TD class=tab>
            
           <DIV><A href="sozluk.php?process=privmsg">inbox</A></DIV></TD>
          <TD class=tab>
            <TD class=tabsel>ayarlar</TD>
          <TD class=tab>
         <DIV><A href="sozluk.php?process=onlines">olan biten</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=gorunum">tema</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=arkadaslarim">panpa</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=dusmanlarim">bloke</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=modlog2">modlog</A></DIV></TD>
          <TD class=tab>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=arac">sub-ethna</A></DIV></TD>
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>

<td class="tabin">
<?

if ($ucur) {
$sorgu = "SELECT yazar,id FROM mesajciklar WHERE `id` = '$ucur' and yazar = '$verified_user'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$id=$kayit["id"];
$sorgu = "DELETE FROM mesajciklar WHERE id = '$id' LIMIT 1";
mysql_query($sorgu);
echo "<div class=dash><center><b>(#$id) entry'iniz sistemden uçuruldu.</div>";
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
echo "lütfen mail adresinizi yazýnýz.";
exit;
}

$yemail =@$_POST["yemail"];
$ileti =@$_POST["ileti"];

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
<fieldset>
<div class=div1>

<fieldset><center><?
 $sorgu=mysql_query("select * from user where nick='$nick'");
 $nick=@mysql_result($sorgu,0,'nick');
 $avatar=@mysql_result($sorgu,0,'avatar');
 $cinsiyet=@mysql_result($sorgu,0,'cinsiyet');
 

  echo "<a href='sozluk.php?process=word&q=$nick' target=main>$nick</a><br> ";
  ?></center>
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
    <td><input type="submit" name="Submit" value="kaydet" class=but></td>
  </tr>
</table>
</form>

 <form action="" method="post">
<table width="376" border="0" class=dash vAlign=top>
  <tr>
    <td width="203">mail adresim buydu</td>
    <td width="15">:</td>
    <td width="144"><? echo "$email"; ?></td>
  </tr>
  <tr>
    <td>artik bu olsun</td>
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

<a href="javascript:od('sozluk.php?process=ilet',500,300)">[kisisel ileti girin]</a><br>


<form action="sozluk.php?process=iletiekle" method="post">
<input type="text" name="ileti">
<input class="but" type="submit" value="gonder">
</div>

    </td>

  </tr>

  

</table>


<br>
<fieldset class='div1'><legend>istatistiksel hedelerin</legend>
</legend>
<?

$sor = mysql_query("select yazar,statu from mesajciklar WHERE `yazar`='$verified_user' and `statu` = '' ");
$kac = mysql_num_rows($sor);
echo "<b><font size=1>entry sayiniz:</b> $kac<br>";

$sor = mysql_query("select yazar,statu from mesajciklar WHERE `yazar`='$verified_user' and `statu` = 'silindi' ");
$kac = mysql_num_rows($sor);
echo "<b>patlayan entry sayiniz:</b> $kac<br>";

$sor = mysql_query("select oy from oylar WHERE `entry_sahibi`='$verified_user' and oy = 2");
$garip = mysql_num_rows($sor);
echo "<b>toplam enteresan entry sayiniz:</b> $garip<br>";


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
</fieldset>
<br>
</fieldset>
<fieldset class='highlight'><legend>kiþisel bilgiler</legend>
</legend><?
$sorgu = "SELECT * FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){

while ($kayit=mysql_fetch_array($sorgulama)){
$nick=$kayit["nick"];
$sehir=$kayit["sehir"];
$isim=$kayit["isim"];
$bolum=$kayit["bolum"];
}
}

 echo " <b>isim:</b> '$isim'  <form action='sozluk.php?process=isimguncelle' method='post'><input type='text' name='isim'><input type='submit' value='güncelle' class='but'></form><br>
  
 <b>yasadigim sehir:</b> '$sehir'  
 <form action='sozluk.php?process=sehirguncelle' method='post'> <SELECT name=sehir id='sehir' class='ksel'>
	  	<option value='' ></option>
		<option value='Ýstanbul' >Ýstanbul
		<option value='Ýzmir' >Ýzmir
		<option value='Ankara' >Ankara
		<option value='Adana' >Adana
		<option value='Adýyaman' >Adýyaman
		<option value='Afyon' >Afyon
		<option value='Aksaray' >Aksaray
		<option value='Amasya' >Amasya
		<option value='Antalya' >Antalya
		<option value='Ardahan' >Ardahan
		<option value='Artvin' >Artvin
		<option value='Aydýn' >Aydýn
		<option value='Aðrý' >Aðrý
		<option value='Balýkesir' >Balýkesir
		<option value='Bartýn' >Bartýn
		<option value='Batman' >Batman
		<option value='Bayburt' >Bayburt
		<option value='Bilecik' >Bilecik
		<option value='Bingöl' >Bingöl
		<option value='Bitlis' >Bitlis
		<option value='Bolu' >Bolu
		<option value='Burdur' >Burdur
		<option value='Bursa' >Bursa
		<option value='Çanakkale' >Çanakkale
		<option value='Çankýrý' >Çankýrý
		<option value='Çorum' >Çorum
		<option value='Denizli' >Denizli
		<option value='Diyarbakýr' >Diyarbakýr
		<option value='Düzce' >Düzce
		<option value='Edirne' >Edirne
		<option value='Elazýð' >Elazýð
		<option value='Erzincan' >Erzincan
		<option value='Erzurum' >Erzurum
		<option value='Eskiþehir' >Eskiþehir
		<option value='Gaziantep' >Gaziantep
		<option value='Giresun' >Giresun
		<option value='Gümüþhane' >Gümüþhane
		<option value='Hakkari' >Hakkari
		<option value='Hatay' >Hatay
		<option value='Iðdýr' >Iðdýr
		<option value='Ýsparta' >Ýsparta
		<option value='Kahramanmaraþ' >Kahramanmaraþ
		<option value='Karabük' >Karabük
		<option value='Karaman' >Karaman
		<option value='Kars' >Kars
		<option value='Kastamonu' >Kastamonu
		<option value='Kayseri' >Kayseri
		<option value='Kýrklareli' >Kýrklareli
		<option value='Kilis' >Kilis
		<option value='Kocaeli' >Kocaeli
		<option value='Konya' >Konya
		<option value='Kütahya' >Kütahya
		<option value='Kýrýkkale' >Kýrýkkale
		<option value='Kýrþehir' >Kýrþehir
		<option value='Malatya' >Malatya
		<option value='Manisa' >Manisa
		<option value='Mardin' >Mardin
		<option value='Mersin' >Mersin
		<option value='Muðla' >Muðla
		<option value='Muþ' >Muþ
		<option value='Nevþehir' >Nevþehir
		<option value='Niðde' >Niðde
		<option value='Ordu' >Ordu
		<option value='Osmaniye' >Osmaniye
		<option value='Rize' >Rize
		<option value='Sakarya' >Sakarya
		<option value='Samsun' >Samsun
		<option value='Siirt' >Siirt
		<option value='Sinop' >Sinop
		<option value='Sivas' >Sivas
		<option value='Þanlýurfa' >Þanlýurfa
		<option value='Þýrnak' >Þýrnak
		<option value='Tekirdað' >Tekirdað
		<option value='Tokat' >Tokat
		<option value='Trabzon' >Trabzon
		<option value='Tunceli' >Tunceli
		<option value='Uþak' >Uþak
		<option value='Van' >Van
		<option value='Yalova' >Yalova
		<option value='Yozgat' >Yozgat
		<option value='Zonguldak' >Zonguldak
		<option value='Yurtdýþý' >Yurtdýþý</option>
			</select><input type='submit' value='güncelle' class='but'>
 </form>


 ";
 $tarih = date("Y-m-d");
 echo " bugünün tarihi: $tarih";
 ?></fieldset>
<br>
<div class=div1>
<fieldset><legend>çöp kutusu</legend>
entrylerini patlatilmis görmek istemiyorsan :<p>
(bkz: <a href=anka%20s%C3%B6zl%C3%BCk%20kurallar%C4%B1.html target=main>disiplin talimatý</font></a>)
</fieldset>
<br>
<br>

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
  <b>baþlýk:</b> $baslik<br>
  <b>entry:</b>$mesaj</b><BR>
  <b>patlatan:</b> <A href=\"sozluk.php?process=word&q=$silen\" title=\"$silen\"><font size=1><b>$silen</b></font></A> (<b><A  href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$silen&gkonu=$id patlayan entry\"><font size=1>msg</A></font></b>)<br>
  <b>sebep:</b> $silsebep<br>
  (<a href=sozluk.php?process=cp&ucur=$id>ben patlatayim</a>) - (<a href=sozluk.php?process=eduzenle&id=$id&sr=$sira&akillandim=$id>Düzelticem simdi!</a>)
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
Header("Location: http://www.ankasozluk.com/sozluk.php?process=refresh");
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