<?
if ($tema and $process == "temabak") {
$tema =@$_GET["tema"];
$sorgu = "SELECT tema,id FROM temalar WHERE `tema` = '$tema'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$dbtema=$kayit["tema"];
if ($dbtema == $tema) {
$sorgu = "UPDATE user SET tema = '$tema' WHERE `nick` ='$verified_user'";
mysql_query($sorgu);
Header("Location: index.php");
}
else {
echo "Böyle bir tema yok ki ?";
die;
}
}
}
}
?>