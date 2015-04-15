<?
$sorgu = "SELECT id,ukteadi FROM ukte";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_assoc($sorgulama)){


echo "<tr>
	   
       <td nowrap><div><strong><em><a href='$kayit[ukteadi].html' target=main>$kayit[ukteadi]</a></em></strong></div></td>
      <td>";
}
}
?>

