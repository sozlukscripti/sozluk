<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('enteresanyazanyazarlar');
?>

<td>bi garip, bi acayip, bi bi bi $ey yazan yazarlar:</td>
<p>
<table border="0" width="100%">
<?php

$sorgu=mysql_query("select entry_sahibi,count(id) as sayi from oylar where oy='2' group by entry_sahibi order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 
echo "<tr>
      <td>$say. <a href='sozluk.php?process=word&q=$oku[entry_sahibi]' tarhet=main>$oku[entry_sahibi]</a> - $oku[sayi] oy</td>
      <td>";
}
?> 
<?
cache_save('enteresanyazanyazarlar');
?>