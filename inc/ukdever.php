<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<?

if (!$verified_user)
die;

if (!$okmsj) {
echo "kurcuklama lan!";
exit;
}
else {
// degiskenleri ata
$baslik =@$_POST["baslik"];
$mesaj =@$_POST["mesaj"];
if ($baslik == "" or $mesaj == "") {
if (!$okword) {
echo "başlık ve mesaj kısmı doldurulmalıdır..";
exit;
}
else {
form($baslik);
exit;
}
}

$site = $_SERVER["HTTP_REFERER"];
$site = explode("/", $site);
$site = $site[2];

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$ip = getenv('REMOTE_ADDR');

$baslik = substr($baslik, 0, 80);

/*
if (!ereg("^([A-Za-z0-9]|[[:space:]])+$",$baslik)) {
echo "<p class=div1>Ba\$lıklarda;<br>ingilizce harfler,<br>bo\$luk,<br>ve rakamlar bulunabilir.<br>Lütfen bu kurallara uygun bir ba\$lik yazın.</p>";
exit;
}
*/

$yazar = $verified_user;
$baslik = ereg_replace("%u0131","ı",$baslik);
$baslik = ereg_replace("%u0130","İ",$baslik);
$baslik = ereg_replace("%u011F","ğ",$baslik);
$baslik = ereg_replace("%u011E","Ğ",$baslik);
$baslik = ereg_replace("%u015F","ş",$baslik);
$baslik = ereg_replace("%u015E","Ş",$baslik);
/*$baslik = ereg_replace("ş","s",$baslik);
$baslik = ereg_replace("Ş","S",$baslik);
$baslik = ereg_replace("ç","c",$baslik);
$baslik = ereg_replace("Ç","C",$baslik);
$baslik = ereg_replace("ı","i",$baslik);
$baslik = ereg_replace("İ","I",$baslik);
$baslik = ereg_replace("ğ","g",$baslik);
$baslik = ereg_replace("Ğ","G",$baslik);
$baslik = ereg_replace("ö","o",$baslik);
$baslik = ereg_replace("Ö","O",$baslik);
$baslik = ereg_replace("ü","u",$baslik);
$baslik = ereg_replace("Ü","U",$baslik);
$baslik = ereg_replace("Ö","O",$baslik);*/


$baslik = strtolower($baslik);
$mesaj = strtolower($mesaj);

$baslik = substr($baslik, 0, 80);

$mesaj = ereg_replace("&lt","(",$mesaj);
$mesaj = ereg_replace("&gt",")",$mesaj);
$mesaj = ereg_replace("<","(",$mesaj);
$mesaj = ereg_replace(">",")",$mesaj);
$mesaj = ereg_replace("\n","<br>",$mesaj);


$sorgu = "SELECT id FROM ukde WHERE `baslik`='$baslik'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayıtları listele
while ($kayit=mysql_fetch_assoc($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if ($id) {
echo "böyle bir ukde zaten mevcut ";
die;
}
}
}

// db ye yaz
$baslik = strtolower($baslik);
$sorgu = "INSERT INTO ukde ";
$sorgu .= "(id,baslik,aciklama,yazar,tarih,gun,ay,yil)";
$sorgu .= " VALUES ";
$sorgu .= "('$id','$baslik','$mesaj','$yazar','$tarih','$gun','$ay','$yil')";
mysql_query($sorgu);

echo "
<script language=\"javascript\">goUrl('sozluk.php?process=ukde','left');</script>
ukde doldurulmak üzere listeye eklenmiştir...";

}

function form($baslik) {
 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-9">
</head>
<body>



<form method=post action=>
  <table width="100%" align="left" class="dash">
      <tr>
<font size="4"><a><? if ($baslik) { echo "$baslik"; }?></a></font>
<td style="visibility: hidden;">
  <INPUT class=inp maxLength=70 SIZE=50 name=baslik value="<? if ($baslik) { echo "$baslik\" readonly"; }?>">
          </td>
      <td colspan="2">

          </td>
    </tr>
        <tr>
      <td colspan="2">
                  uktecinin notu:
          </td>
    </tr>
    <tr>
      <td colspan="2">
                  <textarea id="aciklama" name="mesaj" rows="2" style="width:100%;"></textarea>
          </td>
    </tr>
<tr>
<td width="90" align="right" valign="top">
<input id="kaydet" class=but type="submit" name="kaydet" value="uktem ukte olsun">
    <input type=hidden name=ok value=ok>
    <input type=hidden name=okmsj value=ok>
<input type="hidden" name="gonder" value="kaydet">
</td>
</tr>
    <tr>


     </tr>
  </table>
</form>

<p class="yazi">&nbsp;</p>
</body>
</html>

<?

}

?>