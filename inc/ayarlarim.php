</br>
</br>
<b><font size="3" color="#B7310B" margin: 5px;>hesabým</font></b>
</br>
</br>
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
            
            <TD class=tabsel>hesap bilgilerim</TD>

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

<div class=div1>

<center><?
 $sorgu=mysql_query("select * from user where nick='$nick'");
 $nick=@mysql_result($sorgu,0,'nick');
 $avatar=@mysql_result($sorgu,0,'avatar');
 $cinsiyet=@mysql_result($sorgu,0,'cinsiyet');
 

  echo " ";
  ?></center>
<table width="500" border="0">
  <tr>
    <td>
    <form action="sozluk.php?process=passwd" method="post">
<table  class=dash vAlign=top width="376" border="0">

  <tr class=dash vAlign=top>
    <td width="144">eski þifreniz</br><input name="esifre" type="password" id="esifre" class=inp></td>
  </tr>
  <tr>
    <td>yeni þifreniz</br><input name="ysifre" type="password" id="ysifre" class=inp></td>
  </tr>
  <tr>
    <td>tekrar þifre</br><input name="ysifre2" type="password" id="ysifre2" class=inp></td>
  </tr>
  <tr>
    <input type=hidden name=okpasswd value=ok>
    <td><input type="submit" name="Submit" value="kaydet" class=but></td>
  </tr>
</table>
</form>

 <form action="" method="post">
<table width="376" border="0" class=dash vAlign=top>
  <tr>

    <td>yeni mail </br><input name="yemail" type="text" id="yemail" placeholder="<? echo "$email"; ?>" class=inp></td>
  </tr>
  <tr>
    <input type=hidden name=oks value=ok>
    <td><input type="submit" name="Submit" value="degistir" class=but></td>
  </tr>
  <tr>

  </tr>

</table>
</form>





</div>

    </td>

  </tr>

  

</table>




<?
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

 echo " adýnýz soyadýnýz </br> <form action='sozluk.php?process=isimguncelle' method='post'><input type='text' name='isim' placeholder='$isim'></br><input type='submit' value='güncelle' class='but'></form><br>
  
bulunduðunuz yer  
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
			</select></br><input type='submit' value='güncelle' class='but'>
 </form>


 ";
 $tarih = date("Y-m-d");
 echo "</br></br><a href=\"javascript:od('sozluk.php?process=ilet',500,300)\">(kisisel ileti girin)</a><br> ";
 ?>
<br>


</div>
<p>&nbsp;</p>
</body>