
</br>
</br>
<b><font size="3" color="#B7310B" margin: 5px;>gelen mesajlar</font></b>
</br>
<table class="mesajarka" width="%90"><tbody><tr><td><table width="90%" border="0" cellspacing="1">
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
echo "mesajiniz $gkime adli yazar'a iletildi.</br>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=inbox\">
";
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

$icerik = "merhaba <b>$gkime</b><br><br>
anka sözlük üzerinden <b>$verified_user</b> nickli yazar size özel mesaj gönderdi.<br><br>
bu özel mesajý kimse okumadan <a href=\"http://www.ankasozluk.com\">http://www.ankasozluk.com</a> adresinden giriþ yaparak okuyabilirsiniz.<br><br>
anka sözlük özel mesaj habercisi<br>
<a href=\"http://www.ankasozluk.com\"><b>http://www.ankasozluk.com</b></a><br><br>
$tarih - $saat<br>";
$konumail = "$verified_user sana ozel birsey dedi";
$fromname="anka sozluk pm";
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
$mmesaj = "
";
if (mysql_num_rows($sorgulama) == 0){
echo "$id size ait deðil!";
die;
}
} // cevap
$mmesaj = ereg_replace("<br>","\n",$mmesaj);
echo "<FORM name=ok method=post action>
  <TABLE class=dash cellSpacing=0 cellPadding=3 width=\"700\" border=0>
<TBODY>


  <TD><INPUT type=hidden class=inp maxLength=50 size=35 name=gkonu value=\"$gkonu\"></TD></TR>
<TR>
  <TD>mesaj</TD>
<TD><TEXTAREA name=gmesaj rows=10 cols=90 id=metin value=\"$gmesaj\">$mmesaj</TEXTAREA></TD></TR>
<TR>
<TR>
  <TD>yazar</TD>
  <TD><INPUT class=inp maxLength=60 size=50 name=gkime id=kimlere value=\"$gkime\"></TD></TR>
<TR>
  <TD>&nbsp;</TD>
  <TD><INPUT type=hidden value=ok name=ok> <INPUT class=gonder id=kaydet type=submit value=gönder name=ok> | <a href=\"sozluk.php?process=inbox\">refresh</a>

  </TD>
  </TR>

</TBODY></TABLE></FORM>";
  }
}
?>
<?
if ($silanam == "tumunusil") {
$sorgu = "DELETE FROM privmsg WHERE kime = '$verified_user'";
mysql_query($sorgu);
}

if ($ok) {
foreach($id as $kayit)
{
$sorgu = "DELETE FROM privmsg WHERE kime = '$verified_user' and id = '$kayit' LIMIT 1";
mysql_query($sorgu);
}
}

$sayac = 0;
$sayacsorgu = "select * from gidenmsg WHERE `kime`='$verified_user' ";
$sayacsorgulama = mysql_query($sayacsorgu);
$kac = mysql_num_rows($sayacsorgulama);

$sorgu = "select id,konu,gonderen,gun,okundu,ay,yil,saat,mesaj from privmsg WHERE kime = '$verified_user' ORDER BY tarih desc";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
echo "
</br></br></br>
<div style=\"text-align: left;\"><a href=\"sozluk.php?process=olanbiten\">olan biten</a> | <b>inbox</b> | <a href=\"sozluk.php?process=outbox\">outbox</a></div></br></br></br>
<form name=mailOperations method=post action=>
<table width=\"597\" border=\"0\">


  <tr>
    <td colspan=\"4\" align=\"center\" valign=\"bottom\"><table width=\"597\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\" bordercolor=\"#00000\">

";

while ($kayit=mysql_fetch_array($sorgulama)){
$id=$kayit["id"];
$gonderen=$kayit["gonderen"];
$konu=$kayit["konu"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$okundu=$kayit["okundu"];
$mesaj=$kayit["mesaj"];
if ($okundu != 0)
$yeni = "<b>(yeni)</b>";
else
$yeni = "";

$sorgu2 = "UPDATE privmsg SET okundu = '0' WHERE `id` ='$id'";
mysql_query($sorgu2);


$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$mesaj);
$mesaj = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $mesaj);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);


echo "



<table width=\"700\" border=\"0\">



  <tr> 

  </tr>
</table>
<table  width=\"700\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" bgcolor=\"#666666\">
  <table  width=\"700\" height=\"90\" border=\"0\" cellspacing=\"1\" bgcolor=\"#666666\" align=\"left\">

  <tr> 
    <td width=\"120\"  class=\"inbox\" ></br><a href=\"javascript:od('sozluk.php?process=ben&kim=$gonderen',350,450)\"><center>$gonderen $yeni</center></a></td>
    <td class=\"inbox2\" ><center>$mesaj</center>
<div style='text-align:right; margin-top:85px; font-size:12px'><a href=\"#\" onclick=\"document.getElementById('kimlere').value='$gonderen';document.getElementById('metin').focus();\">cevap yaz</a> <font color=\"#A8A8A8\">|</font> $gun/$ay/$yil $saat
<input name=\"id[]\" class=inp type=\"checkbox\" id=\"$id\" value=\"$id\"></div>
</td>
  </tr>
</table>
";
}
echo "
      </tr>
    </table></td>
  </tr>
</table>
<input type=hidden name=ok value=ok>
<input class=\"gonder\" type=\"submit\" name=\"tsil\" value=\"sil\" onclick=\"top.main.location.href='sozluk.php?process=privmsg'\" accesskey=v>
<input class=\"gonder\" type=\"button\" name=\"tsil\" value=\"tümünü sil\" onclick=\"top.main.location.href='sozluk.php?process=privmsg&silanam=tumunusil'\" accesskey=s>
      </FORM>";
}
else {
echo "inbox kutun boþ,ne yapsak ki bilemedim..";
}
?>
</table>