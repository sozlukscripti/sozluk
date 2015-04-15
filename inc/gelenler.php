<?
$cachetime = (30*60) * 1;
include "cache.php";
cache_check('bugungelenler');
?>
<td>Bugün bu bataga düþenler</td>
<p>
<table border="0" width="100%">
<?php
$today= date("Y/m/d");

$sorgu=mysql_query("select nick from user where regtarih='$today%' group by nick desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
echo "<tr>
      <td><a href='sozluk.php?process=word&q=$oku[nick]' tarhet=main>$oku[nick]</a></td>
      <td>";
}
?> 
<?
cache_save('bugungelenler');
?>