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
  <tr>
    <td colspan=\"5\"><b><font size=\"2\" color=\"#B7310B\">giden mesajlar </font></b> </td>
  </tr>
  <tr>
    <td width=\"29\"><div align=\"center\"></div></td>
    <td width=\"101\"><strong>giden</strong></td>
    <td width=\"321\"><div align=\"center\"><strong>konu</strong></div></td>
    <td width=\"134\"><div align=\"center\"><strong>tarih</strong></div></td>
	    <td width=\"101\"><strong>durum</strong></td>
  </tr>
  <tr>
    <td colspan=\"5\" align=\"center\" valign=\"bottom\"><table width=\"597\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\" bordercolor=\"#00000\">

";

while ($kayit=mysql_fetch_array($sorgulama)){
$id=$kayit["id"];
$kime=$kayit["kime"];
$konu=$kayit["konu"];
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
	$mesajdurum ="okunmamis";
		} else { 
			$mesajdurum = "görüldü"; 
	}
if ($okundu != 0)
$yeni = "<b>(Yeni)</b>";
else
$yeni = "";
echo "
      <tr>
        <td width=\"27\" class=\"msjana2\"><center>&nbsp;<input name=\"id[]\" class=inp type=\"checkbox\" id=\"$id\" value=\"$id\"></td>
        <td width=\"103\" class=\"msjana2\">&nbsp;<a href=\"javascript:od('sozluk.php?process=ben&kim=$kime',400,400)\">$kime</a></td>
        <td width=\"326\" class=\"msjana\">&nbsp;<a href=?process=gidenoku&id=$id>$konu $yeni</a></td>
        <td width=\"130\" class=\"msjana\">&nbsp;<a href=?process=gidenoku&id=$id>$gun/$ay/$yil $saat</a></td>
	    <td width=\"101\" class=\"msjana\"><strong>$mesajdurum</strong></td>
      </tr>
";
}
echo "
      </tr>
    </table></td>
  </tr>
</table>
<input type=hidden name=ok value=ok>
<input class=\"but\" type=\"submit\" name=\"tsil\" value=\"Sil\" onclick=\"top.main.location.href='sozluk.php?process=privmsg'\" accesskey=v>
<input class=\"but\" type=\"button\" name=\"tsil\" value=\"Tümünü Sil\" onclick=\"top.main.location.href='sozluk.php?process=sentmsg&silanam=sentsil'\" accesskey=s>
      </FORM>";
}
else {
echo "Yeni mesajýnýz yok.";
}
?>