<?
$cachetime = (60*24) * 180;
include "cache.php";
cache_check('ilkkullanici');
?>

bu ibiþler sözlügün ilk kullanýcýlarýdýr,<br>
ibreti alem için sergilenmektedir;<br>
<?


$sorgu2 = "SELECT nick FROM user desc limit 10";
$sorgulama2 = @mysql_query($sorgu2);
if (@mysql_num_rows($sorgulama2)>0){

while ($kayit2=@mysql_fetch_array($sorgulama2)){

$nick=$kayit2["nick"];

echo "<table>
<tr>
<td><a class='link' href='sozluk.php?process=word&q=$nick'>$nick</a></td></tr></table>";

}
}
?>
<?
cache_save('ilkkullanici');
?>
