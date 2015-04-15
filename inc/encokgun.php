<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('encokgun');
?>
<?
echo "<table border='0'>";
$sorgu=mysql_query("select gun,ay,yil,count(id) as say from mesajciklar group by gun,ay,yil order by say desc limit 0,10");
while ($oku=mysql_fetch_array($sorgu)) {
echo "<tr><td><b>Tarih:</b>$oku[gun].$oku[ay].$oku[yil]</td><td><b>Entry Sayisi:</b>$oku[say]</td>
</tr>";
}
echo "</table>";
?>
<?
cache_save('encokgun');
?>