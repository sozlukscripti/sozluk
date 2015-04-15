<?

$bolum =@$_POST["bolum"];
if ($bolum == "Diðer"){$bolum =@$_POST["bolum2"];}
if (empty ($bolum)){echo "Bi zahmet bölüm yaz..";}else{

$sorgu = "UPDATE user SET bolum='$bolum' WHERE nick='$nick'";
mysql_query($sorgu);
echo "sayýn $nick; <br>yeni bölümün $bolum olarak deðiþtirildi. 
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=cop\">";}
exit;
mysql_close();

?>
