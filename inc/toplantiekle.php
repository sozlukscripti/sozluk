<?
include "config.php";
if (!$verified_user) {
die("sen bi git cay koy bir zahmet"); }
if ($verified_durum == "off" or $verified_durum == "wait")
die("malesef yazarlýðýnýz onaylanana kadar bu fasilitelerden yararlanamýyorsunuz.");
echo "
<fieldset><legend><i>Zirvecinin El Kitabý</i></legend>
<b>i.</b> Zirve'nin net tarihini ve yerini belirt.<br>
<b>ii. </b>Olusabilecek herhangi bir aksilikte(edit, iptal durumlarý vs.) herhangi bir yöneticiye haber ver.<br>
<b>iii. </b>Zirve hakkýnda bilinmesi gereken detaylarý, açýklamaya ekle.<br>
<b>iv. </b>Þayet bir msn zirvesi ise Þehirler bölümünden \"sanal alem\" seçeneðini kullan.<br><br>
<td align='left'><i>- $sitename -</i></td><br><br>";
 ?>
 </fieldset>
<?
// rdzklng insaat 4-2007
if ($_POST['ok'])  {

if ($zirve =="" || $sehir =="" || $detay=="") {
die("bos yer býraktýn"); }

$zirve =@$_POST["zirve"];
$sehir =@$_POST["sehir"];
$detay =@$_POST["detay"];


$zirve = ereg_replace(">","<br>",$zirve);
$zirve = ereg_replace("ç","c",$zirve);
$zirve = ereg_replace("ð","g",$zirve);
$zirve = ereg_replace("ý","i",$zirve);
$zirve = ereg_replace("ö","o",$zirve);
$zirve = ereg_replace("ü","u",$zirve);
$sehir = ereg_replace(">","<br>",$sehir);
$detay = ereg_replace(">","<br>",$detay);


$tarih = date("Y-m-d/H:i");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("G:i");

$sorgu = "INSERT INTO zirvebox ";
$sorgu .= "(detay,zirve,sehir,yazar,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$detay','$zirve','$sehir','$verified_user','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
echo "$zirve eklendi<br><br>
<a href='sozluk.php?process=rand'>Sözlüge Geri Dön</a>"
;
}
else {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Zirve Ekle</title>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>
</head>

<body>
<form METHOD=post action>
<fieldset><legend>Ortama Ak<legend>
<center>
<strong>Zirveye Seçtiðin Ýsim:</strong><br>
<input type="text" name="zirve" size="30"><br>
<strong>Zirve Þehrini Seçiniz:</strong><br>
<SELECT name="sehir" class="Input" >
          <OPTION value="SANAL ALEM">SANAL ALEM</OPTION>
          <OPTION value="ADANA">ADANA</OPTION>
          <OPTION value="ADIYAMAN">ADIYAMAN</OPTION>
          <OPTION value="AFYON">AFYON</OPTION>
          <OPTION value="AÐRI">AÐRI</OPTION>
          <OPTION value="AKSARAY">AKSARAY</OPTION>
          <OPTION value="AMASYA">AMASYA</OPTION>
          <OPTION value="ANKARA">ANKARA</OPTION>
          <OPTION value="ANTALYA">ANTALYA</OPTION>
          <OPTION value="ARDAHAN">ARDAHAN</OPTION>
          <OPTION value="ARTVÝN">ARTVÝN</OPTION>
          <OPTION value="AYDIN">AYDIN</OPTION>
          <OPTION value="BALIKESÝR">BALIKESÝR</OPTION>
          <OPTION value="BARTIN">BARTIN</OPTION>
          <OPTION value="BATMAN">BATMAN</OPTION>
          <OPTION value="BAYBURT">BAYBURT</OPTION>
          <OPTION value="BÝLECÝK">BÝLECÝK</OPTION>
          <OPTION value="BÝNGÖL">BÝNGÖL</OPTION>
          <OPTION value="BÝTLÝS">BÝTLÝS</OPTION>
          <OPTION value="BOLU">BOLU</OPTION>
          <OPTION value="BURDUR">BURDUR</OPTION>
          <OPTION value="BURSA">BURSA</OPTION>
          <OPTION value="ÇANAKKALE">ÇANAKKALE</OPTION>
          <OPTION value="ÇANKIRI">ÇANKIRI</OPTION>
          <OPTION value="ÇORUM">ÇORUM</OPTION>
          <OPTION value="DENÝZLÝ">DENÝZLÝ</OPTION>
          <OPTION value="DÝYARBAKIR">DÝYARBAKIR</OPTION>
          <OPTION value="DÜZCE">DÜZCE</OPTION>
          <OPTION value="EDÝRNE">EDÝRNE</OPTION>
          <OPTION value="ELAZIÐ">ELAZIÐ</OPTION>
          <OPTION value="ERZÝNCAN">ERZÝNCAN</OPTION>
          <OPTION value="ERZURUM">ERZURUM</OPTION>
          <OPTION value="ESKÝÞEHÝR">ESKÝÞEHÝR</OPTION>
          <OPTION value="GAZÝANTEP">GAZÝANTEP</OPTION>
          <OPTION value="GÝRESUN">GÝRESUN</OPTION>
          <OPTION value="GÜMÜÞHANE">GÜMÜÞHANE</OPTION>
          <OPTION value="HAKKARÝ">HAKKARÝ</OPTION>
          <OPTION value="HATAY" >HATAY</OPTION>
          <OPTION value="IÐDIR">IÐDIR</OPTION>
          <OPTION value="ISPARTA">ISPARTA</OPTION>
          <OPTION value="ÝÇEL">ÝÇEL</OPTION>
          <OPTION value="ÝSTANBUL">ÝSTANBUL</OPTION>
          <OPTION value="ÝZMÝR">ÝZMÝR</OPTION>
          <OPTION value="KAHRAMANMARAÞ">KAHRAMANMARAÞ</OPTION>
          <OPTION value="KARABÜK">KARABÜK</OPTION>
          <OPTION value="KARAMAN">KARAMAN</OPTION>
          <OPTION value="KARS">KARS</OPTION>
          <OPTION value="KASTAMONU">KASTAMONU</OPTION>
          <OPTION value="KAYSERÝ">KAYSERÝ</OPTION>
          <OPTION value="KIBRIS">KIBRIS</OPTION>
          <OPTION value="KIRIKKALE">KIRIKKALE</OPTION>
          <OPTION value="KIRKLARELÝ">KIRKLARELÝ</OPTION>
          <OPTION value="KIRÞEHÝR">KIRÞEHÝR</OPTION>
          <OPTION value="KÝLÝS">KÝLÝS</OPTION>
          <OPTION value="KOCAELÝ">KOCAELÝ</OPTION>
          <OPTION value="KONYA">KONYA</OPTION>
          <OPTION value="KÜTAHYA" selected >KÜTAHYA</OPTION>
          <OPTION value="MALATYA">MALATYA</OPTION>
          <OPTION value="MANÝSA">MANÝSA</OPTION>
          <OPTION value="MARDÝN">MARDÝN</OPTION>
          <OPTION value="MUÐLA">MUÐLA</OPTION>
          <OPTION value="MUÞ">MUÞ</OPTION>
          <OPTION value="NEVÞEHÝR">NEVÞEHÝR</OPTION>
          <OPTION value="NÝÐDE">NÝÐDE</OPTION>
          <OPTION value="ORDU">ORDU</OPTION>
          <OPTION value="OSMANÝYE">OSMANÝYE</OPTION>
          <OPTION value="RÝZE">RÝZE</OPTION>
          <OPTION value="SAKARYA">SAKARYA</OPTION>
          <OPTION value="SAMSUN">SAMSUN</OPTION>
          <OPTION value="SÝÝRT">SÝÝRT</OPTION>
          <OPTION value="SÝNOP">SÝNOP</OPTION>
          <OPTION value="SÝVAS">SÝVAS</OPTION>
          <OPTION value="ÞANLIURFA">ÞANLIURFA</OPTION>
          <OPTION value="ÞIRNAK">ÞIRNAK</OPTION>
          <OPTION value="TEKÝRDAÐ">TEKÝRDAÐ</OPTION>
          <OPTION value="TOKAT">TOKAT</OPTION>
          <OPTION value="TRABZON">TRABZON</OPTION>
          <OPTION value="TUNCELÝ">TUNCELÝ</OPTION>
          <OPTION value="UÞAK">UÞAK</OPTION>
          <OPTION value="VAN">VAN</OPTION>
          <OPTION value="YALOVA">YALOVA</OPTION>
          <OPTION value="YOZGAT">YOZGAT</OPTION>
          <OPTION value="ZONGULDAK">ZONGULDAK</OPTION>
        </SELECT> <br>
		<strong>Detay:</strong><br>
		<textarea name="detay" rows=3 cols=10 wrap="off"></textarea><br>
		
		<br>
		<div align="left"><input type="submit" value="ortam budur" class="but" name="ok"></div><br>
		 
		
</fieldset>
<div class='copyright' align='center'>Akýllý uslu zirveler düzenle. Coþup "hey hakkari'de kartopu oynuyoruz zirvesi" gibi atraksiyonlara girme. güzel güzel oyna. Organizasyonlar organizatörün sorumluluðu altýndadýr.
Olasý herhangi ters bir durumda dpu sozluk ltd sti hicbir mesuliyet kabul etmez. bilakis kahkaha ile güler.</div>
<br>
<br>
<div class='copyright' align='center'>2009 (C) <?=$sitename?></div>

</form>
</body>
</html>
<? } ?>
