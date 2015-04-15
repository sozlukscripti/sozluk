<?

if ((isset($_GET["sayfa"])) && ($_GET["sayfa"] <= "0")) {
echo "vaaay akilli!!!";
die();
} 
?>
<?
$cachetime = (1*5);
include "cache.php";
cache_check("word".$_GET[sayfa]); 
?>
<?php
/*
$sorgu1 = "SELECT * FROM konucuklar";
$sorgulama1 = mysql_query($sorgu1);
if (mysql_num_rows($sorgulama1)>0){
while ($murat=mysql_fetch_array($sorgulama1)){
$baslik1=$murat["baslik"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta name=\"keywords\" content=<?php echo $baslik1;?> >
<meta name=\"description\" content=<?php echo $baslik1;?> >
<title><? echo $baslik1; ?></title>
</head>
<?
}}*/

?>
          <DIV style="OVERFLOW-X: hidden; WIDTH: 100%; HEIGHT: 100%">
<?


// idyi yakaliyoruz

// echo "baslik: $q";


######################################
#
# // otomatik yonlendirme
#
######################################


$q = urldecode($q);
$q = trim($q);  
$q = kucultuver($q);

if($conv == 1) {
	$q = iconv("UTF-8","ISO-8859-9",($q));
}

$srgg = "select * from konucuklar where baslik ='".mysql_real_escape_string($q)."'";

// echo $srgg;

$qry=mysql_fetch_array(mysql_query($srgg));
$id=$qry["id"];// reklamlari buraya koyacaz
?>


<?
$sql=mysql_query("select * from mesajciklar where sira='$id' and statu!='silindi'");

if(mysql_num_rows($sql)==1 && $_GET["old"]!=1){
    $mid=mysql_fetch_array($sql);
    if(preg_match("'\(bkz: (.*)\)'Ui",$mid["mesaj"])){
        $arry=preg_split("'\(bkz: (.*)\)'Ui",$mid["mesaj"],$limit,PREG_SPLIT_NO_EMPTY);

        if(empty($arry)){ //sadece 1 adet entry varsa o da sadece 1 adet bkz.dan olusuyorsa... 
            $q1=$q;
            preg_match("'\(bkz: (.*)\)'Ui",$mid["mesaj"],$parts,PREG_OFFSET_CAPTURE);
            $q=$parts[1][0];
            $link=str_replace(" ","+",$q1);
		$yonlendir="<span class='title'><a href='sozluk.php?process=word&q=$link&old=1' title='$q1 e gitmek için týklayýn'>*</a></span>";
            $yonlendir2="<br><small><font size=2>kaldýki zaten buraya '<font color='red'><i>$q1</i></font>' baþlýðýndan aktarmalý geldiniz <a href='sozluk.php?process=word&q=$link&old=1' title='otomatik yonlendirme'>*</a></small><br>";    
        }
    }
}

######################################
#
# Tonymontana // otomatik yonlendirme // END
#
######################################  

$q = urldecode($q);
$q = trim($q);  
$q = kucultuver($q);

$kac = count($q);

$q = substr($q, 0, 80);

if ($verified_user) {
$listele = mysql_query("SELECT okundu,id FROM privmsg WHERE `kime`='$verified_user'");
while ($kayit=mysql_fetch_array($listele)) {
$okundu=$kayit["okundu"];
$id=$kayit["id"];
if ($okundu != 0) {
$okunmayan++;
}
if ($okundu == 2) {
$notice++;
$sorgu = "UPDATE privmsg SET okundu = '1' WHERE id= '$id'";
mysql_query($sorgu);
}

}
if ($okunmayan)
echo "<p align=right><a title=\"$okunmayan okunmayan mesajýnýz var\" href=sozluk.php?process=privmsg><img src=images/new.gif alt=\"$okunmayan okunmayan mesaj var\"> ($okunmayan)</a></p>";
if ($notice)
echo "<SCRIPT>alert('$notice yeni mesaj. mesajlar bölümünden kontrol edebilirsiniz.');</SCRIPT>";
}

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


include "config.php";
?>

<meta name="keywords" content="<? echo "$baslik, $baslik nedir, $baslik hakkýnda bilgiler, $baslik oku, $baslik bilgi, $baslik anlamý nedir, $baslik anlami, $baslik ne demek, $baslik ne oluyor - $sitename"; ?>">
<meta name="description" content="<? echo "$baslik, $baslik anlamý, $baslik tanýmý ve $baslik hakkýnda ayrýntýlý bilgiler. - $sitename"; ?>">
<title><? echo "$baslik - $sitename"; ?></title></head>

<?
if ($statu == "silindi") {

if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "modust") {
echo "<div class=dash><center><b><img src=images/unlem.gif> Bu baslik ucurulmus!";

die;
}

echo "<div class=dash><center><b><img src=images/unlem.gif> Bu baþlýk uçurulmus! Yönetici olduðunuz için bu baþlýðý görüyorsunuz.</a></center>";
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
$baslikduzenle = "<a class=link> - </a><a class=div href=sozluk.php?process=adm&islem=baslikduzenle&id=$id><font color=green size=2 face=verdana>Düzenle</font></a>";


if ($verified_kat == "admin" or $verified_kat == "modust") //baslýk silmeyi sadece ustduzeymodlar yapacak
$basliksil = "<br><a class=div href=sozluk.php?process=adm&islem=baslikoldur&id=$id><font color=red size=2 face=verdana>Sil</font></a>";

if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$basliktasi = "<a class=link> - </a> <a class=div href=sozluk.php?process=adm&islem=basliktasi&id=$id><font size=2 face=verdana>Taþý</font></a>";

?>

<?


echo "<br>";
for ($i=0; $i<$say; $i++) {
      echo "
         <span class=\"title\">
     <a href=\"$baslikm[$i].html\">$baslikm[$i]</a> </span>
    ";
      }

echo "$yonlendir";
echo "<br>";
echo "   
$basliksil $baslikduzenle $basliktasi</FONT>
      </TD>
</TR></TBODY></TABLE>

";

if ($tasi) {
$link = str_replace(" ","+",$tasi);
echo "<br><font color=red size=2>Yönlendirme:</font><font size=2>[$baslik --> $tasi]</font><br><small><i>Saniyeler içerisinde yönlendirileceksiniz</i></small>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=$link.html\">
";
die;
}

}
}
else {
if (!$q) {
echo "<div class=dash><center><img src=images/unlem.gif>  kime bakmistiniz?";
exit;
}

/*if (!ereg("^([A-Za-z0-9]|[[:space:]])+$",$q)) {
echo "<p class=div1>Basliklarda;<br>sadece ingilizce harfler,<br>bosluk {space},<br>ve rakamlar bulunabilir.<br>Lütfen bu kurallara uygun bir baslik yazin.</p>";
exit;
}*/


echo "<div class=dash align='left'><font size=4><a name='$q'>$q</a></font><br><font size=2>böyle bir konu yok!! <br> $yonlendir2 </font></div><br>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//burasi arama falan filan calismazsa 
echo "þöyle biþeyler var. belki alakalýdýr?<br><br>";
$arasorgu=@mysql_query("select baslik from konucuklar where baslik like '%".mysql_real_escape_string($q)."%' order by id desc limit 10" );
while ($oku=mysql_fetch_array($arasorgu)) {

echo "<td>. <a href='$oku[baslik].html' target=main>$oku[baslik]</a></td><br>"; 
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

mt_srand ((double)microtime()*1000000);
$banner = mt_rand(1, 4);


if ($verified_user) { 
if ($verified_durum == "on") 

$sorgu = "SELECT id,baslik,aciklama,yazar,tarih,gun,ay,yil FROM ukde WHERE baslik='$q'"; 
$sorgulama = @mysql_query($sorgu); 
if (@mysql_num_rows($sorgulama)>0){ 
//kayýtlarý listele 
while ($kayit=@mysql_fetch_assoc($sorgulama)){ 
###################### var ############################################## 
$id=$kayit["id"]; 
$baslik=$kayit["baslik"]; 
$aciklama=$kayit["aciklama"]; 
$yazar=$kayit["yazar"]; 
$tarih=$kayit["tarih"]; 
$gun=$kayit["gun"]; 
$ay=$kayit["ay"]; 
$yil=$kayit["yil"]; 

if ($verified_durum = "on") 
echo "<p class=div1>Ukde veren: $yazar <a href='sozluk.php?process=privmsg&islem=yenimsj&gkime=$yazar&gkonu=ukteniz'>[Mesaj Yolla]</a><br>Aciklama: $aciklama,<br>Tarih ($gun/$ay/$yil)<br><br></p>"; 
if ($verified_durum == "on") 
echo "<form action=\"sozluk.php?process=ukdeekle\" method=post> 
<input type=hidden name=\"baslik\" value=\"$q\"> 
<input type=hidden name=\"okword\" value=\"$q\"> 
<input type=hidden name=okmsj value=ok> 
<input type=submit class=but name=ac value=\"ukdeyi doldurayim\"> 
</form> 
"; 

} 

} 

else { 
if ($verified_durum == "on") 
echo "<form action=\"sozluk.php?process=add\" method=post> 
<br><br>
<input type=hidden name=\"baslik\" value=\"$q\"> 
<input type=hidden name=\"okword\" value=\"$q\"> 
<input type=hidden name=okmsj value=ok> 
<input type=submit class=but name=ac value=\"madem yok ben yazayým\"> 
</form> 
"; 
if ($verified_durum == "on") 
echo "<br><form action=\"sozluk.php?process=ukdever\" method=post> 
<input type=hidden name=\"baslik\" value=\"$q\"> 
<input type=hidden name=\"okword\" value=\"$q\"> 
<input type=hidden name=okmsj value=ok> 
<input type=submit class=but name=ac value=\"ukde vereyim birileri doldursun\"> 
</form> 
"; 
} 

} 
exit; 
} 


// cevap write 

if (!$ok) {
}
else {
$mesaj =stripslashes($_POST["mesaj"]);
if (!$verified_user)
die;
if ($mesaj == "") {
echo "<br><br><div class='highlight'>Entry Gir. Boþ mesaj gönderemezsin!</div>";
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

if ($online == "10") {
$sesdurum = "wait";
session_register("sesdurum");
$sorgu = "UPDATE user SET durum = 'wait' WHERE nick= '$verified_user'";
mysql_query($sorgu);
$sorgu = "UPDATE online SET ondurum = '$sesdurum' WHERE nick= '$verified_user'";
mysql_query($sorgu);
echo "<br><center>Tebrikler! 10 deneme entry girme hakkýnýzý doldurdunuz. Þu an entrylerin yöneticiler tarafýndan inceleniyor. Umarim güzel ve formata uygun yazmýssýnýzdýr. <br>
Uygun görülmesi halinde yazar olarak atanacaksýnýz sayýn çaylak. Seni aramýzda görmek isteriz.<br></center>
";
$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$konu = "<img src=images/unlem.gif> $verified_user onay bekliyor!";
$system = "SYSTEM";

$yazi = "$verified_user nickine ait entrylar:<br>";

$sorgu = "SELECT id,statu FROM mesajciklar WHERE `statu`= 'wait' and `yazar` = '$verified_user'";
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

$kimegitcek = "admin";
$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$kimegitcek','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
die;
}

if (!$online) { echo "<center><br><br>Çaylak olarak bu entry'iniz <b>ilk</b> deneme entry'iniz olarak kayýtlara geçti."; }
else { echo "<center><br><br>Çaylak olarak bu entry'iniz <b>$online.</b> deneme entry'iniz olarak kayýtlara geçti."; }

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


$mesaj = trim(addslashes(kucultuver($mesaj)));

if(substr($mesaj,-1,1)!="." && substr($mesaj,-1,1)!="!" && substr($mesaj,-1,1)!="?" && substr($mesaj,-1,1)!=")")
$mesaj.=".";

if (strstr($mesaj,"youtube.com/watch")) {
            $youtube='#((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?#i';
            preg_match($youtube,$mesaj,$tube);
            $tube=$tube[0];
            $tube2=str_replace("watch?v=","v/",$tube);
        }  

$sorgu = "INSERT INTO mesajciklar ";
$sorgu .= "(sira,mesaj,yazar,ip,tarih,gun,ay,yil,saat,statu)";
$sorgu .= " VALUES ";
$sorgu .= "('$gid','".mysql_real_escape_string($mesaj)."','$yazar','$ip','$tarih','$gun','$ay','$yil','$saat','$statu')";
mysql_query($sorgu);

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

mt_srand ((double)microtime()*1000000);
$banner = mt_rand(1, 4);


mt_srand ((double)microtime()*1000000);


mt_srand ((double)microtime()*1000000);
if ($verified_kat == "admin")
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid");
else if ($verified_durum == "wait" or $verified_durum == "off")
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid and `statu` = 'wait' or `statu` = ''  ");
else
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid and `statu` = '' ");

$w = mysql_num_rows($sor);
$max = 20;
$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
$gostersayfa = "&sayfa=$goster";
}
echo "
<p><center><b>Sikimsonik Entryni Girdin Aferin!</b><br>
<a href=\"$baslik$gostersayfa.html\">devam!</a>
</font></a></b></center></p><br><br>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=$baslik$gostersayfa.html\">
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
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid and (`statu` = 'wait' or `statu` = '')");
else
$sor = mysql_query("select id from mesajciklar WHERE `sira`=$gid and `statu` = '' ");

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
echo "<a class=but href=\"$q-$linksayfa.html\"><font face=verdana size=1><b><<</b></font></a> ";
}
}

echo "<SELECT class=ksel
onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {
if ($sayfa == $i) echo "
<OPTION value=\"$q-$i.html\" selected>
$i</OPTION>";
else echo "
<OPTION value=\"$q-$i.html\">
$i</OPTION>";
}
echo "</SELECT>";
}

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster)
echo " <a class=but href=\"$q-$linksayfa.html\"><font face=verdana size=1><b>>></b></font></a>";
};

if ($verified_user) {
echo "
<DIV align=right>

<TABLE>
<TR>
<TD width=71 height=15>  
<script class='pmsg' language='javascript'>b('main','sozluk.php?process=privmsg',' inbox ','mesajlar')</script>
<script class='pbin' language='javascript'>b('main','sozluk.php?process=cop',' ayarlarým ','kiþisel')</script>
<script class='pevt' language='javascript'>b('main','sozluk.php?process=onlines',' olan biten ','duyurular')</script>
</TD>
</TR>
</TABLE>
</center>
</div>
";
}
?>


<?php
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
<tr>
<td align=right>
";
//reklamlar bura?>

<br />







</td>
</tr> 
</TABLE></DIV>


<?php
echo "
<OL>
";
if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$listele = mysql_query("SELECT * FROM mesajciklar WHERE `sira`=$gid ORDER BY `id` asc limit $alt,$max");
else if ($verified_durum == "off" or $verified_durum == "wait")
$listele = mysql_query("SELECT * FROM mesajciklar WHERE `sira`=$gid and `statu` != 'silindi' ORDER BY `id` asc limit $alt,$max");
else
$listele = mysql_query("SELECT * FROM mesajciklar WHERE `sira`=$gid and `statu` = '' ORDER BY `id` asc limit $alt,$max");
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


$link = urlencode($link);


if (strstr($mesaj,"youtube.com/watch")) {
            $youtube='#((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?#i';
            preg_match($youtube,$mesaj,$tube);
            $tube=$tube[0];
            $tube2=str_replace("watch?v=","v/",$tube);
        }  

$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(<a target=\"_blank\" title=\"yeni pencerede aç\" href=\"\\1.html\">°</a> bkz: <a href=\"\\1.html\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(ara: (.*)\)'Ui","(ara: <a href=\"sozluk.php?process=search&q=\\1\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"\\1.html\">\\1</a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"\\1.html\" title=\"(bkz: \\1)\">*</a>",$mesaj); 


$mesaj = preg_replace("'\(spoiler: (.*)\)'Ui","<br><br>---<a href=\"spoiler.html\">spoiler</a>---<br> \\1 <br>---<a href=\"spoiler.html\">spoiler</a>---<br><br>",$mesaj);
$mesaj = preg_replace("'\(alinti: (.*)\)'Ui","<br><br>---<a href=\"http://www.ankasozluk.com/sozluk.php?process=word&q=alinti\">alinti</a>---<br> \\1 <br>---<a href=\"http://www.ankasozluk.com/sozluk.php?process=word&q=alinti\">alinti</a>---<br><br>",$mesaj);
$mesaj = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $mesaj);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=http://www.ankasozluk.com/sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);


$uzunluk = 142;
if($mesaj && strlen($mesaj)>$uzunluk) {
$mesaj=preg_replace("/([^\n\r -]{".$uzunluk."})/i"," \\1\n<br />",$mesaj);
}


$say++;


if (!$ayazar)
die;



if ($verified_kat == "gammaz")
$ispit = "<a href=http://www.ankasozluk.com/sozluk.php?process=ispit&id=$id><font size=1>[ispitle]</a>";
else
$ispit = "";

if ($ayazar == $verified_user or $verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$sil = "<a href=http://www.ankasozluk.com/sozluk.php?process=esil&id=$id&sr=$sira><font size=1>[Sil]</a>";
else
$sil = "";

if ($ayazar == $verified_user or $verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$duzenle = "<a href='http://www.ankasozluk.com/sozluk.php?process=etasi&id=$id&sr=$sira'><font size=1>[Taþý]</font></a> - <a href=http://www.ankasozluk.com/sozluk.php?process=eduzenle&id=$id&sr=$sira><font size=1>[Düzenle]</a> -";
else
$duzenle = "";

if ($updatesebep)
$updatesebep = "(Sebep: $updatesebep)";


if ($yazar != $verified_user and $verified_user)
$oylama = " <a href=\"javascript:od('http://www.ankasozluk.com/sozluk.php?process=arti&id=$id',300,200)\">:)</a> | <a href=\"javascript:od('http://www.ankasozluk.com/sozluk.php?process=enteresan&id=$id',300,200)\">:0</a> | </font> ";
else
$oylama = "";
if ($yazar != $verified_user and $verified_user)
$kim = " <a href=\"javascript:od('http://www.ankasozluk.com/sozluk.php?process=ben&kim=$yazartitle',400,400)\">?</a> ";
else
$kim = "";


if ($yazar !=$verified_user and $verified_user)
$sikayet = "<a href=\"javascript:od('http://www.ankasozluk.com/sozluk.php?process=sikayetgiris',800,400)\">\$</a>";
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

  if ($yazstatu and $yazstatu == "wait") {
  echo "<br><font color=white size=1><img src=images/unlem.gif>Bu girdi'yi bir çaylak yazmýþ.Çaylak olan arkadaþ yazar olunca bu girdi'si halka arz edilecektir.Þuan   sadece çaylaklar ve lordlar bu girdi'i görüyorlar.</font>";
  }
  if ($yazstatu and $yazstatu != "wait") {
  echo "<br><font color=white size=1><img src=images/unlem.gif>$yazstatu</font>";
  }
  echo "
  <DIV align=right>$ispit <div class=\"aul\"><font size=1>[<A
  href=\"$echoyazar.html\" title=\"$yazartitle\">$yazar</A></B>, $gun.$ay.$yil $saat]   $msg
  </font></DIV></li></font>
";

}
}
else if ($statu != "silindi") {
/*
$sorgu = "DELETE FROM konucuklar WHERE id = '$konuid' LIMIT 1";
mysql_query($sorgu);
echo "<center><b><img src=images/unlem.gif> Bu baþlýk az önce intahar etti!
<SCRIPT>alert('Bu basliga az önce admin tarafindan intahar süsü verildi.');</SCRIPT>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=refresh\">
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
echo "<a class=but href=\"$q-$linksayfa.html\"><font face=verdana size=1><b><<</b></font></a> ";
}
}

echo "<SELECT class=ksel
onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {
if ($sayfa == $i) echo "
<OPTION value=\"$q-$i.html\" selected>
$i</OPTION>";
else echo "
<OPTION value=\"$q-$i.html\">
$i</OPTION>";
}
echo "</SELECT>";
}

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster)
echo " <a class=but href=\"$q-$linksayfa.html\"><font face=verdana size=1><b>>></b></font></a><br><br>";
}



$sorgu1 = "SELECT id,hit FROM konucuklar WHERE `id` = '$konuid'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$hit=$kayit2["hit"];
$hit++;
$sorgu = "UPDATE konucuklar SET hit='$hit' WHERE id='$konuid'";
mysql_query($sorgu);

if ($verified_user) {
?>



</font></font></font></font>



<form method="post" action="">
<form method=post action=>
  <table width="100%" align="left" class="dash">
    <tr>

      <td colspan="2">
        '<? print("$q");?>' hakkýnda kafanýzda bir taným veya verebileceginiz bir örnek varsa eklemekten çekinmeyin:

<div style="text-align: right;">
<input class="but" type="button" name="bkz" value="(bkz: )" onclick="hen('aciklama','(bkz: ',')')" accesskey=x>
<input class="but" type="button" name="bkz" value="(gbkz: )" onclick="hen('aciklama','(gbkz: ',')')" accesskey=c>
<input class="but" type="button" name="bkz" value="*" onclick="hen('aciklama','(u: ',')')" accesskey=v>

<input class="but" type="button" name="bkz" value="-s!-" onclick="hen('aciklama','--- (gbkz: spoiler) ---\n\n','\n\n--- (gbkz: spoiler) ---')" accesskey=s> 
 </div>

     
<textarea id="aciklama" name="mesaj" rows="8" style="width:100%;"></textarea>


    </tr>

</td>

<tr>
<td width="90" valign="top">
<input id="kaydet" class=but type="submit" name="kaydet" value="yolla panpa">
<input type="hidden" name="ok" value="kaydet">
<input type="hidden" name="gid" value="<? echo $gid; ?>">
<input type="hidden" name="q" value="<? echo $q; ?>";
<input type="hidden" name="gonder" value="kaydet">
</td>
</tr>

    <tr>

      <td valign="top"  colspan="2"> 
        </td>
     </tr>
  </table>
</form>

<?
} // yazar
?>
</div>
</br>
</br>
<div style="text-align: center;"><font size="1" color="black">&nbsp;kopirayt &copy; ikipi&ccedil;&ouml;nbebþ anka s&ouml;z&ccedil;&uuml;k ~  bu ba&ccedil;lýk yazarlarýmýza aittir, eðer ki bu pi&ccedil;&ouml;zlere itirazýn varsa,ya þimdi konuþ, yada sonsuza &nbsp;kadar sus. ayrýca bu ortam ve yazýlanlar hatta ve hatta g&ouml;rm&uuml;þ olduðun herþey, yazarlarýma aittir.. burada herþey olduðu gibidir,olmasý gerektiði gibi deðil.. -kutsal anka&ccedil; s&ouml;z&ccedil;&uuml;k&uuml;-</font></div>

</body>
</html>
<?exit;
cache_save('word');
mysql_close();
?>