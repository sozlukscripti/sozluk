<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('satatukuz');
?>
<?php
echo "<table border='0'>";
$sorgu=mysql_query("select baslik,count(id) as sayi from konular by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
 <tr>
  <td>$oku[baslik] - $oku[sayi] statu</td>
 </tr>
 ";
}
echo "</table>";
?>
<?
cache_save('satatukuz');
?>
