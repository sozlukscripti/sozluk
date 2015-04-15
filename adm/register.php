<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($oluler != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
$ip = getenv('REMOTE_ADDR');
if ($nick and $email) { // basla

// degiskenleri ata
$nick =@$_POST["nick"];
if ($nick == "" or $email == "" or $day == "" or $month == "" or $year == "" or $cinsiyet == "" or $sehir == "") {
echo "
Heryeri doldur caným..";
exit;
}

if (!ereg ("^[' A-Za-z0-9]+$", $nick)) {
echo "Nickinizde;<br>sadece küçük ve ingilizce harfler,<br>boþluk {space},<br>ve rakamlar bulunabilir.<br>Lütfen bu kurallara uygun bir nick yazýn.";
die;
}

if (!eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $email)) {
die ("E-Mail Adresiniz Geçersiz");
}

$sorgu = "SELECT email FROM user WHERE `email` = '$email'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)){
$email=$kayit["email"];
echo "Belirttiðiniz e-mail adresi zaten sistemde kayýtlý.";
die;
}

$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$reg=$kayit2["reg"];
if ($reg == "off") {
$sifre =@$_POST["sifre"];
$sifre2 =@$_POST["sifre2"];
if (!$sifre or !$sifre2) {
echo "Þifre yaz hocam..";
exit;
}
if ($sifre != $sifre2) {
echo "Alti üstü þifreyi 2 yere birden yazýcan onuda beceremiyosun.. Gençliðine yazýk hocam..";
exit;
}

}

$isim =@$_POST["isim"];
$nick =@$_POST["nick"];
$email =@$_POST["email"];
$day =@$_POST["day"];
$month =@$_POST["month"];
$year =@$_POST["year"];
$cinsiyet =@$_POST["cinsiyet"];
$sehir =@$_POST["sehir"];

/*$nick = ereg_replace("þ","s",$nick);
$nick = ereg_replace("Þ","S",$nick);
$nick = ereg_replace("ç","c",$nick);
$nick = ereg_replace("Ç","C",$nick);
$nick = ereg_replace("ý","i",$nick);
$nick = ereg_replace("Ý","I",$nick);
$nick = ereg_replace("ð","g",$nick);
$nick = ereg_replace("Ð","G",$nick);
$nick = ereg_replace("ö","o",$nick);
$nick = ereg_replace("Ö","O",$nick);
$nick = ereg_replace("ü","u",$nick);
$nick = ereg_replace("Ü","U",$nick);
$nick = ereg_replace("Ö","O",$nick);

$email = ereg_replace("þ","s",$email);
$email = ereg_replace("Þ","S",$email);
$email = ereg_replace("ç","c",$email);
$email = ereg_replace("Ç","C",$email);
$email = ereg_replace("ý","i",$email);
$email = ereg_replace("Ý","I",$email);
$email = ereg_replace("ð","g",$email);
$email = ereg_replace("Ð","G",$email);
$email = ereg_replace("ö","o",$email);
$email = ereg_replace("Ö","O",$email);
$email = ereg_replace("ü","u",$email);
$email = ereg_replace("Ü","U",$email);
$email = ereg_replace("Ö","O",$email);


$sehir = ereg_replace("þ","s",$sehir);
$sehir = ereg_replace("Þ","S",$sehir);
$sehir = ereg_replace("ç","c",$sehir);
$sehir = ereg_replace("Ç","C",$sehir);
$sehir = ereg_replace("ý","i",$sehir);
$sehir = ereg_replace("Ý","I",$sehir);
$sehir = ereg_replace("ð","g",$sehir);
$sehir = ereg_replace("Ð","G",$sehir);
$sehir = ereg_replace("ö","o",$sehir);
$sehir = ereg_replace("Ö","O",$sehir);
$sehir = ereg_replace("ü","u",$sehir);
$sehir = ereg_replace("Ü","U",$sehir);
$sehir = ereg_replace("Ö","O",$sehir);


$isim = ereg_replace("þ","s",$isim);
$isim = ereg_replace("Þ","S",$isim);
$isim = ereg_replace("ç","c",$isim);
$isim = ereg_replace("Ç","C",$isim);
$isim = ereg_replace("ý","i",$isim);
$isim = ereg_replace("Ý","I",$isim);
$isim = ereg_replace("ð","g",$isim);
$isim = ereg_replace("Ð","G",$isim);
$isim = ereg_replace("ö","o",$isim);
$isim = ereg_replace("Ö","O",$isim);
$isim = ereg_replace("ü","u",$isim);
$isim = ereg_replace("Ü","U",$isim);
$isim = ereg_replace("Ö","O",$isim);*/

$nick = strtolower($nick);
$email = strtolower($email);

$sorgu = "SELECT nick,id FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if ($id) {
echo "Böyle bi yazar zaten var, özenti olmayalým ve farklý bir nick seçelim lütfen :)";
exit;
}
}
}

$tarih = date("Y/m/d G:i");
$dt = "$day/$month/$year";
$durum = "on";
if ($reg == "on") {
$ifade = md5(rand(0,99999));
$sifre = substr($ifade, 17, 6);
$betasifre = sha1($sifre);
}
else {
$betasifre = sha1($sifre);
}
$yetki = "user";

$sorgu = "INSERT INTO user ";
$sorgu .= "(isim,nick,sifre,email,dt,cinsiyet,sehir,durum,yetki,regip,regtarih)";
$sorgu .= " VALUES ";
$sorgu .= "('$isim','$nick','$betasifre','$email','$dt','$cinsiyet','$sehir','$durum','$yetki','$ip','$tarih')";
mysql_query($sorgu);
$kime = $email;
$konu = "Yazar þifreniz";
$icerik = "Merhaba $isim<br><br>
$sitename'e kayýt olduðunuz için teþekkürler. Sisteme giriþ yapabilmeniz için gerekli ekipmanlar aþaðýda verilmiþtir.<br>
Sisteme giriþ yaptýktan sonra þifreni deðiþtirmen senin için yararlý olacaktýr. Yaratýcý biri ol ve þifreni doðum tarihin yada 123456 gibi ardýþýk rakamlar yapma.<br><br>
<b>Kullanýcý adýnýz:</b> $nick<br>
<b>Þifreniz:</b> $sifre<br>
<br><br>
Ýyi Þanþlar<br><br>
$sitename Yönetim<br>
$site;
";

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$konu = "<img src=images/unlem.gif> Hoþgeldiniz!";
$system = "SYSTEM";
$yazi = "
<b>Yazarlýðýnýz $verified_user tarafýndan direk olarak aktif edildi.</b>
";

$yazi = ereg_replace("\n","<br>",$yazi);

$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$nick','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

$mailkonu = "$sitename'e Hoþgeldiniz!";
$fromname=$sitename;
$fromemail=$sitemail;
if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
        $eol="\r\n";        
    }
    elseif (strtoupper(substr(PHP_OS,0,3)=='MAC'))
        $eol="\r";
    else
        $eol="\n"; 
    $mid = md5($_SERVER['REMOTE_ADDR'] . $fromname);
    $name = $_SERVER["SERVER_NAME"];
	$headers .= "Content-type: text/html; charset=iso-8859-9".$eol;
    $headers .= "From: $fromname <$fromemail>".$eol;    
    $headers .= "Reply-To: $fromname <$fromemail>".$eol;
    $headers .= "Return-Path: $fromname <$fromemail>".$eol;
    $headers .= "Message-ID: <$mid $sitemail".$eol;
    $headers .= "X-Mailer: PHP v".phpversion().$eol; 
        $headers .= "MIME-Version: 1.0".$eol; 
        $headers .= "X-Sender: PHP".$eol;       
@mail($kime,$mailkonu,$icerik,$headers) or stderr("Hata. Mail gönderilemedi the brain'e ulaþýn");   

echo "
<div class=div1>
Yazar eklendi.
</div>
";
die;
} // bitir

?>
<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>

<style type="text/css">
<!--
.style2 {color: #666666}
-->
</style>
<span class="link"><B>Yazarlýk baþvurunuzun tamamlanmasý için aþagýdakileri doldurunuz. </B>:<BR>
<BR>
</span>
<FORM method=post action=>
  <p>
    <INPUT type=hidden value=ok name=okmu>
    <INPUT
type=hidden value=y name=submit>
</p>
  <table width="580" border="0">
    <tr>
      <td width="91"><strong>Kullanýcý Adýn</strong></td>
      <td width="3">:</td>
      <td width="464"><input maxlength=40 type=text size=30 name=nick id=nick onChange="javascript:kullaniciadikontrol();">
         <div id="sonuc"> </div> </td>
    </tr>
    <tr>
      <td colspan="3">Sözlükte kullanmak istediðin nick. (Türkçe karakterler ve özel karakterler olan @'^,.~ gibi karakterler içeremez.)</td>
    </tr>
      <?
$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$reg=$kayit2["reg"];
if ($reg == "off") {
echo "
    <tr>
      <td width=\"91\"><strong>Þifren</strong></td>
      <td width=\"3\">:</td>
      <td width=\"464\"><INPUT type=password maxLength=50 size=40 name=sifre>
          </td>
    </tr>
    <tr>
      <td width=\"91\"><strong>Þifre (onay)</strong></td>
      <td width=\"3\">:</td>
      <td width=\"464\"><INPUT type=password maxLength=50 size=40 name=sifre2>
          </td>
    </tr>
    <tr>
      <td colspan=\"3\">Türk kiþilerin genelde \"doðum tarihi, kendi isimleri, kendi isimleri + il plaka kodu\" gibi kombinasyonlar kullandýðý sanal unsur.Onay için iki defa yazmalýsýnýz.</td>
    </tr>

";
}
?>
    <tr>
      <td><strong>Mail adresin</strong></td>
      <td>:</td>
      <td><input maxlength=50 size=40 name=email></td>
    </tr>
    <tr>
	<?if ($reg == "off") {
echo "<td colspan=\"3\">Mail adresiniz. Þifrenizi unutmanýz veya kaybetmeniz halinde iletiþim den bizimle irtibata geçin ki yeni þifrenizi hemen verelim.</td>";
	  }
	else {
	echo "<td colspan=\"3\">Þifreniz mail adresinize gönderilecektir. Bu yüzden mail adresinizin geçerli ve doðru olmasý gerekmektedir. Yoksa zor giriþ yaparsýn..</td>";

	}  
	   ?>
	
	
      <td colspan="3"></td>
    </tr>
    <tr>
      <td><strong>Adýn Soyadýn</strong></td>
      <td>:</td>
      <td><INPUT name=isim id="isim" size=30 maxLength=50></td>
    </tr>
    <tr>
      <td colspan="3"><img src="images/unlem.gif" width="12" height="12"> 10 Puanlýk sýnav sorusudur. Doðru yazmadýðýnýz taktirde sözlüðe alýnmayacaksýnýz.</td>
    </tr>
    <tr>
      <td><strong>Doðduðun Gün</strong></td>
      <td>:</td>
      <td><SELECT name=day class="ksel">
        <OPTION
selected>
        <OPTION>1
          <OPTION>2
          <OPTION>3
          <OPTION>4
          <OPTION>5
          <OPTION>6
          <OPTION>7
          <OPTION>8
          <OPTION>9
          <OPTION>10
          <OPTION>11
          <OPTION>12
          <OPTION>13
          <OPTION>14
          <OPTION>15
          <OPTION>16
          <OPTION>17
          <OPTION>18
          <OPTION>19
          <OPTION>20
          <OPTION>21
          <OPTION>22
          <OPTION>23
          <OPTION>24
          <OPTION>25
          <OPTION>26
          <OPTION>27
          <OPTION>28
          <OPTION>29
          <OPTION>30
          <OPTION>31</OPTION>
      </SELECT>
        <SELECT name=month class="ksel">
          <OPTION selected>
          <OPTION value=1>ocak
          <OPTION
value=2>subat
          <OPTION value=3>mart
          <OPTION value=4>nisan
          <OPTION
value=5>mayis
          <OPTION value=6>haziran
          <OPTION value=7>temmuz
          <OPTION
value=8>agustos
          <OPTION value=9>eylul
          <OPTION value=10>ekim
          <OPTION
value=11>kasim
          <OPTION value=12>aralik</OPTION>
        </SELECT>
        <SELECT name=year class="ksel">
          <OPTION
selected>
<OPTION>1994
          <OPTION>1993
          <OPTION>1992
          <OPTION>1991
          <OPTION>1990
          <OPTION>1989
          <OPTION>1988
          <OPTION>1987
          <OPTION>1986
          <OPTION>1985
          <OPTION>1984
          <OPTION>1983
          <OPTION>1982
          <OPTION>1981
          <OPTION>1980
          <OPTION>1979
          <OPTION>1978
          <OPTION>1977
          <OPTION>1976
          <OPTION>1975
          <OPTION>1974
          <OPTION>1973
          <OPTION>1972
          <OPTION>1971
          <OPTION>1970
          <OPTION>1969
          <OPTION>1968
          <OPTION>1967
          <OPTION>1966
          <OPTION>1965
          <OPTION>1964
          <OPTION>1963
          <OPTION>1962
          <OPTION>1961
          <OPTION>1960
          <OPTION>1959
          <OPTION>1958
          <OPTION>1957
          <OPTION>1956
          <OPTION>1955
          <OPTION>1954
          <OPTION>1953
          <OPTION>1952
          <OPTION>1951
          <OPTION>1950
          <OPTION>1949
          <OPTION>1948
          <OPTION>1947
          <OPTION>1946
          <OPTION>1945
          <OPTION>1944
          <OPTION>1943
          <OPTION>1942
          <OPTION>1941
          <OPTION>1940
          <OPTION>1939
          <OPTION>1938
          <OPTION>1937
          <OPTION>1936
          <OPTION>1935
          <OPTION>1934
          <OPTION>1933
          <OPTION>1932
          <OPTION>1931
          <OPTION>OHA!</OPTION>
        </SELECT></td>
    </tr>
    <tr>
      <td colspan="3">Doðum tarihiniz istatiksel alanda kullanýlacaktýr.</td>
    </tr>
    <tr>
      <td><strong>Cinsin</strong></td>
      <td>:</td>
      <td><SELECT name=cinsiyet class="ksel" id="cinsiyet">
        <OPTION value="m">Erkek
          <option value="f">Bayan </option>
          <option value="h">Hermafrodit </option>
      </SELECT></td>
    </tr>
    <tr>
      
    </tr>
    <tr>
      <td><strong>Þehir</strong></td>
      <td>:</td>
      <td><INPUT name=sehir id="sehir" size=20 maxLength=50></td>
    </tr>
    <tr>
      <td colspan="3"><span>(Yaþadýðýnýz yer!)</span>
      </td>
    </tr>
  </table>
  <p>Evet eminim :
    <input type=submit class=but value="Yardir">
</FORM>
    <br>
          <form action=sozluk.php?process=rand method="post">
    Geri Dönmek Ýçin
    <input type=submit class=but value="Çok Geç Degil">
        </form>
</p>
  <p></P>
</body>
</html>