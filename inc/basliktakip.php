</br>
</br>
<b><font size="3" color="#B7310B" margin: 5px;>başlık takip</font></b>
</br>
</br>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1254">
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
</HEAD>
<BODY>

<?



if (!$verified_user) die("just register yazarlar girebilir lan!");

?>



<td class="tabin">

<table>

<tr>

<td>



<?php

 


$limit = 9999999999;
$sayfa = $_GET["sayfa"];
if(($sayfa=="") or !is_numeric($sayfa)){
 	 $sayfa=1; }
$satirsayisi = mysql_num_rows(mysql_query("SELECT * FROM bildirim WHERE nick='$verified_user'"));
$toplamsayfa = ceil($satirsayisi / $limit);
$baslangic= ($sayfa-1) * $limit;


$bildirimq = mysql_query("SELECT * FROM basliktakip WHERE yazar='$verified_user'");
$bildirims = mysql_num_rows($bildirimq);
$sorgubil = mysql_query("SELECT * FROM basliktakip WHERE yazar='$verified_user' ORDER BY id DESC LIMIT $baslangic,$limit");

if ($bildirims == 0) {
echo "<br/><br/><b>hiç takip ettiğiniz başlık yok..<br/>başlık takip etmek için başlığın yanındaki \"+\" butonuna tıklayın.</b>";
}
else {











$gun = date("d");

$ay = date("m");

$yil = date("Y");

$saat = date("H:i");



echo "

</fieldset>
<table style=\"width:600px\">
<tr><td align=\"left\" class=\"sade\"><b>başlık</b></td><td align=\"right\" class=\"sade\"><b>bugün  -  bırak</b></td></tr></table>
<table style=\"width:600px\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" class=\"sagtable\">
";

while ($bildirimw = mysql_fetch_array($sorgubil)) {
$bildirimwbaslik = $bildirimw["baslik"];
$bildirimbilgileri = mysql_fetch_array(mysql_query("SELECT * FROM konucuklar WHERE baslik='$bildirimwbaslik'"));
$bildirimbilgileriid = $bildirimbilgileri["id"];
$bildirimbilgileri2222 = mysql_num_rows(mysql_query("SELECT * FROM mesajciklar WHERE sira='$bildirimbilgileriid' and gun='$gun' and ay='$ay' and yil='$yil'"));
?>
<tr><td bgcolor="#DFF5DC" style="width:500px;"><a href="sozluk.php?process=word&q=<?=$bildirimwbaslik; ?>"><?=$bildirimwbaslik;?></a></td><td align="center" bgcolor="#DFF5DC" width="50"><?=$bildirimbilgileri2222;?></td><td align="center"bgcolor="#DFF5DC"><a href="sozluk.php?process=basliktakipkaldir2&id=<?=$bildirimbilgileriid;?>"><span>çıkar</span></a></td></tr>
</fieldset>
<?php
}

}
?>
</table>

</fieldset>
</TABLE>
</TR></TBODY></TABLE>
<BR>
<BR>
<?
if ($verified_user) {
 include("foot.php"); 
 }
 ?>
</BODY>
</HTML>
