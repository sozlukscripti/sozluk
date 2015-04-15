nesillere göre yazar:<br>
<table border="0">
<?php
$sorgu=mysql_query("select nesil,count(id) as sayi from user group by nesil order by sayi desc limit 2");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "<tr>
      <td>$say. <a href='sozluk.php?process=word&q=$oku[nesil]' tarhet=main>$oku[nesil] Nesil</a> - $oku[sayi]</td>
      <td>";
}
?> 

</table> 

