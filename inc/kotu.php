<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('enkotuentryler');
?>
eksi yaðmuruna tutulmuþ, beðenilmeyen entryler:<p>
<?
$sorgu=mysql_query("select entry_id,count(entry_id) as sayi from oylar where oy='0' group by entry_id order by sayi desc limit 0,15");
$kac=0;
while($oku=mysql_fetch_array($sorgu)) {
$kac++;
$id=$oku['entry_id'];
$say=$oku['sayi'];
    echo "<td>$kac. <a href='sozluk.php?process=eid&eid=$oku[entry_id]' 
target='main'>#$oku[entry_id]</a> ($say oy)</td><br></tr>"; 
}
?>
<?
cache_save('enkotuentryler');
?>