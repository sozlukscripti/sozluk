<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('encokentrykasan');
?>
sözlükte 10 kaplan gücünde olan, klavyelerinin tuþlarý okunmayan yazarlar:<p>
<table border="0" width="60%">
<?
$sorgu=mysql_query("select yazar,count(id) as sayi from mesajciklar group by yazar order by sayi desc limit 0,15");
$toplam=mysql_num_rows(mysql_query("select id from mesajciklar"));
?>
<tr>
 <td nowrap>toplam</td><td nowrap width="100%"><div class=highlight  style='text-align:right; width:100%'><?=$toplam?></td>
</tr>
<?
$say=0;
while ($oku=mysql_fetch_array($sorgu)) {
$say++;
$oran=$toplam/$oku['sayi'];
$yoran=70/$oran;
$kes=substr($yoran,0,1);
echo "<tr>
       <td nowrap>$say. <a href='sozluk.php?process=word&q=$oku[yazar]' target=main>$oku[yazar]</a></td><td nowrap width='100%'><div class=highlight  style='text-align:right; width:$kes%'>$oku[sayi]</td>
      <td>";
}
?>
</table> 
<?
cache_save('encokentrykasan');
?>