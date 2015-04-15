<table border="0">
<?php
$cachetime = (3*60) * 1;
include "cache.php";
cache_check('bugunencok');
$bugun=date("d");
$ay=date("m");
$yil=date("Y");
$sorgu=mysql_query("select yazar,count(id) as sayi from mesajciklar where gun='$bugun' and ay='$ay' and yil='$yil' group by yazar order by sayi desc limit 0,10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
  <tr>
   <td><a href='$oku[yazar].html' target=main>$oku[yazar]</a> : $oku[sayi] Adet</td>
  </tr>
 ";
}
?>
<?
cache_save('bugunencok');
?>
</table>
