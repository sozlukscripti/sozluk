<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($yazaronayla != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}

if ($ok) {

foreach($id as $kayit)
{
$sorgu = "UPDATE user SET durum = 'on' WHERE id='$kayit'";
mysql_query($sorgu);

$sorgu1 = "SELECT nick,id,email,isim FROM user WHERE `id` = '$kayit'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$nick=$kayit2["nick"];
$email=$kayit2["email"];
$isim=$kayit2["isim"];

$sorgu = "UPDATE mesajciklar SET statu = '' WHERE yazar='$nick'";
mysql_query($sorgu);

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$konu = "Yazar oldunuz!";
$konumail = "Yazarlýk baþvurunuz onaylandý!";
$system = "SYSTEM";
$yazi = "
Yazarlýðýnýz yöneticiler tarafýndan onaylanmýþtýr.<br>
Þuan yazar statüsüne geçtiniz.
<b></b>
";
//burasi modlog icin
if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$tarih = "$gun/$ay/$yil";
$sorgu = "INSERT INTO history ";
$sorgu .= "(olay,mesaj,moderat,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('yazar onayla','$nick, yazarlýgý onaylandý','$verified_user','$tarih','$gun','$ay' ,'$yil','$saat')";
mysql_query($sorgu);
//modlog bitti
$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$nick','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

echo "$nick [$email] onaylandý.<br>";

$icerik = "Merhaba $isim;<br><br>
$sitename'e <b>$nick</b> kullanýcý adý ile yapmýþ olduðunuz yazarlýk baþvurunuz kabul edilmistir.<br>
Direk giris yaparak entry girmeye baþlayabilirsiniz!<br><br>
Eðer þifrenizi hatýrlamýyorsanýz, üye giriþi bölümünden > þifremi unuttum diyerek yeni þifre talebinde bulunabilirsiniz. Bundan sonra þifrelerinize sahip çýkýp unutmayýn..
<br><br>
Bol þanþlar ;)<br><br>
$sitename Yönetim<br>
www.ankasozluk.com
";

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
@mail($email,$konumail,$icerik,$headers) or stderr("Hata. Mail gönderilemedi the brain'e ulaþýn");   

}
}
else {
echo "
<strong>Onay bekleyen çömler:</strong><br>
<form method=post action=>
<table width=\"606\" border=\"1\">
";
$sorgu = "SELECT nick,durum,email,id,isim FROM user WHERE durum= 'wait' or durum='off' or durum='sus' ORDER BY durum desc";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$nick=$kayit["nick"];
$isim=$kayit["isim"];
$email=$kayit["email"];
$id=$kayit["id"];
$durum=$kayit["durum"];
echo "

  <tr>
    <td width=\"229\"><a href=\"sozluk.php?process=adm&islem=kullanici&update=ok&gnick=$nick\" title=\"$isim\">$nick</a></td>
    <td width=\"344\">$email</td>
    <td width=\"80\">$durum</td>
    <input type=hidden name=nick value=\"$nick\">
    <td width=\"19\"><input name=\"id[]\" type=\"checkbox\" id=\"$id\" value=\"$id\"></td>
  </tr>
";
}
echo "
</table>
<input type=hidden name=ok value=ok>
<input type=\"submit\" name=\"Submit\" value=\"Onayla\">
</form>
";
}
else {echo "<br>Onay bekleyen kimse yok bro !! :(";
}
}
?>