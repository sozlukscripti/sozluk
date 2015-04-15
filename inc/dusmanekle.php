<?
if (!$verified_user) {
 header("Location:sozluk.php?process=master&login=yescanim");
} else {
 if ($_GET['n']) {
 $sorgu=mysql_query("select * from rehber where kim='$_GET[n]' and kimin='$verified_user'");
 $kontrol=@mysql_num_rows($sorgu);
 if ($kontrol==0) {
 $ekle=mysql_query("insert into rehber values('','$_GET[n]','$verified_user','1')");
 $no=@mysql_num_rows($ekle);
  if ($no>=1) {
   echo "Ziki tutdu ellam. Eger sen bozmussan görmemis gibi yap olay yerinden uzaklas, benim bi suçum yok diyorsan patrona haber ver..";
  } else {
   header("Location:sozluk.php?process=bloke");
  }
 } else {
  echo "bu kiþi zaten sizin listenizde mevcut bir daha eklenmez, bu kadar kin beslediysen sikistir bir yerde döv...";
 }
 }
}
?>
