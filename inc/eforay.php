<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('eforay');
?>
<?
$sorgu=mysql_query("select ay,yil,count(id) as sayi from mesajciklar group by ay order by sayi desc limit 0,20");
?>
<table border="0">
 <tr>
  <td>en çok erfor sarfedilen aylar</td>
 </tr>
<?
$say=0;
while ($oku=mysql_fetch_array($sorgu)) {
$say++;
$format=number_format($oku[sayi]);
 echo "<tr><td>$say. <a href='sozluk.php?process=word&q=$oku[ay]' target='main'>$oku[ay]</a>.<a href='sozluk.php?process=word&q=$oku[yil]' target='main'>$oku[yil]</a> ($format entry)</td></tr>";
}
?>
</table>
<?
cache_save('eforay');
?>