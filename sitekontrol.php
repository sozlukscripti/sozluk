<?php
include "config.php";
function site_is_up($site,$port=80,$timeout=1){
$port = $port === NULL ? 80 : $port;
$fp = @fsockopen(str_replace('http://','',$site), $port, $errno, $errstr, $timeout);
if($fp === false){
return false;
}
fclose($fp);
return true;
}


?>

<?php
if(site_is_up($site)){
echo 'Site açik';
}else{
echo 'Site kapali';

$MailAdresiniz = $sitemail; 
						$Isim="Anka Yönetim";
						$Mail=$adminmail;
						$Konu="sözlük kapali";
						$Mesaj="Anka sözlük kapali durumda. Büyük ihtimalle server'a ulaşılamıyor..";
						$IP = ($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
						$Tarih = date("d.m.Y");
						$Saat = date("H:i");
						
						$Gonderilecek='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
				<title>Anka Sözlük Kapalı</title>
				<body>
				Sitenizden '.$Tarih.' tarihinde, server saati ile '.$Saat.' de, '.$Isim.' tarafinda asagidaki mesaj gönderilmistir.<br />
				<br />
				E-Mail Adresi: '.$Mail.'<br /><br />
				Konu: '.$Konu.'<br /><br />
				Mesaj: '.$Mesaj.'<br /><br />
				IP Adresi: '.$IP.'<br /><br />
				</body>
				</html>
				';
				
						$Header='MIME-Version: 1.0' . "\n";
						$Header.='Content-type: text/html; charset=iso-8859-9' . "\n";
						$Header.='Content-Transfer-Encoding: 8bit'."\n";
						$Header.='To: '.$MailAdresiniz."\n";
						$Header.='From: '.$Isim.'<'.$Mail.">\n";
						$Header.='Return-Path: ' .$Mail."\n";
						$Header.='X-Mailer: halicsozluk.com'."\n";
						$Header.='X-Priority: 1'."\n";
						
						

						if(!mail($MailAdresiniz,$Konu,$Gonderilecek,$Header))
							print '<br>E-Mail gönderilirken hata olustu! Lütfen tekrar deneyiniz.';
						else
							print '<br>E-Mail basari ile gönderilmistir';
							
}
// self explanitory I hope

if(site_is_up($site,NULL,5)){ echo '<br>80 nolu port - Açık!'; }
// check heryerdentatil.com with a 5 second timeout (still on port 80)

if(site_is_up($site,2082)){ echo '<br>2082 nolu port - Açık!'; }
// check heryerdentatil.com on port 2082
?> 