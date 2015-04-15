
</br>
</br>
<b><font size="3" color="#B7310B" margin: 5px;>çöplük</font></b>
</br>

<br>
<div class=div1>
<b>çöp entry</b>
</br>
</br>
• çöp'e atýlmýþ entariler
<br>
<br>

</div>
<div class=div1>
<?
$max = 9999999;

if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }

$alt = ($_GET["sayfa"] - 1)  * $max;

echo "
<OL>
";
$say = 0;
$sor = mysql_query("select * from mesajciklar WHERE `yazar`='$verified_user' and `statu` = 'silindi' ");
$w = mysql_num_rows($sor);

$sayac = 0;
$sorgu = "select * from mesajciklar WHERE `yazar`='$verified_user' and `statu` = 'silindi' ";
$sorgulama = mysql_query($sorgu);
$kac = mysql_num_rows($sorgulama);

$listele = mysql_query("SELECT * FROM mesajciklar WHERE `yazar`='$verified_user' and `statu` = 'silindi' ORDER BY `id` desc limit $alt,$max");
if (mysql_num_rows($listele)>0){
while ($kayit=mysql_fetch_array($listele)) {

$id=$kayit["id"];
$sira=$kayit["sira"];
$mesaj=$kayit["mesaj"];
$updater=$kayit["updater"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$silen=$kayit["silen"];
$silsebep=$kayit["silsebep"];
$update=$kayit["update2"];
$updatesebep=$kayit["updatesebep"];
$ayazar = $yazar;

$yazarlink = ereg_replace("&","",$yazar); // adminlerden ~ kaldýrýyoruz
$yazartitle = ereg_replace("&","Administrator / ",$yazar); // adminlerden ~ kaldýrýyoruz

/*$link = ereg_replace("þ","s",$link);
$link = ereg_replace("Þ","S",$link);
$link = ereg_replace("ç","c",$link);
$link = ereg_replace("Ç","C",$link);
$link = ereg_replace("ý","i",$link);
$link = ereg_replace("Ý","I",$link);
$link = ereg_replace("ð","g",$link);
$link = ereg_replace("Ð","G",$link);
$link = ereg_replace("ö","o",$link);
$link = ereg_replace("Ö","O",$link);
$link = ereg_replace("ü","u",$link);
$link = ereg_replace("Ü","U",$link);
$link = ereg_replace("Ö","O",$link);

$mesaj = ereg_replace("Þ","þ",$mesaj);
$mesaj = ereg_replace("Ç","ç",$mesaj);
$mesaj = ereg_replace("Ý","i",$mesaj);
$mesaj = ereg_replace("Ð","ð",$mesaj);
$mesaj = ereg_replace("Ö","ö",$mesaj);
$mesaj = ereg_replace("Ü","ü",$mesaj);*/

$mesaj = strtolower($mesaj);

$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$mesaj);
$mesaj = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $mesaj);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=view&eid=\\1>#\\1</a>",$mesaj);

$uzunluk = 142;
if($mesaj && strlen($mesaj)>$uzunluk) {
$mesaj=preg_replace("/([^\n\r -]{".$uzunluk."})/i"," \\1\n<br />",$mesaj);
}

$sorgu1 = "SELECT * FROM konucuklar WHERE id = $sira";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];


$say++;

if (!$ayazar)
die;

echo "
  <LI value=$say>
  <DIV class=dash>
  <b>baþlýk:</b> $baslik<br>
  <b>entry:</b>$mesaj</b><BR>
  <b>patlatan:</b> <A href=\"sozluk.php?process=word&q=$silen\" title=\"$silen\"><font size=1><b>$silen</b></font></A> (<b><A  href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$silen&gkonu=$id patlayan entry\"><font size=1>msg</A></font></b>)<br>
  <b>sebep:</b> $silsebep<br>
  (<a href=sozluk.php?process=cp&ucur=$id>ben patlatayim</a>) - (<a href=sozluk.php?process=eduzenle&id=$id&sr=$sira&akillandim=$id>düzelticem simdi!</a>)
  ";
  echo "
  </DIV>
  <DIV class=div2 align=right><font size=1>(#$id) <B><A href=\"sozluk.php?process=word&q=$echoyazar\" title=\"$yazartitle\"><font size=1>$yazar</A></B>|$gun/$ay/$yil $saat
  </DIV><BR><BR>
  </li>
";

}
}
