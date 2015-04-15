<fieldset>
<?
/*
zirve istatistikleri
*/

?>
<a href='sozluk.php?process=toplantigoster'>toplantý</a> | <a href='sozluk.php?process=toplantistat'>istatistikler</a><hr>
<br>
toplantýlarýn rakama dönüþmüs halleri<br>
<br>
<fieldset>
<table border="0">
<?php
echo "<div class='highlight'>en çok toplantý yapýlan þehirler</div>";
$sorgu=mysql_query("select sehir,count(id) as sayi from zirvemax group by sehir order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "<tr>
      <td>$say. $oku[sehir] - $oku[sayi]</td>
      <td>";
}
?> 

</table> </fieldset>
<br><hr><fieldset>
<table border="0">
<?php
echo "<div class='highlight'>en çok toplantý düzenliyenler'lar <a href='' title='en cok toplantý duzenleyenler'>*</a></div>";
$sorgu=mysql_query("select organizator,count(id) as sayi from zirvemax group by organizator order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "<tr>
      <td>$say. $oku[organizator] - $oku[sayi]</td>
      <td>";
}
?> 

</table></fieldset>
</fieldset>