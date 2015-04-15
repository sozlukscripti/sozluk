<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($duyuru != 1) {
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
//$aciklama = ereg_replace("\n","<br>",$aciklama);

$konu = "$sitename Duyuru!";
$aciklama = strtolower($aciklama);


if ($kime == "all")
$sorgu = "SELECT email,nick,durum FROM user WHERE durum != 'sus'";
if ($kime == "mods")
$sorgu = "SELECT email,nick,yetki FROM user WHERE yetki = 'mod' or yetki = 'admin'";
if ($kime == "yazars")
$sorgu = "SELECT email,nick,durum FROM user WHERE durum = 'on'";
if ($kime == "okurs")
$sorgu = "SELECT email,nick,durum FROM user WHERE durum = 'off'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$nick=$kayit["nick"];
$email=$kayit["email"];

$fromname="$sitename";
$fromemail="$sitemail";
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
    $headers .= "Message-ID: <$mid $fromemail>".$eol;
    $headers .= "X-Mailer: PHP v".phpversion().$eol; 
        $headers .= "MIME-Version: 1.0".$eol; 
        $headers .= "X-Sender: PHP".$eol;     
            
@mail($email,$konu,$aciklama,$headers) or stderr("Hata. Mail gönderilemedi admin'e ulaþýn");   

$saydir++;
}
}
echo "<center>$saydir Kiþiye Gönderildi. .";
}
else {

?>
<form name="form1" method="post" action="">
  <p>
    <select name="kime" id="kime">
      <option value="all">Herkes</option>
      <option value="mods">Modlar(kýrmýzý -siyah fark etmez)</option>
      <option value="yazars">Yazarlar</option>
      <option value="okurs">Okurlar</option>
    </select>
    <br>
    <textarea name="aciklama" cols="100" rows="6" wrap="VIRTUAL" id="aciklama"></textarea>
    <br>
    <input type=hidden name=ok value=ok>
    <input type="submit" name="Submit" value="Duyduk Duymadik Demesinler">
</p>
</form>
<?
}
?>