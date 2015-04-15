<?

if ($id) {
$sorgu1 = "SELECT gonderen,id,kime,konu,mesaj FROM gidenmsg WHERE `id` = '$id'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$gonderen=$kayit2["gonderen"];
$konu=$kayit2["konu"];
$id=$kayit2["id"];
$mesaj=$kayit2["mesaj"];
$kime=$kayit2["kime"];
if ($gonderen != $verified_user) {
echo "Lütfen tekrar giris yapin. $gonderen -- $verified_user";
die;
}




$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$mesaj);
$mesaj = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $mesaj);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);

echo "
<input class=\"but\" type=\"button\" name=\"cevapla\" value=\"geri\" onclick=\"top.main.location.href='?process=privmsg&islem=sentmsg'\" accesskey=v>
konu: $konu</b><br><br>
mesaj: </a><br>
----------------------------------------------------------<br>
<font size=2>
$mesaj
</font>
<br>
----------------------------------------------------------
<br>

<input class=\"but\" type=\"button\" name=\"cevapla\" value=\"geri\" onclick=\"top.main.location.href='?process=privmsg&islem=sentmsg'\" accesskey=v>
";

if ($konu == "<img src=images/unlem.gif> Yazar oldunuz!") {
$sorgu = "UPDATE user SET durum = 'on' WHERE nick= '$verified_user'";
mysql_query($sorgu);
$durum = "on";
session_register("durum");
$sorgu = "UPDATE online SET ondurum = '$durum' WHERE nick= '$verified_user'";
mysql_query($sorgu);

$sorgu = "DELETE FROM privmsg WHERE kime = '$verified_user' and id = '$id' LIMIT 1";
mysql_query($sorgu);
if (mysql_query($sorgu))
echo "<center><b>Bu mesaj kendi kendini imha etti!</b></center>";

}

}
?>