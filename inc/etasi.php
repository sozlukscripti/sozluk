<?
if (!$verified_user) {
 header("Location:sozluk.php?process=master&login=yescanim");
} else {
 if ($_GET['id'] and $_GET['sr'] and !$_POST['tasi']) {
 ?>
 <form action="" method="POST">
 #<?=$id?> numaralý entry'yi #<input type="text" size="5" name="sira"> numaralý baþlýða taþý!<br>
 <input type="submit" name="tasi" value="tamamdir">
 </form>
 <?
 } else if ($_POST['tasi']) {
 $degistir=mysql_query("update mesajciklar set sira='$_POST[sira]' where id='$_GET[id]'");
 $no=@mysql_num_rows($degistir);
  if ($no>=1) {
  echo "engine sýçtý sonra tekrar deneyiniz";
  } else {
  echo "entryniz #$_POST[sira] numaralý baþlýða taþýnmýþtýr";
  }
 }
}
?>
