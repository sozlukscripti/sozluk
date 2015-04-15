<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('enfazlaukde');
?>

<small>utanmadan!</small>en fazla ukde verenler:
<table border="0">
<?php
$sorgu=mysql_query("select yazar,count(id) as sayi from ukde group by yazar order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "<tr>
      <td>$say. <a href='sozluk.php?process=word&q=$oku[yazar]' tarhet=main>$oku[yazar]</a> - $oku[sayi]</td>
      <td>";
}
?> 

</table> 
<?
cache_save('enfazlaukde');
?>

