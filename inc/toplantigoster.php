<script type="text/javascript">function sc(id){var o = document.getElementById(id),d = new Date(2012,12,21);with(o.style){display=display=="none"?"block":"none";document.cookie = id+"="+display+";expires="+d.toGMTString();}}</script>
<fieldset>
<?
include "config.php";
###online olanlar kayit baþlat
if ($verified_user) {
$osorgu=mysql_query("select * from zirveonline where nick='$verified_user'");
$ono=@mysql_num_rows($osorgu);
$oip = getenv('REMOTE_ADDR');
if ($ono==0) {
$zaman=time();
mysql_query("insert into zirveonline values('$verified_user','$zaman','$oip','on')");
} else if ($ono>=2) {
mysql_query("delete from zirveonline where nick='$verified_user'");
}
}
###online olanlar kayýt bitti
#############online olanlar listele
if ($verified_user) {       // kontrol
$son_zaman = time() - 200;
$sorgu = "DELETE FROM zirveonline WHERE islem_zamani < $son_zaman";
mysql_query($sorgu);}
############online olanlar listele bitir
$date=date("d.m.Y G:i");
echo "
<a href='sozluk.php?process=toplanti'>Toplantý Ekle</a> | <a href='sozluk.php?process=toplantistat'>istatistikler</a> | <a target='window' href='$site/galeri' title='toplantý resimleri'>toplantý galeri</a> | hoþ geldin  $verified_user  |  tarih: ($date)
<hr>";
echo "<div class=infosec onclick=\"return sc('sb_$d')\"> &bull; mesaj yaz</div><div style=\"display:none\" id=\"sb_gn\"></div>";
 echo "<div class=infosec style=\"display:none\" id=\"sb_$d\"><ol>";
include("inc/yenimsj.php");
 echo "</li>";
  echo "</ol></div>";
  echo "<div class=infosec onclick=\"return sc('sb_55')\"> &bull; toplantý'da onlayn olanlar</div><div style=\"display:none\" id=\"sb_gn\"></div>";
 echo "<div class=infosec style=\"display:none\" id=\"sb_55\"><ol>";
include("inc/toplantiyabak.php");
 echo "</li>";
  echo "</ol></div>";
  echo "<br>";
  echo  "<small><i><img src='images/unlem.gif'>toplantý hakkýnda detaylý bilgi için toplantý ismine tiklaman lazým, öyle yaptýk biz bunu.</i></small><br><br>";
$sayi=10; // kac tane zirve gosterilecek

$sorgu = "SELECT id,zirve,detay,sehir,organizator,tarih,gun,ay,yil,saat,yer FROM zirvemax order by id desc limit 0,$sayi";
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
$id=$kayit["id"];
$d= rand(0,500);

if ($verified_kat=="admin") {
$sil ="<a href='sozluk.php?process=zirvesil&id=$id'>sil</a>"; } 

 echo "<img title='$zirve' src='images/ajanda.gif'> <font size='3'><b><a href='sozluk.php?process=gostertoplanti&id=$id'>$zirve</a></b></font> <a title='sözlükte aç'  href='sozluk.php?process=word&q=$zirve'>[?]</a><br>
 <br>
<div class='highlight'><b>organizator:</b> <a title='organizatore mesaj yolla' href='sozluk.php?process=privmsg&islem=yenimsj&gkime=$organizator'>$organizator</a></div>
<b>sehir:</b> $sehir <a target='window' title='google da incele' href='http://www.google.com/search?q=$sehir'>[g]</a>
<div class='highlight'><b>tarih:</b> $tarih</div>
<b>mekan:</b> $yer <a target='window' title='sözlükte bak' href='sozluk.php?process=word&q=$yer'>[s]</a>
<div class='highlight'><b>detaylar:</b> <br>$detay </div>
<b>yayýnlandýðý tarih:</b> $gun.$ay.$yil  $saat
<br><small>$sil</small><hr>";

}
}

echo "
<br>
<div class='copyright' align='left'>$sitename Toplanti Eklentisi</div>";
?>
</fieldset>