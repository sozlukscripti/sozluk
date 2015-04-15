<fieldset><legend>oku</legend>
<?
if ($id) {
$sorgu1 = "SELECT gonderen,id,kime,konu,mesaj FROM privmsg WHERE `id` = '$id'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$gonderen=$kayit2["gonderen"];
$konu=$kayit2["konu"];
$id=$kayit2["id"];
$mesaj=$kayit2["mesaj"];
$kime=$kayit2["kime"];
if ($kime != $verified_user) {
echo "Lütfen tekrar giris yapin.";
die;
}

$sorgu = "UPDATE privmsg SET okundu = '0' WHERE `id` ='$id'";
mysql_query($sorgu);


$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$mesaj);
$mesaj = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $mesaj);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);

echo "
<input class=\"but\" type=\"button\" name=\"gmsj\" value=\"inbox\" onclick=\"top.main.location.href='sozluk.php?process=privmsg'\" accesskey=c>
<input class=\"but\" type=\"button\" name=\"cevapla\" value=\"cevapla\" onclick=\"top.main.location.href='?process=privmsg&islem=yenimsj&gkime=$gonderen&cevap=$id'\" accesskey=v>
<input class=\"but\" type=\"button\" name=\"sil\" value=\"sil\" onclick=\"top.main.location.href='?process=privmsg&islem=msjsil&id=$id'\" accesskey=a>
<input class=\"but\" type=\"button\" name=\"bloke\" value=\"bloke\" onclick=\"top.main.location.href='?process=dusmanekle&n=$gonderen'\" accesskey=x>
<br><br>  

<table width=\"100%\" border=\"0\">
  <tr> 

  </tr>
</table>
<table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" bgcolor=\"#666666\">
  <table width=\"100%\" height=\"170\" border=\"0\" cellspacing=\"1\" bgcolor=\"#666666\">
  <tr> 
    <td width=\"120\"  class=\"msjana2\" ></br><a href=\"javascript:od('sozluk.php?process=ben&kim=$gonderen',400,500)\"><center>$gonderen</a> <hr></br><b><b>$konu</b></center></td>
    <td class=\"msjana\" > <center>$mesaj</center>
</td>
  </tr>
</table>

<br>

<br>
<input class=\"but\" type=\"button\" name=\"gmsj\" value=\"inbox\" onclick=\"top.main.location.href='sozluk.php?process=privmsg'\" accesskey=c>
<input class=\"but\" type=\"button\" name=\"cevapla\" value=\"cevapla\" onclick=\"top.main.location.href='?process=privmsg&islem=yenimsj&gkime=$gonderen&cevap=$id'\" accesskey=v>
<input class=\"but\" type=\"button\" name=\"sil\" value=\"sil\" onclick=\"top.main.location.href='?process=privmsg&islem=msjsil&id=$id'\" accesskey=a>
<input class=\"but\" type=\"button\" name=\"bloke\" value=\"bloke\" onclick=\"top.main.location.href='?process=dusmanekle&n=$gonderen'\" accesskey=x>

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
</fieldset>