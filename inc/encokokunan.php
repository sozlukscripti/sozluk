<td></td>  
<p>  
<?php  
echo "<table border='0'>";  
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('encokokunan');
$sorgu=mysql_query("select baslik, (hit) as sayi from konucuklar group by baslik order by sayi desc limit 10");  
while ($oku=mysql_fetch_array($sorgu)) {  
 echo "
  <tr>
   <td><a href='$oku[baslik].html' target=main>$oku[baslik]</a> - $oku[sayi] Okuma</td>
  </tr>
 ";
}
?> 
<?
cache_save('encokokunan');
?>
</table>