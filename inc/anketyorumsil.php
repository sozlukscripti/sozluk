<?
if ($_GET['id']) {
$sorgu=mysql_query("select * from anketyorum where id='$_GET[id]'");
$bul=@mysql_result($sorgu,0,'kime');
if ($verified_kat =="admin") {
 $sil=mysql_query("delete from anketyorum where id='$_GET[id]'");
 echo "bu yorum silindi";
} else {
?>
<div align=center class=div1>bu yorumu silebileceðini düþündüðün için aptalsin</div>
<?
}
}
?>