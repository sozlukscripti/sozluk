<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('silmesebebleri');
?>
Her entry yaþar, büyür, ölür:<br>
merak etmeyin onlarin hepsi birer melek olarak cennette...
<table border="0">
<?php
$sorgu=mysql_query("select silsebep,count(id) as sayi from mesajciklar group by silsebep order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "<tr>
      <td>$say. <a href='sozluk.php?process=word&q=$oku[silsebep]' tarhet=main>$oku[silsebep]</a> - $oku[sayi]</td>
      <td>";
}
?> 

</table> 
<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('silmesebebleri');
?>
