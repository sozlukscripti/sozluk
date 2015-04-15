<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<?

if ($verified_kat="admin") {
echo " <a href=\"javascript:if(confirm('tüm özel mesajlarý siliyorsun son kararýn mi?'))location.href='sozluk.php?process=adm&islem=sildb'\"> silmek için bas gaza </a></td>";
}
echo "<br> <font color='red'><i>Çýkan uyarýya tamam dersen tüm kullanicilarin özel mesajlarý silinecek</i></font><br><br><br>";

if ($verified_kat="admin") {
echo "<a href='sozluk.php?process=tebrikmail'>Dokunma Bile Buna</a>"; }
?>