<?
$cachetime = (5*60) * 1;
include "cache.php";
cache_check('duyuru');
?>
Duyduk duymadýk demeyenler:
<br>
<table border="0">
<?php
$sorgu=mysql_query("select yazar,count(id) as sayi from haberler group by yazar order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
  <tr>
   <td>$oku[yazar] - $oku[sayi]</td>
  </tr>
 ";
}
?>
</table> 
<?
cache_save('duyuru');
?>