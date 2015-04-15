<div class="div1">
<p>
  <?
$yorumyap = htmlspecialchars(strip_tags($_POST['yorumyap']));

if (empty($yorumyap) or !$yorumyap) {
?>
  <?
if ($_GET['deger']=="arti") {
   echo "<div align=Center><a href='sozluk.php?process=arti&id=$_GET[id]'>Hmm. Sen þimdi adama + oy vermek istiyorsan týkla. yok ben yorumda yapcam dersen ;</a></div>";
   } else {
  if ($_GET['deger']=="enteresan") {
   echo "<div align=Center><a href='sozluk.php?process=enteresan&id=$_GET[id]'>Hmm. Sen þimdi adama enteresan oy vermek istiyorsan týkla. yok ben yorumda yapcam dersen ;</a></div>";
    } else {
  if ($_GET['deger']=="eksi") {
   echo "<div align=Center><a href='sozluk.php?process=eksi&id=$_GET[id]'>Hmm. Sen þimdi adama - vermek istiyorsan týkla. yok ben yorumda yapcam dersen ;</a></div>";
   }
}
}
?>
  </p>
<p>&nbsp;</p>
<table width="80%" border="0">
  <form action="" method="POST">
    <tr>
      <td>Yorum:</td>
      <td><textarea cols="30" rows="6" name="yorum"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="yorumyap" value="evet yorumum bu!"></td>
      </tr>
  </form>
</table>
<?
} else {

$yorum = htmlspecialchars(strip_tags($_POST['yorum']));


$sorgu=mysql_query("select * from mesajciklar where id='$_GET[id]'");
$yazar=@mysql_result($sorgu,0,'yazar');
$ekle=mysql_query("insert into yorum values('','$yazar','$verified_user','$yorum','$_GET[id]')");
$no=@mysql_num_rows($ekle);
 if ($no>=1) {
  echo "Upps! Bir sorunla karþýlaþtýk yorumunuz eklenemedi";
 } else {
  if ($_GET['deger']=="arti") {
   echo "<div align=Center><a href='sozluk.php?process=arti&id=$_GET[id]'>Yorum Tamamdýr. + oy kullanmak için bir kez daha týklayýver.</a></div>
   ";
   } else {
  if ($_GET['deger']=="enteresan") {
   echo "<div align=Center><a href='sozluk.php?process=enteresan&id=$_GET[id]'>Yorum Tamamdýr. enteresan oy kullanmak için bir kez daha týklayýver.</a></div>";
    } else {
  if ($_GET['deger']=="eksi") {
   echo "<div align=Center><a href='sozluk.php?process=eksi&id=$_GET[id]'>Yorum Tamamdýr. - oy kullanmak için bir kez daha týklayýver.</a></div>";
  } 
 }
}
}
}
?>
</div>
