<TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD class=tab>
            
           <DIV><A href="sozluk.php?process=privmsg">inbox</A></DIV></TD>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=cop">ayarlar</A></DIV></TD>
          <TD class=tab>
         <TD class=tabsel>olan biten</TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=gorunum">tema</A></DIV></TD>
         <TD class=tab>
         <DIV><A href="sozluk.php?process=arkadaslarim">panpa</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=dusmanlarim">bloke</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=modlog2">modlog</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=arac">sub-ethna</A></DIV></TD>
         <TD class=tab>
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>
         <TD class=tab>
          
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns:fb="http://ogp.me/ns/fb#">
<HEAD>
<title>anka sözlük - olan biten</title>
<META http-equiv=Content-Type content="text/html; charset=windows-1254">
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
</HEAD>
<BODY>







<td class="tabin">
<?
if ($verified_durum == "off" or $verified_durum == "wait") {

print "<fieldset><legend>Hosgeldin</legend>Merhaba sevgili caylak...<br>
çaylakken girdiðin entryler sadece çaylaklar tarafýndan görünür,
adminler onaylayana kadar beklemen lazým,
yada pm atarak ulaþabilirsin.<br>
</fieldset>"
;}


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
$pms = "&nbsp; | &nbsp;<a title=\"$okunmayan okunmayan mesajýnýz var\" href=sozluk.php?process=privmsg><b>inbox</b> ($okunmayan)</a>";

?>
<TABLE width="100%" align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top width="75%">
      
          <DIV>
          <?



$limit=10;//kac tane veri çekeceksek buraya yazýyoruz 
$say=mysql_num_rows(mysql_query("select * from haberler"));
$toplam=ceil($say/$limit);//bulunan kaydý limite bolup bolum kalanlýysa bir ust tamsayýya deðilse kendisini alýyoruz 
$page=@strip_tags(intval($_GET['sayfa']));// 
$basla=($page>0)?$page*$limit-$limit:0;//kacýncý kayýttan itibaren istiyorsak $baslaya onun deðerini atýyoruz.sayfa deiþkeni sýfýrdan buyukse ve deðilse diye ayýrdýk. 
if ($_GET['sayfa'] == "") {
$page = "1"; 
}	


	
		  

$sorgu = "SELECT * FROM haberler ORDER BY id desc  LIMIT $basla,$limit";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele


if (!($limit >= $say)) { //sayfalanacak sayfa varsa sayfalamayý göster
echo "<div align='right' style=\"font-size:12px; margin-bottom:15px;\">";
if ($page >= 2) {
$oncekisayfa = $page-1;
echo "<span class='link'><a title='önceki sayfa' href='sozluk.php?process=olanbiten&sayfa=$oncekisayfa'>&#60;&#60;</a></span> ";
}
echo "<select style=\"font-size:12px;\" id='link' name='link' onchange='javascript:window.location.href=this.value;'>";
for($i=1;$i<=$toplam;$i++){ 
if($page==$i){ //bulunduðunuz sayfa
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
echo " <span class='link'><a title='sonraki sayfa' href='sozluk.php?process=olanbiten&sayfa=".$bisonraki."'></a></span></div>";
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


echo "<tr style='border:1px solid #ddd'>

<td width='100' style='background-color:#BFBFBF;  padding:8px;'>
<a href=\"javascript:od('sozluk.php?process=ben&kim=$yazar',350,450)\"><font size='2'>$yazar</font>
</td>

<td style=' padding:8px;'>
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



if (!($limit >= $say)) { //sayfalanacak sayfa varsa sayfalamayý göster
echo "<div align='right' style=\"font-size:12px; margin-top:15px;\">";
if ($page >= 2) {
$oncekisayfa = $page-1;
echo "<span class='link'><a title='önceki sayfa' href='sozluk.php?process=olanbiten&sayfa=$oncekisayfa'>&#60;&#60;</a></span> ";
}
echo "<select style=\"font-size:12px;\" id='link' name='link' onchange='javascript:window.location.href=this.value;'>";
for($i=1;$i<=$toplam;$i++){ 
if($page==$i){ //bulunduðunuz sayfa
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
echo " <span class='link'><a title='sonraki sayfa' href='sozluk.php?process=olanbiten&sayfa=".$bisonraki."'>&#62;&#62;</a></span></div>";
}
}


mysql_query("UPDATE user SET olanbiten='0' WHERE nick='$verified_user'");

}
?>
        </DIV>
      </TD>
    </TD>
<td align="left" width="40%">
<?php include "onlinee.php"; ?>
</td>
<td align="left" width="50%">
<?php 
//include "onlinee.php";
?></td></TR>
</div>
</TR></TBODY></TABLE></TABLE>
<BR>
<BR>

</BODY></HTML>


