<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('enfazleentrygirilengun');
?>
<td width="100%">en fazla hangi gun entry girilmis.</td><p>
<table border="0" width="100%">
<?
$sorgu=mysql_query("select gun,count(id) as sayi from mesajciklar group by gun order by sayi desc limit 0,10");
$toplam=mysql_num_rows(mysql_query("select id from user"));
?>
<?
$say=0;
while ($oku=mysql_fetch_array($sorgu)) {
$say++;
$oran=$toplam/$oku['sayi'];
$yoran=100/$oran;
 echo "<tr>
       <td>$say. <a href='sozluk.php?process=word&q=$oku[gun]' target=main>$oku[gun]</a>($oku[sayi])</td>
      <td>";
}
?>
</table>
<?
cache_save('enfazleentrygirilengun');
?>