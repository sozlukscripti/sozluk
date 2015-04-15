<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('bugunyazan');
?>

<td>Günün çalýþkan yazarlarý:</td>
<p>
<table border="0" width="100%">
<?
$bugun=date("d");
$ay=date("m");
$yil=date("Y");
$sorgu=mysql_query("select yazar,count(id) as sayi from mesajciklar gun='$bugun' and ay='$ay' and yil='$yil' group by yazar order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
  <tr>
   <td>$oku[yazar] - $oku[sayi]</td>
  </tr>
 ";
}
?>
<?
cache_save('bugunyazan');
?>
