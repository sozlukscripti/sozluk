<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('endaginik');
?>
En daðýnýk, en üþengeç, en pasaklý yazarlar:
<table border="0">
<?php
$sorgu=mysql_query("select kime,count(id) as sayi from privmsg group by kime order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
  <tr>
   <td>$oku[kime] - $oku[sayi]</td>
  </tr>
 ";
}
?>
</table>
<?
cache_save('endaginik');
?>