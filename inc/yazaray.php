<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('yazarayx');
?>

<table border="0" width="60%">
<?
$sorgu=mysql_query("select entry_sahibi,count(id) as sayi from oylar where oy='1' group by entry_sahibi order by sayý  desc limit 0,10");
$toplam=mysql_num_rows(mysql_query("select entry_sahibi from oylar "));
?>
<tr>
 <td nowrap>toplam</td><td nowrap width="100%"><div class=highlight  style='text-align:right; width:100%'><?=$toplam?></td>
</tr>
<?
$say=0;
while ($oku=mysql_fetch_array($sorgu)) {
$say++;
$oran=$toplam/$oku['sayi'];
$yoran=100/$oran;
$kes=substr($yoran,0,1);
echo "<tr>
       <td nowrap>$say. <a href='sozluk.php?process=word&q=$oku[entry_sahibi]' target=main>$oku[entry_sahibi]</a></td><td nowrap width='100%'><div class=highlight  style='text-align:right; width:$kes%'>$oku[sayi]</td>
      <td>";
}
?>
</table> 
<?
cache_save('yazarayx');
?>