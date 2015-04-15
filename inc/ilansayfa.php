 <?
  echo "<div class=infosec onclick=\"return sc('sb_3')\"> &bull; try</div><div style=\"display:none\" id=\"sb_gn\"></div>";
 echo "<div class=infosec style=\"display:none\" id=\"sb_3\"><ol>";
 $tarih=date("d/m/Y");
 

$sorgu = "SELECT nick,ilanbaslik,ilanbilgi,gun,ay,yil,tarih,saat,id FROM ilansayfasi order by $tarih";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
      
while ($kayit=@mysql_fetch_array($sorgulama)){
/////////
$nick=$kayit["nick"];
$ilanbaslik=$kayit["ilanbaslik"];
$ilanbilgi=$kayit["ilanbilgi"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$id=$kayit["id"];


  echo "
<div class='highlight'>$ilanbaslik</div>
<img src=\"images/online2.gif\"> $ilanbilgi<br>
[<b>$nick</b> $gun/$ay/$yil ($saat)  <a href=\"javascript:od('http://www.ankasozluk.com/sozluk.php?process=privmsg2&islem=yenimsj&gkime=$nick&gkonu=ilanýnýz icin sey ettim',700,350)\">/msj</a>]<br><hr>"

;
echo "</li>";
    }
   }
echo "</ol></div>";   
?>