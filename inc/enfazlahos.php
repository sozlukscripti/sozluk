<td>En Fazla + (hos) Oy'a Sahip Yazarlar:</td>
<p>
<?php
echo "<table border='0'>";
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('enfazlahos');
$sorgu=mysql_query("select entry_sahibi,count(id) as sayi from oylar where oy='1' group by entry_sahibi order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
 <tr>
  <td><a href='sozluk.php?process=word&q=$oku[entry_sahibi]' target=main>$oku[entry_sahibi]</a> : $oku[sayi] oy</td>
 </tr>
 ";
}
echo "</table>";
?>
<?
cache_save('enfazlhos');
?>
