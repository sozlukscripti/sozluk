<?

$sehir =@$_POST["sehir"];

$sorgu = "UPDATE user SET sehir='$sehir' WHERE nick='$nick'";
mysql_query($sorgu);
echo "sayýn $nick; <br>yeni yerin $sehir olarak deðiþtirildi. 
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=cop\">";
exit;
mysql_close();

?>
