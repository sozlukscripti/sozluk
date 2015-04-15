<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($verified_kat == "admin" or $verified_kat == "modust")
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"86000;URL=sozluk.php?process=adm&islem=tebrikmail\">";
$konu="Doðum Gününüz Kutlu Olsun";
$fromname=$sitename;
$fromemail=$sitemail;

$mesaj="Deðerli kullanýcýmýz<br><br>
Doðum gününüzü en içten dileklerimizle kutlarýz.<br>Hayatýn tüm güzellikleri sizinle olsun.<br><br>
$sitename<br>
www.halicsozluk.com";
$day=date("j");
$month=date("n");
$today="$day/$month";
$dtsorgu = mysql_query("SELECT * FROM user WHERE dt like '$today%'");
$dttarihtoplam = mysql_num_rows($dtsorgu);
while($goster = mysql_fetch_assoc($dtsorgu)) {    
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
$mail = @mail($goster['email'],$konu,$mesaj,$headers) or stderr("Hata. Mail gönderilemedi the brain'e ulaþýn"); 
}
if($mail) {echo "Doðum günleri kutlandý."; } else { echo "Hata! Doðum günleri kutlanamadý yada bugün doðan hiçkimse yok..";}
?> 