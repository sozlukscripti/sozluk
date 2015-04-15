<?php
if ($verified_user) {



$sorgu1 = "SELECT * FROM user WHERE nick = '$verified_user'";

$sorgu2 = mysql_query($sorgu1);

$kayit2=mysql_fetch_array($sorgu2);

$tema=$kayit2["tema"];
$silikmi=$kayit2["durum"];

if (!$tema) {

$tema = "default"; }

if ($silikmi == "sus") {
header("Location:logout.php");
}



$id = strip_tags(trim(mysql_real_escape_string($_GET["id"])));

$konuuyebilgi = mysql_fetch_array(mysql_query("select * from konucuklar WHERE id='$id'")); 
$konuuyebilgi2 = mysql_num_rows(mysql_query("select * from konucuklar WHERE id='$id'")); 
$konuuyebilgi23 = $konuuyebilgi["baslik"];
if ($konuuyebilgi2 > 0) {
if (mysql_query("DELETE FROM basliktakip WHERE yazar='$verified_user' and baslik='$konuuyebilgi23'")){
echo "<script type=\"text/javascript\">location.href='$konuuyebilgi23.html';</script>";
}
}
else {
echo "hatalý id.";
}


}
else {
echo "yetkiniz yok..";
}

?>