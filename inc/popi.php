<?
if ((isset($_GET["sayfa"])) && ($_GET["sayfa"] <= "0")) {
echo "vaaay akilli!!!";
die();
} 
include "hayvanara.php";
if ($verified_user) {
$osorgu=mysql_query("select * from online where nick='$verified_user'");
$ono=@mysql_num_rows($osorgu);
$oip = getenv('REMOTE_ADDR');
if ($ono==0) {
$zaman=time();
mysql_query("insert into online values('$verified_user','$zaman','$oip','on')");
} else if ($ono>=2) {
mysql_query("delete from online where nick='$verified_user'");
}
}
?>

<? 
$sorgu=mysql_query("select sira,count(id) as sayi from mesajciklar group by sira order by sayi desc limit 0,40"); 
echo "<table border=0>"; 
echo "<center><div class=pagi><font face=Verdana size=1>
poppi baþlýklar..<br>
"; 
while ($oku=mysql_fetch_assoc($sorgu)) { 
$baslik=@mysql_result(mysql_query("select baslik,id from konucuklar where id='$oku[sira]'"),0,'baslik'); 
if (!empty($baslik)) { 
echo " 
<tr> 
 <td><a href='sozluk.php?process=word&q=$baslik' target=main>$baslik</a>&nbsp;($oku[sayi])</td> 

</tr> 
"; 
} 
} 
echo "</table>"; 
?> 
