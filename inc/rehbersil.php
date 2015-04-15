<?
if (!$verified_user) {
 header("Location:sozluk.php?process=master&login=yescanim");
} else {

  $sil=mysql_query("delete from rehber where num='$_GET[num]' and kim='$_GET[kim]' and kimin='$verified_user'");
  $no=@mysql_num_rows($sil);
   if ($no>=1) {
    echo "kýsa süre sonra tekrar deneyiniz yada denemeyiniz ne biliyim iþte";
   } else {
    if ($_GET['num']==0) {
     header("Location:sozluk.php?process=arkadaslarim");
    } else {
     header("Location:sozluk.php?process=dusmanlarim");
    }
   }
}
?>
