<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('encokbaslik');
$sorgu=mysql_query("select sira,count(id) as sayi from mesajciklar group by sira order by sayi desc limit 0,20");
echo "<table border=0>";
echo "<tr><td colspan=2>en �ok entry girilen ba�l�klar</td></tr>";
while ($oku=mysql_fetch_array($sorgu)) {
$baslik=@mysql_result(mysql_query("select baslik,id from konucuklar where id='$oku[sira]'"),0,'baslik');
if (!empty($baslik)) {
echo "
<tr>
 <td><a href='sozluk.php?process=word&q=$baslik' target=main>$baslik</a></td>
 <td>$oku[sayi]</td>
</tr>
";
}
}
echo "</table>";
?>
<?
cache_save('encokbaslik');
?>