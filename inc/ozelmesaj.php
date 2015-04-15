<?php
echo "<table border='0'>";
$sorgu=mysql_query("select user,count(id) as sayi from privmsg where privmsg='1' group by user order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
 <tr>
  <td>$oku[entry_sahibi] - $oku[sayi] privmsg</td>
 </tr>
 ";
}
echo "</table>";
?>

