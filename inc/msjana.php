<?
if ($silanam == "tumunusil") {
$sorgu = "DELETE FROM privmsg WHERE kime = '$verified_user'";
mysql_query($sorgu);
}

if ($ok) {
foreach($id as $kayit)
{
$sorgu = "DELETE FROM privmsg WHERE kime = '$verified_user' and id = '$kayit' LIMIT 1";
mysql_query($sorgu);
}
}

$sorgu = "select id,konu,gonderen,gun,okundu,ay,yil,saat from privmsg WHERE kime = '$verified_user' ORDER BY tarih desc";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
echo "
<form name=mailOperations method=post action=>
<table width=\"597\" border=\"0\">
  <tr>
    <td colspan=\"4\"><b><font size=\"2\" color=\"#B7310B\">gelen mesajlar </font></b></td>
  </tr>
  <tr>
    <td width=\"29\"class=\"msjana2\"><div align=\"center\"><strong>seç</strong></div></td>
    <td width=\"101\" class=\"msjana2\"><div align=\"center\"><strong>gönderen</strong></div></td>
    <td width=\"321\" class=\"msjana\"><div align=\"center\"><strong>konu</strong></div></td>
    <td width=\"134\" class=\"msjana\"><div align=\"center\"><strong>tarih</strong></div></td>
  </tr>
  <tr>
    <td colspan=\"4\" align=\"center\" valign=\"bottom\"><table width=\"597\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\" bordercolor=\"#00000\">

";

while ($kayit=mysql_fetch_array($sorgulama)){
$id=$kayit["id"];
$gonderen=$kayit["gonderen"];
$konu=$kayit["konu"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$okundu=$kayit["okundu"];
if ($okundu != 0)
$yeni = "<b>(yeni)</b>";
else
$yeni = "";
echo "
      <tr>
        <td width=\"27\" class=\"msjana2\"><center>&nbsp;<input name=\"id[]\" class=inp type=\"checkbox\" id=\"$id\" value=\"$id\"></td>
        <td width=\"103\" class=\"msjana2\">&nbsp;<a href=\"javascript:od('sozluk.php?process=ben&kim=$gonderen',400,500)\">$gonderen</a></td>
        <td width=\"326\" class=\"msjana\">&nbsp;<a href=?process=msjoku&id=$id>$konu $yeni</a></td>
        <td width=\"130\" class=\"msjana\">&nbsp;<a href=?process=msjoku&id=$id>$gun/$ay/$yil $saat</a></td>
      </tr>
";
}
echo "
      </tr>
    </table></td>
  </tr>
</table>
<input type=hidden name=ok value=ok>
<input class=\"but\" type=\"submit\" name=\"tsil\" value=\"sil\" onclick=\"top.main.location.href='sozluk.php?process=privmsg'\" accesskey=v>
<input class=\"but\" type=\"button\" name=\"tsil\" value=\"tümünü sil\" onclick=\"top.main.location.href='sozluk.php?process=privmsg&silanam=tumunusil'\" accesskey=s>
      </FORM>";
}
else {
echo "Yeni mesajýnýz yok.";
}
?>