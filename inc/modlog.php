<?
cache_check('modlogx');
?>

<table border="0">
<?php
$sorgu=mysql_query("select islem_zamani,count(id) as sayi from online group by islem_zamani order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
  <tr>
   <td>$oku[islem_zamani] - $oku[sayi]</td>
  </tr>
 ";
}
?>
</table> 
