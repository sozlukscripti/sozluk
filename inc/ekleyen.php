<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('encokekleyen');
?>
Arkadas canlýsý sosyallesme yanlýsý yazarlar:<p>
<table border="0">
<?php
$sorgu=mysql_query("select kimin,count(id) as sayi from rehber group by kimin order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
  <tr>
   <td>$oku[kimin] - $oku[sayi]</td>
  </tr>
 ";
}
?>
</table>  
<?
cache_save('encokekleyen');
?>