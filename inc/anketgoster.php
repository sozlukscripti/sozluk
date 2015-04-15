<? 
$p=mysql_real_escape_string($_GET["p"]);
$n=mysql_real_escape_string($_GET["n"]);
	  
if(!$p) { $b = 0; }else {$b = $p*10; }
if(!$n) { $n = 10; }else {$n = $n; }
		  
?>
<script type="text/javascript">function sc(id){var o = document.getElementById(id),d = new Date(2012,12,21);with(o.style){display=display=="none"?"block":"none";document.cookie = id+"="+display+";expires="+d.toGMTString();}}</script>
<fieldset>
<?
###online olanlar kayit baþlat
if ($verified_user) {
$osorgu=mysql_query("select * from anketonline where nick='$verified_user'");
$ono=@mysql_num_rows($osorgu);
$oip = getenv('REMOTE_ADDR');
if ($ono==0) {
$zaman=time();
mysql_query("insert into anketonline values('$verified_user','$zaman','$oip','on')");
} else if ($ono>=2) {
mysql_query("delete from anketonline where nick='$verified_user'");
}
}
###online olanlar kayýt bitti
#############online olanlar listele
if ($verified_user) {       // kontrol
$son_zaman = time() - 200;
$sorgu = "DELETE FROM anketonline WHERE islem_zamani < $son_zaman";
mysql_query($sorgu);}
############online olanlar listele bitir
$date=date("d.m.Y G:i");
echo "
<a href='sozluk.php?process=anketekle'>anket aç</a> | <a href='sozluk.php?process=anketstat'>istatistikler</a> | hos geldin anketsever  $verified_user  |  tarih: ($date)
<hr>";
  echo "<div class=infosec onclick=\"return sc('sb_55')\"> &bull; anketör'de online olanlar anketseverler</div><div style=\"display:none\" id=\"sb_gn\"></div>";
 echo "<div class=infosec style=\"display:none\" id=\"sb_55\"><ol>";
include("inc/anketebaak.php");
 echo "</li>";
  echo "</ol></div>";
  echo "<br>";
  echo  "<small><i><img src='images/unlem.gif'>anketlere katýlmak için anket isimlerine týklayýn</i></small><br><br>";



$sorgulama = @mysql_query("Select * from anketor order by id DESC Limit $b,10");
$sql2 = @mysql_query("Select * from anketor order by id DESC");


$top = mysql_num_rows($sql2); 
echo "<center><br>$top adet anket - sayfalar:<br>";
function divs($int,$n){
if(is_float($int/$n)) { $roun = ceil($int/$n); return $roun; }
else{ return $int/$n;}
}
if($top!=0) { 
if($p-1<0) { $onceki = 0; }else {$onceki = 1; }
if(!$p-1<0) { echo @"<a href=\"sozluk.php?process=anketgoster&p=".($p-$onceki)."#bas\"><img src=\"images/onceki.gif\" height=\"13\" width=\"15\" border=\"0\"></a> "; }
for ($s = 0; $s < divs($top,$n); $s++) {

if($p+1>$s) { $sonraki = 0; }else {$sonraki = 1; }

if($p==$s) { 
echo @"<b><a href=\"sozluk.php?process=anketgoster&p=$s#bas\">[".($s+1)."]</a></b> ";}else{ echo @"<a  href=\"sozluk.php?process=anketgoster&p=$s#bas\">".($s+1)."</a> "; } }
if($p+1==$s) { }else{ echo @"<a href=\"sozluk.php?process=anketgoster&p=".($p+$sonraki)."#bas\"><img src=\"images/sonraki.gif\" height=\"13\" width=\"15\" border=\"0\"></a>"; }

echo "<br><br></center>";


while($kayit=mysql_fetch_array($sorgulama)) {

$zirve=$kayit["zirve"];
$detay=$kayit["detay"];
$organizator=$kayit["organizator"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$yer=$kayit["yer"];
$id=$kayit["id"];
$d= rand(0,500);

if ($verified_kat=="admin") {
$sil ="<a href='sozluk.php?process=anketsil&id=$id'>sil</a>"; } 

echo "<img title='$zirve' src='images/ajanda.gif'> <font size='3'><b><a href='sozluk.php?process=gosteranket&id=$id'>$zirve</a></b></font><br>
<br>
<b>anketör:</b> <a title='anketöre mesaj yolla' href='sozluk.php?process=privmsg&islem=yenimsj&gkime=$organizator'>$organizator</a>
<div class='highlight'><b>anket sorusu:</b> <br>$detay </div>
<b>yayýnlandýðý tarih:</b> $gun.$ay.$yil  $saat
<br><small>$sil</small><hr>";

}
}
include "config.php"; 
echo "
<br>
<div class='copyright' align='left'>$sitename anketör eklentisi</div>";
?>
</fieldset>