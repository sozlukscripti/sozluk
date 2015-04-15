
</br>
</br>
<b><font size="3" color="#B7310B" margin: 5px;>gönderdiðim mesajlar</font></b>
</br>
<table class="mesajarka" width="90%"><tbody><tr><td><table width="100%" border="0" cellspacing="1">

<?
if ($silanam == "sentsil") {
$sorgu = "DELETE FROM gidenmsg WHERE gonderen = '$verified_user'";
mysql_query($sorgu);
}

if ($ok) {
foreach($id as $kayit)
{
$sorgu = "DELETE FROM gidenmsg WHERE gonderen = '$verified_user' and id = '$kayit' LIMIT 1";
mysql_query($sorgu);
}
}

$sorgu = "select id,kime,konu,sentid,tarih,gun,ay,yil,saat,gonderen,mesaj from gidenmsg WHERE gonderen = '$verified_user' ORDER BY sentid desc";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
echo "
<form name=mailOperations method=post action=>
<table width=\"597\" border=\"0\">

<div style=\"text-align: left;\"><a href=\"sozluk.php?process=olanbiten\">olan biten</a> | <a href=\"sozluk.php?process=inbox\">inbox</a> | <b>outbox</b></div></br></br></br>

  <tr>
    <td colspan=\"5\" align=\"center\" valign=\"bottom\"><table width=\"597\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\" bordercolor=\"#00000\">

";

while ($kayit=mysql_fetch_array($sorgulama)){
$id=$kayit["id"];
$kime=$kayit["kime"];
$konu=$kayit["konu"];
$mesaj=$kayit["mesaj"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$sentid=$kayit["sentid"];
$sql2	=	"SELECT id, okundu FROM privmsg WHERE id='$sentid'";
$run2	=	mysql_query($sql2) or die("hata:".mysql_error());
$sentx	=	mysql_fetch_assoc($run2);
//echo	$sentx['okundu'];
if($sentx['okundu'] == 2) { 
	$mesajdurum ="okunmamýþ";
		} else { 
			$mesajdurum = "görüldü"; 
	}
if ($okundu != 0)
$yeni = "<b>(Yeni)</b>";
else
$yeni = "";
echo "
<table  width=\"700\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" bgcolor=\"#666666\">
  <table  width=\"700\" height=\"90\" border=\"0\" cellspacing=\"1\" bgcolor=\"#666666\" align=\"left\">

  <tr> 
    <td width=\"120\"  class=\"inbox\" ></br><center><b>to: </b><a href=\"javascript:od('sozluk.php?process=ben&kim=$kime',350,450)\">$kime $yeni</center></a></td>
    <td class=\"inbox2\" ><center>$mesaj</center>
<div style='text-align:right; margin-top:85px; font-size:12px'><b>$mesajdurum</b> <font color=\"#A8A8A8\">|</font> $gun/$ay/$yil $saat
<input name=\"id[]\" class=inp type=\"checkbox\" id=\"$id\" value=\"$id\"></div>
</td>
  </tr>
</table>
";
} 
echo "
      </tr>
    </table></td>
  </tr>
</table>
<input type=hidden name=ok value=ok>
<input class=\"gonder\" type=\"submit\" name=\"tsil\" value=\"sil\" onclick=\"top.main.location.href='sozluk.php?process=privmsg'\" accesskey=v>
<input class=\"gonder\" type=\"button\" name=\"tsil\" value=\"tümünü sil\" onclick=\"top.main.location.href='sozluk.php?process=sentmsg&silanam=sentsil'\" accesskey=s>
      </FORM>";
}
else {
echo "mesaj göndermemiþsin ayýp..";
}
?>
</table>