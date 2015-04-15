<?
$cachetime = (1*5);
include "cache.php";
cache_check("wordtoday".$_GET[sayfa]); 
?>
<?
$bugun = date("d"); 

$ay = date("m"); 
$yil=date("Y"); 
// idyi yakaliyoruz

// echo "baslik: $q";

$q = urldecode($q);
$q = trim($q);  
$q = kucultuver($q);

if($conv == 1) {
	$q = iconv("UTF-8","ISO-8859-9",($q));
}



$kac = count($q);
$q = substr($q, 0, 80);

$sor = mysql_query("select yazar,statu from mesajciklar WHERE `yazar`='$verified_user' and `statu` = 'silindi' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil' ");
$kac = mysql_num_rows($sor);
if ($kac > 0) {$pbin='pbinhi';} else 
{$pbin='pbin';}
$sorgu = "SELECT * FROM konucuklar WHERE `baslik`='".mysql_real_escape_string($q)."'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$gid=$kayit["id"];
$tasi=$kayit["tasi"];
$baslik=$kayit["baslik"];
$statu=$kayit["statu"];

$baslik = urldecode($baslik);
$baslik = trim($baslik);  
$baslik = kucultuver($baslik);

if($conv == 1) {
	$baslik = iconv("UTF-8","ISO-8859-9",($baslik));
}

if ($statu == "silindi") {

if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "modust") {
echo "<div class=dash><center><b><img src=images/unlem.gif> Bu baþlik uçurulmuþ!";
die;
}

echo "<div class=dash><center><b><img src=images/unlem.gif> Bu baþlýk uçurulmuþ! Yönetici olduðunuz için bu baþlýðý görüyorsunuz.</a></center>";
}

}
}
$yazar = $verified_user;
// echo $gid;
// echo "<font size=6 face=Verdana>$yazar</font>";
// yakaladik


$link = str_replace(" ","+",$baslik);

$baslikm = explode(" ", $baslik); 
   $say = count($baslikm); 
     
$sorgu = "SELECT id,tarih,baslik FROM konucuklar WHERE `id`=$gid";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=@mysql_fetch_array($sorgulama)){

###################### var ##############################################
$id=$kayit["id"];
$konuid=$kayit["id"];
$baslik=$kayit["baslik"];
$tarih=$kayit["tarih"];

if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$baslikduzenle = "<a class=link> - </a><a class=div href=sozluk.php?process=sananeaq&islem=baslikduzenle&id=$id><font color=green size=2 face=verdana>Düzenle</font></a>";


if ($verified_kat == "admin" or $verified_kat == "modust") //ust duzey modlar baþlýk silebilir
$basliksil = "<br><a class=div href=sozluk.php?process=sananeaq&islem=baslikoldur&id=$id><font color=red size=2 face=verdana>Sil</font></a>";

if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$basliktasi = "<a class=link> - </a> <a class=div href=sozluk.php?process=sananeaq&islem=basliktasi&id=$id><font size=2 face=verdana>Taþý</font></a>";

include "config.php";
echo "
<meta name=\"keywords\" content=\"$baslik - $sitename\">
<meta name=\"description\" content=\"$baslik - $sitename\">
<title>$baslik - $sitename</title>";
echo "<br><br>";
echo "<DIV  class=\"title\">";
for ($i=0; $i<$say; $i++) { 
      echo " 
         
	  <a href=\"sozluk.php?process=word&q=$baslikm[$i]\">$baslikm[$i]</a> 
    "; 
      }

echo "</FONT></DIV>"; 
echo "<br>"; 
echo "	
$basliksil $baslikduzenle $basliktasi</FONT>
      </TD>
</TR></TBODY></TABLE>
";

if ($tasi) {
$link = str_replace(" ","+",$tasi);
echo "<center><a class=link><br><font color=red><b>$baslik -> $tasi</b></font><br><br>Bu baþlýk taþýnmýþtýr.<br>Lütfen bekleyin.<br>Yönlendiriliyorsunuz..</a></center>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"2;URL=sozluk.php?process=word&q=$link\">
";
die;
}

}
}
else {
if (!$q) {
echo "<div class=dash><center><b><img src=images/unlem.gif> Müneccim miyim ben ?";
exit;
}

/*if (!ereg("^([A-Za-z0-9]|[[:space:]])+$",$q)) {
echo "<p class=div1>Basliklarda;<br>sadece ingilizce harfler,<br>bosluk {space},<br>ve rakamlar bulunabilir.<br>Lütfen bu kurallara uygun bir baslik yazin.</p>";
exit;
}*/


echo "<div class=dash><center><font color=red size=2>$q</font><font size=2> diye bir konu yok ki?</font></div><br>";

mt_srand ((double)microtime()*1000000);
$banner = mt_rand(1, 4);


if ($verified_user) { 
if ($verified_durum == "on") {

$sorgu = "SELECT id,baslik,aciklama,yazar,tarih,gun,ay,yil FROM ukte WHERE baslik='$q'"; 
$sorgulama = @mysql_query($sorgu); 
if (@mysql_num_rows($sorgulama)>0){ 
//kayýtlarý listele 
while ($kayit=@mysql_fetch_array($sorgulama)){ 
###################### var ############################################## 
$id=$kayit["id"]; 
$baslik=$kayit["baslik"]; 
$aciklama=$kayit["aciklama"]; 
$yazar=$kayit["yazar"]; 
$tarih=$kayit["tarih"]; 
$gun=$kayit["gun"]; 
$ay=$kayit["ay"]; 
$yil=$kayit["yil"]; 

echo "<p class=div1>Ukte veren: $yazar<br>Aciklama: $aciklama,<br>Tarih ($gun/$ay/$yil)<br><br></p>"; 


echo "<form action=\"sozluk.php?process=ukteekle\" method=post> 
<input type=hidden name=\"baslik\" value=\"$q\"> 
<input type=hidden name=\"okword\" value=\"$q\"> 
<input type=hidden name=okmsj value=ok> 
<input type=submit class=but name=ac value=\"Ukteyi doldurayým ben\"> 
</form> 
"; 

} 

} 

else { 
echo "<form action=\"sozluk.php?process=add\" method=post> 
<input type=hidden name=\"baslik\" value=\"$q\"> 
<input type=hidden name=\"okword\" value=\"$q\"> 
<input type=hidden name=okmsj value=ok> 
<input type=submit class=but name=ac value=\"E madem yok ben yazayým\"> 
</form> 
"; 
echo "<form action=\"sozluk.php?process=uktever\" method=post> 
<input type=hidden name=\"baslik\" value=\"$q\"> 
<input type=hidden name=\"okword\" value=\"$q\"> 
<input type=hidden name=okmsj value=ok> 
<input type=submit class=but name=ac value=\"Ukte vereyim birileri doldursun\"> 
</form> 
"; 
} 
}
} 
exit; 
} 



// cevap write

if (!$ok) {
}
else {
$mesaj = stripslashes($_POST["mesaj"]);
if (!$verified_user)
die;
if ($mesaj == "") {
echo "Mesaj içeriði yazman lazým ama.. :)";
exit;
}
else {

$site = $_SERVER["HTTP_REFERER"];
$site = explode("/", $site);
$site = $site[2];


if ($verified_durum == "off" or $verified_durum == "wait") {
$sorgu1 = "SELECT nick,online FROM user WHERE `nick` = '$yazar'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$online=$kayit2["online"];
$nick=$kayit2["nick"];

if (!$online)
$online = 1;
else
$online++;

if ($online == "11") {
$sesdurum = "wait";
session_register("sesdurum");
$sorgu = "UPDATE user SET durum = 'wait' WHERE nick= '$verified_user'";
mysql_query($sorgu);
$sorgu = "UPDATE online SET ondurum = '$sesdurum' WHERE nick= '$verified_user'";
mysql_query($sorgu);
echo "<br><center>10 deneme girdi girme hakkýnýzý doldurdunuz. Þuan girdileriniz yöneticiler tarafýndan inceleniyor.<br>
Uygun görülmesi halinde yazar olarak atanacaksýnýz sayýn çaylak.<br></center>
";
$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$konu = "<img src=images/unlem.gif> $verified_user onay bekliyor!";
$system = "SYSTEM";

$yazi = "$verified_user nickine ait girdiler:<br>";

$sorgu = "SELECT id,statu FROM mesajciklar WHERE `statu`= 'wait' and `yazar` = '$verified_user' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil'";
$sorgulama = @mysql_query($sorgu);
$sayyy = 0;
if (@mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
$sayyy++;
$yazi .= "$sayyy- #$id <br>";
}
}

$kimegitcek = "xln";
$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$kimegitcek','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
die;
}

if (!$online) { echo "<center><br><br>Çaylak olarak bu girdi'niz <b>ilk</b> deneme girdi'niz olarak kayitlara geçti."; }
else { echo "<center><br><br>Çaylak olarak bu girdi'niz <b>$online.</b> deneme girdi'iniz olarak kayýtlara geçti."; }

$sorgu = "UPDATE user SET online='$online' WHERE nick='$yazar'";
mysql_query($sorgu);
} // off

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$ip = getenv('REMOTE_ADDR');
if ($verified_durum == "off") {
$statu = "wait";
}
else {
$statu = "";
}
// db ye yaz

$mesaj = addslashes(kucultuver($mesaj));
if (strstr($mesaj,"youtube.com/watch")) {
            $youtube='#((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?#i';
            preg_match($youtube,$mesaj,$tube);
            $tube=$tube[0];
            $tube2=str_replace("watch?v=","v/",$tube);
        }

$sorgu = "INSERT INTO mesajciklar ";
$sorgu .= "(sira,mesaj,yazar,ip,tarih,gun,ay,yil,saat,statu)";
$sorgu .= " VALUES ";
$sorgu .= "('$gid','$mesaj','$yazar','$ip','$tarih','$gun','$ay','$yil','$saat','$statu')";
mysql_query($sorgu);

// db ye yaz ukte


if ($verified_durum != "off" and $verified_durum != "wait") {
$sorgu = "UPDATE konucuklar SET tarih='$tarih' WHERE id='$gid'";
mysql_query($sorgu);
$sorgu = "UPDATE konucuklar SET gun='$gun' WHERE id='$gid'";
mysql_query($sorgu);
$sorgu = "UPDATE konucuklar SET ay='$ay' WHERE id='$gid'";
mysql_query($sorgu);
$sorgu = "UPDATE konucuklar SET yil='$yil' WHERE id='$gid'";
mysql_query($sorgu);
}


if ($verified_kat == "admin")
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil'");
else if ($verified_durum == "wait" or $verified_durum == "off")
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid and `statu` = 'wait' or `statu` = '' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil'  ");
else
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid and `statu` = '' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil'");

$w = mysql_num_rows($sor);
$max = 20;
$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
$gostersayfa = "&sayfa=$goster";
}
echo "
<p><center><b>entry'niz kayýt edilmiþtir!</b><br>
<a href=\"sozluk.php?process=word&q=$baslik$gostersayfa\">devam!</a>
</font></a></b></center></p><br><br>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"7;URL=sozluk.php?process=word&q=$baslik$gostersayfa\">
<script language=\"javascript\">goUrl('sozluk.php?process=today','left');</script>";
exit;
} // if mesaj
} // else

// cevap /write


$max = 20;

if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }

$alt = ($_GET["sayfa"] - 1)  * $max;

$say = 0;

if ($verified_kat == "admin")
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid");
else if ($verified_durum == "wait" or $verified_durum == "off")
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid and (`statu` = 'wait' or `statu` = '' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil')");
else
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid and `statu` = '' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil' ");

$w = mysql_num_rows($sor);

if ($sayfa and $sayfa != 1)
$say = ($sayfa -1) * $max;

$goster = $w/$max;
$goster=ceil($goster);

if ($goster > 1)
echo "<p align=right class=eol><font face=Verdana size=1>";

if ($goster >1) {

if ($sayfa >= 1 or !$sayfa) {
$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1)
echo "<a class=but href=\"?process=word&q=$q&sayfa=$linksayfa\"><font color=white face=verdana size=1><b><<</b></font></a> ";
}
}

echo "<SELECT class=ksel
onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {
if ($sayfa == $i) echo "
<OPTION value=sozluk.php?process=word&q=$link&sayfa=$i selected>
$i</OPTION>";
else echo "
<OPTION value=sozluk.php?process=word&q=$link&sayfa=$i>
$i</OPTION>";
}
echo "</SELECT>";
}

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster)
echo " <a class=but href=\"?process=word&q=$q&sayfa=$linksayfa\"><font color=white face=verdana size=1><b>>></b></font></a>";
}
echo "
<DIV class=panel id=panel style=\"FLOAT: right\">
<script type='text/javascript'>ors('$baslik');</script>
    <style type='text/css'>
.aratext
{
  width:100%;
}
</style>

</p>

</TABLE></DIV>


";

echo "
<OL>
";
if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$listele = mysql_query("SELECT * FROM mesajciklar WHERE `sira`=$gid and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil' ORDER BY `id` asc limit $alt,$max");
else if ($verified_durum == "off" or $verified_durum == "wait")
$listele = mysql_query("SELECT * FROM mesajciklar WHERE `sira`=$gid and `statu` != 'silindi' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil' ORDER BY `id` asc limit $alt,$max");
else
$listele = mysql_query("SELECT * FROM mesajciklar WHERE `sira`=$gid and `statu` = '' and `gun` = '$bugun' and `ay` = '$ay' and yil='$yil' ORDER BY `id` asc limit $alt,$max");
if (mysql_num_rows($listele)>0){
while ($kayit=mysql_fetch_array($listele)) {

$id=$kayit["id"];
$sira=$kayit["sira"];
$mesaj=stripslashes($kayit["mesaj"]);
$updater=$kayit["updater"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$statu=$kayit["statu"];
$yazstatu=$kayit["statu"];
$update=$kayit["update2"];
$updatesebep=$kayit["updatesebep"];
$ayazar = $yazar;

$yazarlink = str_replace("&","",$yazar); // adminlerden ~ kaldýrýyoruz
$yazartitle = str_replace("&","Administrator / ",$yazar); // adminlerden ~ kaldýrýyoruz

$mesaj = kucultuver($mesaj);
$link = $mesaj;
if (strstr($mesaj,"youtube.com/watch")) {
            $youtube='#((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?#i';
            preg_match($youtube,$mesaj,$tube);
            $tube=$tube[0];
            $tube2=str_replace("watch?v=","v/",$tube);
        }  

$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$mesaj);
$mesaj = preg_replace("'\(spoiler: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br><br>",$mesaj);
$mesaj = preg_replace("'\(alinti: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br><br>",$mesaj);
$mesaj = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $mesaj);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);


$uzunluk = 142;
if($mesaj && strlen($mesaj)>$uzunluk) {
$mesaj=preg_replace("/([^\n\r -]{".$uzunluk."})/i"," \\1\n<br />",$mesaj);
}


$say++;

if (!$ayazar)
die;



if ($verified_kat == "gammaz")
$ispit = "<a href=sozluk.php?process=ispit&id=$id><font size=1>[ispiyon et]</a>";
else
$ispit = "";

if ($ayazar == $verified_user or $verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$sil = "<a href=sozluk.php?process=esil&id=$id&sr=$sira><font size=1>[Sil]</a>";
else
$sil = "";

if ($ayazar == $verified_user or $verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$duzenle = "<a href='sozluk.php?process=etasi&id=$id&sr=$sira'><font size=1>[Taþý]</font></a> - <a href=sozluk.php?process=eduzenle&id=$id&sr=$sira><font size=1>[Düzenle]</a> -";
else
$duzenle = "";

if ($updatesebep)
$updatesebep = "(Sebep: $updatesebep)";


if ($yazar != $verified_user and $verified_user)
$oylama = " <a href=\"javascript:od('sozluk.php?process=arti&id=$id',300,200)\">:)</a> | </font><a href=\"javascript:od('sozluk.php?process=enteresan&id=$id',300,200)\">:o</a>| <a href=\"javascript:od('sozluk.php?process=eksi&id=$id',300,200)\">:(</a>";
else
$oylama = "";
if ($yazar != $verified_user and $verified_user)
$kim = " <a href=\"javascript:od('sozluk.php?process=ben&kim=$yazartitle',400,400)\">?</a> ";
else
$kim = "";


if ($yazar !=$verified_user and $verified_user)
$sikayet = "<a href=\"javascript:od('sozluk.php?process=sikayetgiris',800,400)\">\$</a>";
else
$sikayet = "";

// admin check
$echoyazar = $yazar;
$sorgu1 = "SELECT nick,yetki FROM user WHERE `nick` = '$yazar'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$yetki=$kayit2["yetki"];
$nick=$kayit2["nick"];
if ($yetki == "admin") {
$yazar = "$yazar";
}
if ($yetki == "mod") {
$yazar = "$yazar";
}
if ($yetki == "gammaz") {
$yazar = "$yazar";
}
// admin check
if ($yazar == "$verified_user")  $msg = "<SCRIPT type=text/javascript>e_ben(252,$id,'$yazar',$sira);</SCRIPT>"; 
else if ($verified_kat == "mod" or $verified_kat == "admin" or $verified_kat == "modust")  $msg = "<script language=\"javascript\">e_mod(252,$id,'$yazar',$sira);</SCRIPT>";
else if ($verified_kat == "gammaz")  $msg = "<script language=\"javascript\">e(252,$id,'$yazar');</SCRIPT>";

else if ($verified_kat == "user" or $verified_kat == "okur") $msg = "<script language=\"javascript\">e(252,$id,'$yazar');</SCRIPT>";
else  $msg = "<script language=\"javascript\">zyrt(252,$id,'$yazar');</SCRIPT>";


if ($statu == "akillandim" or $statu == "silindi")  {
if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust") {
if ($statu == "akillandim")
$yazstatu = "Bu girdi silinmiþ, fakat yazar tarafýndan hatalarý tekrar giderilip aktif edilmiþ.(Admin onay bekliyor.)";
else if ($statu == "silindi")
$yazstatu = "Bu girdi silinmiþ, mod olduðunuz için bu mesajý görüyorsunuz.";
else
$yazstatu = "";
}
}

echo "

  <li value=$say id=\"d$id\"><DIV class=eol><font size=2>$mesaj</DIV>
  ";
  if ($updater == "System Administrator")
  $updater = "<img src=images/unlem.gif> $updater";
  if ($updater)
  $bastir = " $update";
  else
  $bastir = "";
  if ($updater and ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust"))
  echo "<br>------------------------------------------------------------------------------<br>
  <font size=1>$updater tarafindan düzenlendi.$updatesebep</font>
  ";
  if ($yazstatu and $yazstatu == "wait") {
  echo "<br><font color=white size=1><img src=images/unlem.gif>Bu girdi'yi bir çaylak yazmýþ. Çaylak olan arkadaþ yazar olunca bu girdi'si halka arz edilecektir.Þuan sadece çaylaklar ve lordlar bu girdi'i görüyorlar.</font>";
  }
  if ($yazstatu and $yazstatu != "wait") {
  echo "<br><font color=white size=1><img src=images/unlem.gif>$yazstatu</font>";
  }
  echo "
  <DIV align=right>$ispit <div class=\"aul\"><font size=1>[<A
  href=\"sozluk.php?process=word&q=$echoyazar\" title=\"$yazartitle\">$yazar</A></B>, $gun.$ay.$yil $saat]   $msg
  </font></DIV></li>
";

}
}
else if ($statu != "silindi") {
/*
$sorgu = "DELETE FROM konucuklar WHERE id = '$konuid' LIMIT 1";
mysql_query($sorgu);
echo "<center><b><img src=images/unlem.gif> Bu baþlýk az önce intahar etti!
<SCRIPT>alert('Bu basliga az önce admin tarafindan intahar süsü verildi.');</SCRIPT>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3;URL=sozluk.php?process=refresh\">
";
*/
}

if ($goster > 1)
echo "<p align=right class=eol><font face=Verdana size=1>";

$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {

if ($sayfa >= 1 or !$sayfa) {
$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1)
echo "<a class=but href=\"?process=word&q=$q&sayfa=$linksayfa\"><font color=white face=verdana size=1><b><<</b></font></a> ";
}
}

echo "<SELECT class=ksel
onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {
if ($sayfa == $i) echo "
<OPTION value=sozluk.php?process=word&q=$link&sayfa=$i selected>
$i</OPTION>";
else echo "
<OPTION value=sozluk.php?process=word&q=$link&sayfa=$i>
$i</OPTION>";
}
echo "</SELECT>";
}

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster)
echo " <a class=but href=\"?process=word&q=$q&sayfa=$linksayfa\"><font color=white face=verdana size=1><b>>></b></font></a><br><br>";
}



$sorgu1 = "SELECT id,hit FROM konucuklar WHERE `id` = '$konuid'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$hit=$kayit2["hit"];
$hit++;
$sorgu = "UPDATE konucuklar SET hit='$hit' WHERE id='$konuid'";
mysql_query($sorgu);
echo "<br><br><center><form action=\"sozluk.php?process=word&q=$q\" method=post>
<input type=submit class=but value=\"hepsini göster\">
</form></center>
";
?>
<form method=post action=>
  
</form>

<p>

  </font></p>
</body>
</html>
<?exit;
cache_save('wordtoday');
mysql_close();
?>