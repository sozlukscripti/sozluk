<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('gicikolmakisteyenler');
?>
<td>Gýcýk olmak icin yanýp tutuþanlar:</td>
<p>
<table border="0" width="100%">
<?php

$sorgu=mysql_query("select nick,count(id) as sayi from oylar where oy='0' group by nick order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 
echo "<tr>
      <td>$say. <a href='sozluk.php?process=word&q=$oku[nick]' tarhet=main>$oku[nick]</a> - $oku[sayi]</td>
      <td>";
}
?> 
<?
cache_save('gicikolmakisteyenler');
?>
