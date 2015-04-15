<?
$sorgu1 = "SELECT sayac FROM spam";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$sayac=$kayit2["sayac"];
$ysayac = $sayac + 1;
$sorgu = "UPDATE spam SET sayac='$ysayac' WHERE sayac='$sayac'";
mysql_query($sorgu);
if ($goster) 
{
	echo "$sayac toplam ziyaretçi.";
	die;
}
Header("Location: ?ae=reg1");
?>