<?
if ($_GET['id']) {
$sorgu=mysql_query("select * from zirvemax where id='$_GET[id]'");
$bul=@mysql_result($sorgu,0,'kime');
if ($verified_kat =="admin") {
 $sil=mysql_query("delete from zirvemax where id='$_GET[id]'");
 echo "toplantý silindi";
} else {
?>
<div align=center class=div1>höyt lan</div>
<?
}
}
?>