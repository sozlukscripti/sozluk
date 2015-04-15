<? 
$sorgu=mysql_query("select sira,count(id) as sayi from mesajciklar group by sira order by sayi desc limit 0,10"); 
echo "<table border=0>"; 
echo "<tr><td colspan=2>en çok entry girilen baþlýklar</td></tr>"; 
while ($oku=mysql_fetch_assoc($sorgu)) { 
$baslik=@mysql_result(mysql_query("select baslik,id from konucuklar where id='$oku[sira]'"),0,'baslik'); 
if (!empty($baslik)) { 
echo " 
<tr> 
 <td><a href='sozluk.php?process=word&q=$baslik' target=main>$baslik</a></td> 
 <td>$oku[sayi]</td> 
</tr> 
"; 
} 
} 
echo "</table>"; 
?> 
