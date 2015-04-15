<?
$cachetime = (10*60) * 1;
include "cache.php";
cache_check('eforgun');
?>

<?
$toplam=mysql_query("select id from mesajciklar order by id desc limit 1");
$id=mysql_result($toplam,0,'id');
$sorgu=mysql_query("select gun,ay,yil,count(id) as sayi from mesajciklar group by gun,ay,yil order by sayi desc limit 0,100");
?>
<table border="0">
 <tr>
  <td colspan=2>en çok erfor sarfedilen günler</td>
 </tr>
<?
$say=0;
while ($oku=mysql_fetch_array($sorgu)) {
$say++;
$oran=$id/$oku[sayi];
$oran=100/$oran;
$oran=$oran*25;
$oran=ceil($oran);
$format=number_format($oku[sayi]);
 echo "<tr><td nowrap>$say. <a href='sozluk.php?process=word&q=$oku[gun]' target='main'>$oku[gun]</a>.<a href='sozluk.php?process=word&q=$oku[ay]' target='main'>$oku[ay]</a>.<a href='sozluk.php?process=word&q=$oku[yil]' target='main'>$oku[yil]</a></td><td nowrap width='100%'><div class=highlight  style='text-align:right; width:$oran%'>$format</td></tr>";
}
?>
</table>
<?
cache_save('eforgun');
?>