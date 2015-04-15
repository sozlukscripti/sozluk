<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('encokmesajlasanlar');
?>
Sosyallesme top 10:<br>
<small>(yemeyip, içmeyip mesajlasanlar)</small>
<p>
<table border="0">
<?php
$sorgu=mysql_query("select gonderen,count(id) as sayi from privmsg group by gonderen order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {

 echo "<tr>
      <td>$say. <a href='sozluk.php?process=word&q=$oku[gonderen]' tarhet=main>$oku[gonderen]</a> - $oku[sayi]</td>
      <td>";
}
?> 

</table>
<?
cache_save('encokmesajlasanlar');
?>
