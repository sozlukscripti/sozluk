<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('enpopbolum');
?>
En fazla okunan bölümler:<p>
<table border="0">
<?
$sorgu=mysql_query("select bolum,count(id) as sayi from user  group by bolum order by sayi desc limit 0,10");
while ($oku=mysql_fetch_array($sorgu)) {
	echo "
	<tr>
	<td>$oku[bolum] - $oku[sayi] kiþi</td>
	</tr>
	";
}
echo "</table>";
?>
<?
cache_save('enpopbolum');
?>