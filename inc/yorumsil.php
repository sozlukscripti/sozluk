<?
if ($_GET['id']) {
$sorgu=mysql_query("select * from yorum where id='$_GET[id]'");
$bul=@mysql_result($sorgu,0,'kime');
if ($bul==$verified_user) {
 $sil=mysql_query("delete from yorum where id='$_GET[id]'");
 $no=@mysql_num_rows($sil);
  if ($no==0) {
   header("Location:sozluk.php?process=yorumlarim");
  } else {
   header("Location:sozluk.php?process=yorumlarim");
  }
} else {
?>
<div align=center class=div1>hüop uleyn! sana ait olmayan bir yorumu nasýl silebilirsin?</div>
<?
}
}
?>
