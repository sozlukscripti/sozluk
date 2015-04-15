<?
if(!$verified_user) { die("just registeret kullanicilar görebilir lan!<br><br> eger sözlük kullanýcýsý iseniz araçlar / toplanti üzerinden buraya geliniz."); }
?>
<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<script type="text/javascript">function sc(id){var o = document.getElementById(id),d = new Date(2012,12,21);with(o.style){display=display=="none"?"block":"none";document.cookie = id+"="+display+";expires="+d.toGMTString();}}</script>
<?
if ($_GET['id']) {

?>
<?

$sorgu = "SELECT id,tavsiye,zirve,detay,sehir,organizator,tarih,gun,ay,yil,saat,yer FROM zirvemax where id='$_GET[id]' order by id desc";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){

while ($kayit=@mysql_fetch_array($sorgulama)){

$zirve=$kayit["zirve"];
$detay=$kayit["detay"];
$sehir=$kayit["sehir"];
$organizator=$kayit["organizator"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$yer=$kayit["yer"];
$gid=$kayit["id"];
$tavsiye=$kayit["tavsiye"];
$d= rand(0,500);

#######################################--------------detaylari----------------###################################
 echo "<b>toplanti:</b> $zirve $alid<a title='sözlükte aç' href='sozluk.php?process=word&q=$zirve'>[?]</a>
<div class='highlight'><b>organizator:</b> $organizator <a title='organizatore mesaj yolla' href='sozluk.php?process=privmsg&islem=yenimsj&gkime=$organizator'>[msj]</a></div>
<b>sehir:</b> $sehir <a title='google da incele' href='http://www.google.com/search?q=$sehir'>[g]</a>
<div class='highlight'><b>tarih:</b> $tarih</div>
<b>mekan:</b> $yer <a title='sözlükte bak' href='sozluk.php?process=word&q=$yer'>[s]</a>
<div class='highlight'><b>detaylar:</b> <br>$detay </div>
<b>yayýnlandýðý tarih:</b> $gun.$ay.$yil  $saat
<div class='highlight'><b>organizator tavsiyeleri:</b> <br>$tavsiye </div>
<br>
<hr>
<center><a class='but' href='sozluk.php?process=toplantigoster'>toplantýlar</a><br></center>";
#######################################--------------detaylari bitti-------------#################################
}
}

echo "<b>toplantici yorumlarý :</b><br><br>

<br>";
$sorgu = "SELECT id,comment,yazan,tarih,gun,ay,yil,saat,list FROM zirvecom where list='$_GET[id]' order by tarih";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){

while ($kayit=@mysql_fetch_array($sorgulama)){

$comment=$kayit["comment"];
$yazan=$kayit["yazan"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$id=$kayit["id"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$say++;
$there=@mysql_num_rows($sorgu);
if ($verified_kat =="admin") {
$sil ="<a href='sozluk.php?process=topyorumsil&id=$id' class='link'>sil</a>";
}
if ($verified_user == $yazan) {
$ssil ="<a href='sozluk.php?process=topyorumsil&id=$id' class='link'>sil</a>";
}
echo "  <li value=$say>$comment<br>
<div align='right'>('#$id') $yazan/$tarih/$saat  $sil</div></li>
<hr>"; 

}
}
###############################################yorum postlama################################################
?>
<form action="" method="POST">
<textarea name="comment" id="comment" rows="5" style="width:100%"></textarea><br>

<br>
<input class="but" type="button" name="bkz" value="(bkz: )" onclick="hen('comment','(bkz: ',')')" accesskey=x>
<input class="but" type="button" name="bkz" value="(gbkz: )" onclick="hen('comment','(gbkz: ',')')" accesskey=c>
<input class="but" type="button" name="bkz" value="*" onclick="hen('comment','(u: ',')')" accesskey=v>
<input class="but" type="button" name="bkz" value="-spo-" onclick="hen('comment','--- (gbkz: spoiler) ---\n\n','\n\n--- (gbkz: spoiler) ---')" accesskey=s> 
<br>
<br>

<input type="submit" value="yorumumu ekle"> 
| <a href='sozluk.php?process=gostertoplanti&id=<? echo "$gid"; ?>' title="yenile">yenile</a>
</form>
<?



if ($_POST['comment']) {
	
	$comment=$_POST['comment'];

if ($comment == "") {
die("boþluk býrakmamak iktiza etmekte");
}

if(strlen($comment)>500) { die("yorum 500 karakterden fazla olamaz, olmamali"); }
	
$comment = ereg_replace("Þ","þ",$comment);
$comment = ereg_replace("Ç","ç",$comment);
$comment = ereg_replace("Ý","i",$comment);
$comment = ereg_replace("Ð","ð",$comment);
$comment = ereg_replace("Ö","ö",$comment);
$comment = ereg_replace("Ü","ü",$comment);
$comment = ereg_replace("Ö","O",$comment);
$comment = ereg_replace("ç","c",$comment);
$comment = ereg_replace("Ç","C",$comment);
$comment = ereg_replace("ý","i",$comment);
$comment = ereg_replace("ü","u",$comment);
$comment = ereg_replace("Ü","U",$comment);
$comment = ereg_replace("ð","g",$comment);
$comment = strtolower($comment);

$comment = ereg_replace("<","(",$comment);
$comment = ereg_replace(">",")",$comment);
$comment = ereg_replace("\n","<br>",$comment);

$comment = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$comment);
$comment = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$comment);
$comment = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$comment);
$comment = preg_replace("'\(spoiler: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br><br>",$comment);
$comment = preg_replace("'\(alinti: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br><br>",$comment);
$comment = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6\\8\\9</a>", $comment);
$comment = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$comment);

$tarih = date("d/m/Y");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

##yorumu yaz
	
$sorgu = "INSERT INTO zirvecom ";
$sorgu .= "(comment,yazan,list,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$comment','$verified_user','$_GET[id]','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

///////////////////////////////////////////////////////////////////////////////////////////////////////
if ($sorgu) {
	echo "yorumunu kaydettim...  <a href='sozluk.php?process=gostertoplanti&id=$gid' title=\"ok\">aferin</a>";
}
else {
	echo "db ye yazmadý.. kos kos mediterranean e haber ver";

}
}
?>

<?

}
else { echo "yok böyle bir toplanti!?";}
include "config.php";
echo "<br><br>
<div class='copyright'>sayfayý yenilemek için yenile linkini kullanýn. kullanýcýlarýn toplantici bölümlerine gitmek için nicklerine týklayýnýz.<br><br> $sitename Toplanti Eklentisi</div>";
?>
