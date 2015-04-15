<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('katilimsehir');
?>
<table border="0">
<?php
$sorgu=mysql_query("select sehir,count(id) as sayi from user group by nick order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
  <tr>
   <td>$oku[sehir] - $oku[sayi]</td>
  </tr>
 ";
}
?>
</table>
<?
cache_save('katilimsehir');
?>