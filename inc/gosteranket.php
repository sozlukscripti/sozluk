<? 
$p=mysql_real_escape_string($_GET["p"]);
$n=mysql_real_escape_string($_GET["n"]);
	  
if(!$p) { $b = 0; }else {$b = $p*10; }
if(!$n) { $n = 10; }else {$n = $n; }
		  
?>


<?
if (!$verified_user) die("just register yazarlar girebilir lan!");
?>


<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<script type="text/javascript">function sc(id){var o = document.getElementById(id),d = new Date(2012,12,21);with(o.style){display=display=="none"?"block":"none";document.cookie = id+"="+display+";expires="+d.toGMTString();}}</script>

<?
if ($_GET['id']) {

?>
<?

$sorgu = "SELECT id,tavsiye,zirve,detay,organizator,tarih,gun,ay,yil,saat,yer FROM anketor where id='$_GET[id]' order by id desc";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){

while ($kayit=@mysql_fetch_array($sorgulama)){

$zirve=$kayit["zirve"];
$detay=$kayit["detay"];
$organizator=$kayit["organizator"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$gid=$kayit["id"];
$tavsiye=$kayit["tavsiye"];
$d= rand(0,500);

#######################################--------------detaylari----------------###################################
echo "<b>anket:</b> $zirve $alid
<div class='highlight'><b>anketör:</b> $organizator <a title='anketöre mesaj yolla' href='sozluk.php?process=privmsg&islem=yenimsj&gkime=$organizator'>[msj]</a></div>
<b>anket sorusu:</b> <br>$detay
<div class='highlight'><b>anketörün cevabý:</b> <br>$tavsiye </div>
<b>tarihi:</b> $gun.$ay.$yil  $saat
<br>
<hr>
<center><a class='but' href='sozluk.php?process=anketgoster'>anketler</a><br></center>";
#######################################--------------detaylari bitti-------------#################################
}
}

echo "<b>anket dolduranlar ve cevaplarý:</b><br><br>

<br>";




$sorgulama = @mysql_query("Select * from anketyorum where list='$_GET[id]' order by id DESC Limit $b,10");
$sql2 = @mysql_query("Select * from anketyorum where list='$_GET[id]' order by id DESC");

$top = mysql_num_rows($sql2); 
echo "<center><br>$top adet anket cevabý - sayfalar:<br>";
function divs($int,$n){
if(is_float($int/$n)) { $roun = ceil($int/$n); return $roun; }
else{ return $int/$n;}
}
if($top!=0) { 
if($p-1<0) { $onceki = 0; }else {$onceki = 1; }
if(!$p-1<0) { echo @"<a href=\"sozluk.php?process=gosteranket&id=$gid&p=".($p-$onceki)."#bas\"><img src=\"images/onceki.gif\" height=\"13\" width=\"15\" border=\"0\"></a> "; }
for ($s = 0; $s < divs($top,$n); $s++) {

if($p+1>$s) { $sonraki = 0; }else {$sonraki = 1; }

if($p==$s) { 
echo @"<b><a href=\"sozluk.php?process=gosteranket&id=$gid&p=$s#bas\">[".($s+1)."]</a></b> ";}else{ echo @"<a  href=\"sozluk.php?process=gosteranket&id=$gid&p=$s#bas\">".($s+1)."</a> "; } }
if($p+1==$s) { }else{ echo @"<a href=\"sozluk.php?process=gosteranket&id=$gid&p=".($p+$sonraki)."#bas\"><img src=\"images/sonraki.gif\" height=\"13\" width=\"15\" border=\"0\"></a>"; }

echo "<br><br></center>";


while($kayit=mysql_fetch_array($sorgulama)) {

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
$sil ="<a href='sozluk.php?process=anketyorumsil&id=$id' class='link'>sil</a>";
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
<input class="but" type="button" name="bkz" value="(ara: )" onclick="hen('comment','(ara: ',')')" accesskey=x>
<input class="but" type="button" name="bkz" value="*" onclick="hen('comment','(u: ',')')" accesskey=v>
<input class="but" type="button" name="bkz" value="-spo-" onclick="hen('comment','--- (gbkz: spoiler) ---\n\n','\n\n--- (gbkz: spoiler) ---')" accesskey=s> 
<br>
<br>

<input type="submit" value="anketi dolduuuuur"> 
| <a href='sozluk.php?process=gosteranket&id=<? echo "$gid"; ?>' title="yenile">yenile</a>
</form>
<?



if ($_POST['comment']) {
	
	$comment=$_POST['comment'];

if ($comment == "") {
die("bosluk birakmamak iktiza etmekte");
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
$comment = preg_replace("'\(ara: (.*)\)'Ui","(ara: <a href=\"sozluk.php?process=search&q=\\1\">\\1</a>)",$comment);
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
	
$sorgu = "INSERT INTO anketyorum";
$sorgu .= "(comment,yazan,list,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$comment','$verified_user','$_GET[id]','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

///////////////////////////////////////////////////////////////////////////////////////////////////////
if ($sorgu) {
	echo "anketi doldurdum...  <a href='sozluk.php?process=gosteranket&id=$gid' title=\"ok\">aferim lan!</a>";
}
else {
	echo "db ye yazmadý.. kos kos yetkililere ya haber ver";

}
}
?>

<?

}
else { echo "yok böyle bir anket!?";}
include "config.php";
echo "<br><br>
<div class='copyright'>burada yazýlanlarýn hepsi anket de olsa dil bilgisi kurallarýna tabiidir, ayrýca anketör bölümünde yazýlanlar entry ve oy sayýnýza etki etmemektedir.<br><br> $sitename anketör eklentisi</div>";
?>
