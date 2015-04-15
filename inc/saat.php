<?
$cachetime = (10*60) * 1;
include "cache.php";
cache_check('saatista');
?>

<td width="100%">hangi saatlerde entry girilmiþ:</td><p>
<table border="0" width="100%">
<?
$sorgu=mysql_query("select saat,count(id) as sayi from mesajlar group by saat order by sayi desc limit 0,10");
$toplam=mysql_num_rows(mysql_query("select id from user"));
?>
<?
$say=0;
while ($oku=mysql_fetch_array($sorgu)) {
$say++;
$oran=$toplam/$oku['sayi'];
$yoran=100/$oran;
 echo "<tr>
       <td>$say. <a href='sozluk.php?process=word&q=$oku[saat]' target=main>$oku[saat]</a>($oku[sayi])</td>
      <td>";
}
?>
</table>
<?
cache_save('saatista');
?>