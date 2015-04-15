<?
require_once('inc/func.inc.php'); //fonksiyonu cagýrmak için require ediyorum [uur]
$ip = getenv('REMOTE_ADDR');
$site = $_SERVER["HTTP_REFERER"];
$site = explode("/", $site);
$site = $site[2];

	$sq = "SELECT nesil FROM ayar WHERE id='1'";
	$d = mysql_query($sq);
	$st = mysql_fetch_assoc($d);
	$nesil=$st['nesil'];
 //$nesil=1;

if ($okmu != "ok") 
{
	echo "$dil[error_acceptRules]";
	exit;
}

if (!$okmu) 
{
	echo "$dil[error_password_fillEverywhere]";
}

else 
{
	$nick =$_POST["nick"];
	$email =$_POST["email"];
	$isim =$_POST["isim"];
	$day =$_POST["day"];
	$month =$_POST["month"];
	$year =$_POST["year"];
	$cinsiyet =$_POST["cinsiyet"];
	$sehir =$_POST["sehir"];

	if ($nick == "" or $isim=="" or $email == "" or $day == "" or $month == "" or $year == "" or $cinsiyet == "" or $sehir == "") 
	{
		echo " $dil[error_password_fillEverywhere]";
		exit;
	}

	if (!ereg ("^[' A-Za-z0-9]+$", $nick)) 
	{
		echo "$dil[error_username]";
		die;
	}

	if (!eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $email)) 
	{
		die ("$dil[error_mail]");
	}

	$sorgu = "SELECT email FROM user WHERE `email` = '$email'";
	$sorgulama = mysql_query($sorgu);

	if (mysql_num_rows($sorgulama))
	{
		$email=$kayit["email"];
		echo "$dil[error_already_mail]";
		die;
	}

	$sorgu1 = "SELECT * FROM ayar";
	$sorgu2 = mysql_query($sorgu1);
	mysql_num_rows($sorgu2);
	
	$kayit2=mysql_fetch_array($sorgu2);
	$reg=$kayit2["reg"];
	$anatema = $kayit2["anatema"];
	
	if ($reg == "off") 
	{
		$sifre =@$$_POST["sifre"];
		$sifre2 =@$$_POST["sifre2"];

		if (!$sifre or !$sifre2) 
		{
			echo "$dil[error_choose_password]";
			exit;
		}

		if ($sifre != $sifre2) 
		{
			echo "$dil[error_passwords_wrong]";
			exit;
		}
	}

	$isim =@$_POST["isim"];
	$nick =@$_POST["nick"];
	$email =@$_POST["email"];
	$day =@$$_POST["day"];
	$month =@$$_POST["month"];
	$year =@$$_POST["year"];
	$cinsiyet =@$_POST["cinsiyet"];
	$sehir =@$_POST["sehir"];
	
	if ($nick[0]==" ") 
	{
		echo "$dil[error_first_char]";
		die();
	}

	$nick = ereg_replace("þ","s",$nick);
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
	$isim = ereg_replace("Ö","O",$isim);

	$nick = strtolower($nick);
	$email = strtolower($email);
	$sorgu = "SELECT nick,id FROM user WHERE nick='$nick'";
	$sorgulama = mysql_query($sorgu);

	if (mysql_num_rows($sorgulama) > 0)
	{
	$kayit=mysql_fetch_array($sorgulama);
	print_r($kayit);
		while ($kayit=mysql_fetch_array($sorgulama))
		{
			$id=$kayit["id"];
			if ($id) 
			{
				echo "$dil[error_already_user] ";
				exit;
			}
		}
	}

	$tarih = tarihYarat("Y/m/d G:i");
	$dt = "$day/$month/$year";
	$durum = "off";

	if ($reg == "on") 
	{
		$ifade = md5(rand(0,99999));
		$sifre = substr($ifade, 17, 6);
		$betasifre = sha1($sifre);
	}

	else 
	{
		$betasifre = sha1($sifre);
	}

	$yetki = "user";

	$sorgu = "INSERT INTO user ";
	$sorgu .= "(isim,nick,sifre,email,dt,cinsiyet,sehir,durum,yetki,regip,regtarih,tema, nesil)";
	$sorgu .= " VALUES ";
	$sorgu .= "('$isim','$nick','$betasifre','$email','$dt','$cinsiyet','$sehir','$durum','$yetki','$ip','$tarih','$anatema', '$nesil')";
	mysql_query($sorgu);

	$kime = $email;
	$konu = $dil[registeration_mail];
	$icerik = "$dil[hello] $isim\n
	\n
	$dil[registeration_username]: $nick\n
	$dil[registeration_mail]: $sifre\n
	\n
    $dil[dictionarySlogan]
	$dil[dictionaryUrl]
	";
	
	$tarih = tarihYarat("YmdHM");
	$gun = tarihYarat("d");
	$ay = tarihYarat("m");
	$yil = tarihYarat("Y");
	$saat = tarihYarat("H:i");

	$konu = "$dil[message_welcome_header]";
	$system = "$dil[dictionaryName]";
	$yazi = "
	$dil[hello] $isim,<br>$dil[message_welcome_note]";

	$yazi = ereg_replace("\n","<br>",$yazi);

	$sorgu = "INSERT INTO privmsg ";
	$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
	$sorgu .= " VALUES ";
	$sorgu .= "('$nick','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
	mysql_query($sorgu);

	$mailkonu = "$dil[message_welcome_header]";
	mail("$kime", "$mailkonu", "$icerik", "From: $dil[dictionaryName] <$dil[dictionaryMail]>");
	echo "

	<div class=div1>
	$dil[message_welcome_accepted]
	</div>
	<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"10;URL=http://www.mbfidan.com/inci/sozluk.php?ae=master&login=yescanem\">
	";
}
?>