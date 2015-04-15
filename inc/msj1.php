<?php
echo "<table border='0'>";
$sorgu=mysql_query("select baslik,count(id) as sayi from eniyiler where eid");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
 <tr>
  <td>$oku[baslik] - $oku[sayi] eid</td>
 </tr>
 ";
}
echo "</table>";
?> 
