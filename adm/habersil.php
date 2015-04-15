<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<?
if ($haber != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
$sorgu = "DELETE FROM haberler WHERE id = '$id' LIMIT 1";
mysql_query($sorgu);
echo "($id) haber silindi";
?>