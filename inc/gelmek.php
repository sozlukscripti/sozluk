<?
session_start();
$sorgu = "SELECT nick FROM user where nick='$verified_user";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){

while ($kayit=@mysql_fetch_array($sorgulama)){
/////////
$nick=$kayit["nick"];
}
}
echo "Hoþgeldin <b>$nick</b><br>";
echo "$nick senden bugün de iyi entryler bekliyoruz..<br>";
echo "Birazdan bir yerlere yönlendirilmen lazim, olmazsa <a href='sozluk.php?process=onlines'> buraya</a> týkla ya da -daha adam gibi yönlendirme kodu çalistiramayan sözlügün ben ...- diyerekten sözlügü kapat gitsin.";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5;URL=sozluk.php?process=onlines\">";

?>