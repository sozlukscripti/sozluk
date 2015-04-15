<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('toplantisehirx');
?>
<td width="100%"> yazarlar hangi þehirlerde toplaþmýþ, toplantý yapmasý muhtemel yazarlar</td><p>
<table border="0" width="100%">
<?
$sorgu=mysql_query("select sehir,count(id) as sayi from user group by sehir order by sayi desc limit 0,10");
$toplam=mysql_num_rows(mysql_query("select id from user"));
?>
<?
$say=0;
while ($oku=mysql_fetch_array($sorgu)) {
$say++;
$oran=$toplam/$oku['sayi'];
$yoran=100/$oran;
 echo "<tr>
       <td>$say. <a href='sozluk.php?process=word&q=$oku[sehir]' target=main>$oku[sehir]</a>($oku[sayi])</td>
      <td>";
}
?>
</table>
<?
cache_save('toplantisehirx');
?>