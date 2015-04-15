<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('idarikadro');
?>
<table border="0" width="70%">
<div align="center">
  <p><strong>Adminler</strong></p>
<p><font color="#FF0000"><?
$sorgu = "SELECT nick,durum,email,id,isim FROM user WHERE `yetki` = 'admin'";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_assoc($sorgulama)){


echo "<tr>
	   
       <td nowrap><div><strong><em><a href='$kayit[nick].html' target=main>$kayit[nick]</a></em></strong></div></td>
      <td>";
}
}
?></font></p>
</div>

<div align="center">
<p><strong>Moderatörler</strong></p>
<p><font color="#0000FF">
<?
$sorgu = "SELECT nick,durum,email,id,isim FROM user WHERE `yetki` = 'mod'";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_assoc($sorgulama)){


echo "<tr>
	   
       <td nowrap><div><strong><em><a href='$kayit[nick].html' target=main>$kayit[nick]</a></em></strong></div></td>
      <td>";
}
}
?></font></p>
</div>


<div align="center">
<p><strong>Gammazlar</strong></p>
<p><font color="#00FF00">
<?
$sorgu = "SELECT nick,durum,email,id,isim FROM user WHERE `yetki` = 'gammaz'";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_assoc($sorgulama)){


echo "<tr>
	   
       <td nowrap><div><strong><em><a href='$kayit[nick].html' target=main>$kayit[nick]</a></em></strong></div></td>
      <td>";
}
}
?></font></p>
</div>


</table> 
<?
cache_save('idarikadro');
?>