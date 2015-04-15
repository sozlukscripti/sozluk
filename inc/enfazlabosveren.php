<td>En Fazla - (bos) Oy Veren Yazarlar (Bilmiþler):</td>
<p>
<?php
echo "<table border='0'>";
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('enfazlabosveren');
$sorgu=mysql_query("select nick,count(id) as sayi from oylar where oy='0' group by nick order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
 <tr>
<td><a href='sozluk.php?process=word&q=$oku[nick]' target=main>$oku[nick]</a> : $oku[sayi] oy</td>
 </tr>
 ";
}
echo "</table>";
?>
<?
cache_save('enfazlabosveren');
?>
  
