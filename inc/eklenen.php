<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('encokeklenen');
?>

Popüler yazarlar:<p>
<table border="0">
<?php
$sorgu=mysql_query("select kim,count(id) as sayi from rehber group by kim order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
  <tr>
   <td>$oku[kim] - $oku[sayi]</td>
  </tr>
 ";
}
?>

</table> 

<?
cache_save('encokeklenen');
?>