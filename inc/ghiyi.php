<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('buhaftabegenilen');
?>
<?
$gun1=date("d",strtotime("yesterday"));
$gun2=date("d",strtotime("-2 days"));
$gun3=date("d",strtotime("-3 days"));
$gun4=date("d",strtotime("-4 days"));
$gun5=date("d",strtotime("-5 days"));
$gun6=date("d",strtotime("-6 days"));
$gun7=date("d",strtotime("-7 days"));
$ay=date("m");
$yil=date("Y");
$sql="select mesajciklar.id, ( select count(id) from oylar where mesajciklar.id=entry_id and oy='1') as say from mesajciklar where (gun='".$gun1."' or gun='".$gun2."' or gun='".$gun3."' or gun='".$gun4."' or gun='".$gun5."' or gun='".$gun6."' or gun='".$gun7."') and ay='".$ay."' and yil='".$yil."' and statu='' order by say desc limit 10";

$sorgu=mysql_query($sql) or die(mysql_error());
$sorgu2=mysql_query($sql);
while ($a=mysql_fetch_array($sorgu)) {
    $sayi=$a[say];
    $toplam=$toplam+$sayi;
}

echo "bu hafta coþan entryler";
echo "<table border='0'>";
$say=0;
while ($oku=mysql_fetch_array($sorgu2)) {
    $say++;
    $oran=($oku[say]/$toplam)*100;
    $oran=ceil($oran);
    echo "<tr><td nowrap>$say. <a href='sozluk.php?process=eid&eid=$oku[id]' target='main'>#$oku[id]</a></td>
    <td nowrap width='100%'><div class='highlight' style='text-align: right; width:$oran%'>$oku[say] oy</div></td>
    </tr>";
}
echo "</table>";
?> 
<?
cache_save('buhaftabegenilen');
?>