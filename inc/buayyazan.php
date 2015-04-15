<table border="0">
<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('buayyazan');

$ay=date("m");
$sorgu=mysql_query("select yazar,count(id) as sayi from mesajciklar where ay='$ay'  group by yazar order by sayi desc limit 0,10");
while ($oku=mysql_fetch_array($sorgu)) {
	echo "
	<tr>
	<td>$oku[yazar] - $oku[sayi]</td>
	</tr>
	";
}
?>
<?
cache_save('buayyazan');
?>
</table>