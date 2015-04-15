
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns:fb="http://ogp.me/ns/fb#">
<HEAD>
<title>anka - olan biten</title>
<META http-equiv=Content-Type content="text/html; charset=windows-1254">
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
</HEAD>
<BODY>


</br>
</br>
<b><font size="3" color="#B7310B" margin: 5px;>olan biten</font></b>
</br>
<table class="mesajarka" width="90%"><tbody><tr><td><table width="100%" border="0" cellspacing="1">





<?
if ($verified_durum == "off" or $verified_durum == "wait") {

print "<fieldset><legend>Hosgeldin</legend>Merhaba sevgili caylak...<br>
Yazar olmak icin sadece 10 tane entry girmen gerekiyor. Caylaklik suresince araclar fasilitesinden yararlanamayacaksin. Eger 10 entry
ni girdiysen adminler tarafindan onaylanana kadar beklemelisin. Have Fun!<br>
</fieldset>";}


if ($statu) {
if ($statu != "disarida" and $statu != "mesgul" and $statu != "yemekte" and $statu != "iceride") {
die;
}
else {
$snerde = $statu;
session_register("snerde");
}
}

$snerde = $_SESSION['snerde'];

$listele = mysql_query("SELECT okundu,id FROM privmsg WHERE `kime`='$verified_user'");
while ($kayit=mysql_fetch_array($listele)) {
$okundu=$kayit["okundu"];
$id=$kayit["id"];
if ($okundu != 0) {
$okunmayan++;
}
if ($okundu == 2) {
$notice++;
$sorgu = "UPDATE privmsg SET okundu = '1' WHERE id= '$id'";
mysql_query($sorgu);
}
}

if ($notice)
echo "<SCRIPT>alert('$notice yeni mesaj. mesajlar bölümünden kontrol edebilirsiniz.');</SCRIPT>";

if ($okunmayan)
$pms = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a title=\"$okunmayan okunmayan mesajınız var\" href=sozluk.php?process=privmsg><img src=images/new.gif alt=\"$okunmayan okunmayan hede var\"> ($okunmayan)</a>";

?>
<TABLE width="100%" align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top width="75%">
      
          <DIV>
          <?



$limit=20;//kac tane veri çekeceksek buraya yazıyoruz 
$say=mysql_num_rows(mysql_query("select * from haberler"));
$toplam=ceil($say/$limit);//bulunan kaydı limite bolup bolum kalanlıysa bir ust tamsayıya değilse kendisini alıyoruz 
$page=@strip_tags(intval($_GET['sayfa']));// 
$basla=($page>0)?$page*$limit-$limit:0;//kacıncı kayıttan itibaren istiyorsak $baslaya onun değerini atıyoruz.sayfa deişkeni sıfırdan buyukse ve değilse diye ayırdık. 
if ($_GET['sayfa'] == "") {
$page = "1"; 
}	


	
		  

$sorgu = "SELECT * FROM haberler ORDER BY id desc  LIMIT $basla,$limit";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayıtları listele
echo "

<div style=\"text-align: left;\"> <b>olan biten</b> | <a href=\"sozluk.php?process=inbox\">inbox</a> | <a href=\"sozluk.php?process=outbox\">outbox</a></div></br></br>

";

if (!($limit >= $say)) { //sayfalanacak sayfa varsa sayfalamayı göster
echo "<div align='right' style=\"font-size:12px; margin-bottom:15px;\">";
if ($page >= 2) {
$oncekisayfa = $page-1;
echo " ";
}
echo "<select style=\"font-size:12px;\" id='link' name='link' onchange='javascript:window.location.href=this.value;'>";
for($i=1;$i<=$toplam;$i++){ 
if($page==$i){ //bulunduğunuz sayfa
echo "<option value='sozluk.php?process=olanbiten&sayfa=".$i."' selected>".$i."</option>&nbsp;";  
} 
else { 
echo "<option value='sozluk.php?process=olanbiten&sayfa=".$i."'>".$i."</option>&nbsp;";  
} 
}
echo "</select>";
$sonsayfa = $i-1;

if ($page >= $sonsayfa) {
echo "</div>";
}
else {
$bisonraki = $page+1;
echo " ";
}
}


echo "</div>";



if ($_GET["id"] == "") {



if (!$verified_user) { header("Location:http://www.ankasozluk.com"); }


echo "<table width='100%' border='1' style='border-collapse: collapse'>";
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
$konu=$kayit["konu"];
$aciklama=$kayit["aciklama"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];
$ay=$kayit["ay"];
$gun=$kayit["gun"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];


$konulink=ereg_replace(" ","+",$konu);

$aciklama = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$aciklama);
$aciklama = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$aciklama);
$aciklama = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$aciklama);
$aciklama = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $aciklama);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);


echo "<tr style='border:1px solid #333333'>

<td width='100' class='olanbiten' style=' padding:8px;'>
<a href=\"javascript:od('sozluk.php?process=ben&kim=$yazar',350,450)\"><b>$yazar</b>
</td>

<td class='olanbiten2' style='padding:8px;'>
<div style=''>
<b>$konu</b> <br/>
$aciklama";


echo "</div>




<div style=' margin-top:20px; '>

<div style='float:right;font-size:11px'>
$gun.$ay.$yil $saat
</div>




<div style='clear:both; '>
</div>

<div id=\"gizlebeni$id\" style=\"display:none\">
<fb:comments href=\"http://www.ankasozluk.com/anka/sozluk.php?process=olanbiten&id=$id\" num_posts=\"10\" width=\"500\"></fb:comments>
</div>

</div>



</td>


</tr>";


}
echo "</table>";

}
else {
$olid = mysql_real_escape_string($_GET["id"]);
$sorgu = "SELECT * FROM haberler WHERE id='$olid'";
$sorgulama = mysql_query($sorgu);

$kayit=mysql_fetch_array($sorgulama);

$konu=$kayit["konu"];
$aciklama=$kayit["aciklama"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];
$ay=$kayit["ay"];
$gun=$kayit["gun"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];



$konulink=ereg_replace(" ","+",$konu);

$aciklama = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$aciklama);
$aciklama = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$aciklama);
$aciklama = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$aciklama);
$aciklama = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $aciklama);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);




echo "<table width='100%' border='1' style='border-collapse: collapse'>";
echo "<tr style='border:1px solid #ddd'>

<td width='100' style='background-color:#BFBFBF;  padding:8px;'>
<a href='sozluk.php?process=ben&kim=$yazar'>$yazar</a>
</td>

<td style=' padding:8px;'>
<div style=''>
<b>$konu</b> <br/>
$aciklama
</div>
<div style='text-align:right; margin-top:20px; font-size:11px'>
$gun.$ay.$yil $saat
</div>


<fb:comments href=\"http://www.ankasozluk.com/sozluk.php?process=olanbiten&id=$olid\" num_posts=\"10\" width=\"500\"></fb:comments>

</td>


</tr>";
echo "</table>";
echo "<br/><br/><center><a class='but' href='sozluk.php?process=olanbiten'>tümünü göster</a></center>";

}



if (!($limit >= $say)) { //sayfalanacak sayfa varsa sayfalamayı göster
echo "<div align='right' style=\"font-size:12px; margin-top:15px;\">";
if ($page >= 2) {
$oncekisayfa = $page-1;
echo " ";
}
echo "<select style=\"font-size:12px;\" id='link' name='link' onchange='javascript:window.location.href=this.value;'>";
for($i=1;$i<=$toplam;$i++){ 
if($page==$i){ //bulunduğunuz sayfa
echo "<option value='sozluk.php?process=olanbiten&sayfa=".$i."' selected>".$i."</option>&nbsp;";  
} 
else { 
echo "<option value='sozluk.php?process=olanbiten&sayfa=".$i."'>".$i."</option>&nbsp;";  
} 
}
echo "</select>";
$sonsayfa = $i-1;

if ($page >= $sonsayfa) {
echo "</div>";
}
else {
$bisonraki = $page+1;
echo " ";
}
}


mysql_query("UPDATE user SET olanbiten='0' WHERE nick='$verified_user'");

}
?>
        </DIV>
      </TD>
    
</TR></TBODY></TABLE></TABLE>
<BR>
<BR>

</BODY></HTML>
</table>