<script language="javascript">
function hihi3() {
  var x=new Array("admin;");
  var y=new Array("xln");
  var i=Math.floor(Math.random()*x.length);
  var j=Math.floor(Math.random()*y.length);
  var d=document.getElementById('mode');if(!d)return;
  d.value=d.value+x[i]+" "+y[j]+"";
  d.focus();
}
</script>
<script language="javascript">
function hihi4() {
  var x=new Array("dün gece kurufasulye yedim biliyor musun","hayat ne garip deðil mi","nasýlsýn","merhaba","iyi günler","selamlar olsun","slm","asl nedir?","nbr","oha falan ol","heil hitler","ben tiki oldum biliyormusun","geçenlerde rüyamda seni gördüm biliyormusun","çok garip birisin","senden nefret ediyorum","yakýsýklý degil ama sempatiksin");
  var y=new Array("ay yüzlü çocuk","emrah bakýþlý dilber","oturan boða","alemlerin kralý","artiz","bebek","caným","sezercik bakýþlý","ayak fetisisti","orta dünya insaný","düz insan","rocker tiki","baba","hocam","insallah","zirvelerin bir numaralý adamý","evliya","nuri alçomsu","gotik","tiki","evde kalmýþ insan","zenci");
  var i=Math.floor(Math.random()*x.length);
  var j=Math.floor(Math.random()*y.length);
  var d=document.getElementById('konukk');if(!d)return;
  d.value=d.value+x[i]+" "+y[j]+"";
  d.focus();
}
</script>

<?

function fuckthemall($verified_user) {
	
	$sql	=	"SELECT nick, yetki FROM user WHERE nick =\"$verified_user\"";
	$run	=	mysql_query($sql) or die("aredhelrim yetiþ : ".mysql_error());
	$row	=	mysql_fetch_assoc($run);
	if ($row["yetki"] != "admin" && $row["yetki"] != "mod" && $row["yetki"] != "modust" && $row["yetki"] != "gammaz" && $row["yetki"] != "user") {
		/*
		$konu	=	"sozluk alarm seysi";
		$mail	=	"info@ankasozluk.com";
		//$ip		=	$_
		$icerik	=	"Kodu calistiran :". $verified_user;
		mail($mail, $konu, $icerik);
		*/
		die("biz sana dönecez arkadasim.");
	}
}
fuckthemall($verified_user);

$verified_user = strtolower($verified_user);
$sql	=	"SELECT * FROM rehber WHERE (`kimin`=\"$gkime\") AND (`kim`=\"$verified_user\") AND (`num`='1')	LIMIT 1";
$run	=	mysql_query($sql) or die("Hata sebebi :".mysql_error());
$kontrol	=	mysql_num_rows($run);


if ($kontrol>0) {
	echo "bu yazar sizden gelecek mesajlari kabul etmiyor";}
	else {
if ($ok and $gkime and $gmesaj) {
$gkime =@$_POST['gkime'];
$gkonu =@$_POST['gkonu'];
$gmesaj =@$_POST['gmesaj'];
$cevap =@$_GET['cevap'];

$gmesaj = kucultuver($gmesaj);
$gkonu = kucultuver($gkonu);
if(empty($gkonu)){$gkonu = "konusuz";}
$gkime = kucultuver($gkime);


$saat = gmdate("H:i"); 
$tarih = gmdate("YmdHi"); 
$gun = gmdate("d"); 
$ay = gmdate("m"); 
$yil = gmdate("Y");


if ($gkime == "yonetim" and $verified_kat != "admin" and $verified_kat != "mod" and $verified_kat!= "modust") {
echo "Yönetim klasörünü sadece lordlar kullanabilir. Nash..";
die;
}

$verified_user = kucultuver($verified_user);

$sorgu = "SELECT * FROM user WHERE `nick`='$gkime'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama) == 0){
echo "$gkime adýnda bir yazarcan yoktur.";
die;
}

if ($durum != "on") {
echo "Yazarcan olmadan bu zavazingoyu kullanamazsýn";
die;
}

$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$gkime','".mysql_real_escape_string($gkonu)."','".mysql_real_escape_string($gmesaj)."','$verified_user','$tarih','2','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
echo "mesajiniz $gkime adli yazarcanýmýza iletildi.";
$insertid = mysql_insert_id();
$sql	=	"INSERT INTO gidenmsg (id, kime, konu, mesaj, gonderen, tarih, gun, ay, yil, saat, sentid) VALUES ('$insertid','$gkime','".mysql_real_escape_string($gkonu)."','".mysql_real_escape_string($gmesaj)."','$verified_user','$tarih', '$gun', '$ay', '$yil', '$saat', '$insertid')";
$run	=	mysql_query($sql) or die("hata 3 :".mysql_error());


//mail ile bildirim
$gmail=mysql_query("SELECT * FROM user where `nick`='$gkime'");
$gmail1=mysql_fetch_assoc($gmail);
$email = $gmail1['email'];
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$tarih = "$gun/$ay/$yil";

$icerik = "Merhaba <b>$gkime</b><br><br>
Anka Sözlük üzerinden <b>$verified_user</b> nickli üye size özel mesaj gönderdi.<br><br>
Bu özel mesajý kimse okumadan <a href=\"http://www.ankasozluk.com\">http://www.ankasozluk.com</a> adresinden giriþ yaparak okuyabilirsiniz.<br><br>
Anka Sözlük Özel Mesaj Habercisi<br>
<a href=\"http://www.ankasozluk.com\"><b>http://www.ankasozluk.com</b></a><br><br>
$tarih - $saat<br>";
$konumail = "$verified_user sana özel birþey dedi";
$fromname="Anka Sozluk PM";
$fromemail="info@ankasozluk.com";


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
    $headers .= "Message-ID: <$mid $fromemail".$eol;
    $headers .= "X-Mailer: PHP v".phpversion().$eol; 
        $headers .= "MIME-Version: 1.0".$eol; 
        $headers .= "X-Sender: PHP".$eol;       
@mail($email,$konumail,$icerik,$headers);   


}
else {
if ($cevap) {

$sorgu = "SELECT * FROM privmsg WHERE `kime` = '$verified_user' and id = '$cevap'";
$sorgulama = mysql_query($sorgu);
$kayit2=mysql_fetch_array($sorgulama);
$mmesaj=$kayit2["mesaj"];
$gonderen=$kayit2["gonderen"];
$gkonu=$kayit2["konu"];
$gun=$kayit2["gun"];
$ay=$kayit2["ay"];
$kime=$kayit2["kime"];
$yil=$kayit2["yil"];
$saat=$kayit2["saat"];

if (mysql_num_rows($sorgulama) == 0){
echo "$id size ait deðil!";
die;
}
} // cevap
$mmesaj = ereg_replace("<br>","\n",$mmesaj);
echo "<FORM name=ok method=post action=>


<table width=\"100%\" border=\"0\">
  <tr> 

  </tr>
</table>
<table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" bgcolor=\"#666666\">
  <table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"1\" bgcolor=\"#666666\">

  <tr> 
    <td class=\"msjana\" > <center>$mmesaj</center>
</td>
  </tr>
</table>


  <TABLE class=dash cellSpacing=0 cellPadding=3 width=\"100%\" align=center border=0>
<TBODY>


<TR>

  <TD>kime</TD>
  <TD><INPUT class=inp maxLength=60 size=35 name=gkime value=\"$gkime\"></TD></TR>
<TR>
  <TD>konu</TD>
  <TD><INPUT class=inp maxLength=50 size=35 name=gkonu value=\"$gkonu\"></TD></TR>
<TR>
  <TD>mesaj</TD>
  <TD><TEXTAREA name=gmesaj rows=10 cols=90></TEXTAREA></TD></TR>

<TR>
  <TD>&nbsp;</TD>
  <TD><INPUT type=hidden value=ok name=ok> <INPUT class=but id=kaydet type=submit value=yolla name=ok>
  </TD></TR></TBODY></TABLE></FORM>";
  }
}
?>