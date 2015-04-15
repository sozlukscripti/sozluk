<?

$sorgu = "DELETE FROM privmsg WHERE kime = '$verified_user' and id = '$id' LIMIT 1";
mysql_query($sorgu);
if (mysql_query($sorgu))
Header ("Location: sozluk.php?process=privmsg");
?>