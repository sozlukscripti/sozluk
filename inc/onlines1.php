<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=privmsg">mesajlar</A></DIV></TD>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=cop">kiþisel</A></DIV></TD>
         <TD class=tabsel>olan biten</TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=gorunum">tema</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=arkadaslarim">dost</A></DIV></TD>
         
         <?
		 if($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust"){?>
		 <TD class=tab>
            <DIV><A href="sozluk.php?process=modlog2">modlog</A></DIV></TD><? }?>
<TD class=tab>
            <DIV><A href="sozluk.php?process=yorumlarim">yorum alaný</A></DIV></TD>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=staff">Sözlük Yönetimi</A></DIV></TD>
          
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>


<META http-equiv=Content-Type content="text/html; charset=windows-1254"><LINK href="css/default/default.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
</HEAD>
<BODY>

<?
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
echo "<SCRIPT>alert('$notice okunmayan mesajýnýz var. postahane bölümünden kontrol edebilirsiniz.');</SCRIPT>";


if ($okunmayan != 0) {
$pms = "&nbsp; | &nbsp;<a title=\"$okunmayan okunmayan hede var\" href=sozluk.php?process=privmsg><img src=images/new.gif alt=\"$okunmayan okunmayan hede var\"> ($okunmayan)</a>";
} else { $pms = "&nbsp; | &nbsp;<a title=\"hepsini okumussun maþþallah\" href=sozluk.php?process=privmsg><img src=images/mail.gif alt=\"Herþeyi okuyup üflemissin maþþallah\"></a>";
}
?>
<TABLE width="95%" align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=left width="100%">





      <fieldset><LEGEND><B><? include "config.php";  echo $sitename;?>ten Haberler!</B></LEGEND>
          <DIV>
          <?
$sorgu = "SELECT * FROM haberler ORDER BY id desc LIMIT 5";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$konu=$kayit["konu"];
$aciklama=$kayit["aciklama"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];
$ay=$kayit["ay"];
$gun=$kayit["gun"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];



$aciklama = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$aciklama);
$aciklama = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$aciklama);
$aciklama = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$aciklama);
$aciklama = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $aciklama);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);

echo "
<a class=highligth>$konu
      [$gun/$ay/$yil $saat]</a><BR>
      <font size=1>$aciklama</font>
      <BR>
      <strong>$yazar</strong>
      <HR SIZE=3>
      ";
}
}
?>
        </DIV>
      </fieldset></TD>
    <TD vAlign=top align=left width="1%">

     

<?php
//include "onlinee.php";
//include "arac.php";
?>
</TD>
</tr>
<tr>
<td align="right" width="50%">
<?php include "onlinee.php"; ?>
</td>
</TR>
</div>
      </TABLE>

</BODY></HTML>