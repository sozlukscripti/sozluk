<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<?

if (!$verified_user)
die;

if (!$okmsj) {
echo "Kurcuklama lan!";
exit;
}
else {

// degiskenleri ata

$baslik = htmlspecialchars(strip_tags($_POST["baslik"]));

$mesaj = htmlspecialchars(strip_tags($_POST["mesaj"]));







if ($baslik == "" or $mesaj == "") {

if (!$okword) {
echo "Heryeri doldur caným..";
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

/*if (!ereg("^([A-Za-z0-9]|[[:space:]])+$",$baslik)) {
echo "<p class=div1>Basliklarda;<br>sadece ingilizce harfler,<br>bosluk {space},<br>ve rakamlar bulunabilir.<br>Lütfen bu kurallara uygun bir baslik yazin.</p>";
exit;
}*/

$yazar = $verified_user;
$baslik = ereg_replace("%u0131","ý",$baslik);
$baslik = ereg_replace("%u0130","Ý",$baslik);
$baslik = ereg_replace("%u011F","ð",$baslik);
$baslik = ereg_replace("%u011E","Ð",$baslik);
$baslik = ereg_replace("%u015F","þ",$baslik);
$baslik = ereg_replace("%u015E","Þ",$baslik);
/*$baslik = ereg_replace("þ","s",$baslik);
$baslik = ereg_replace("Þ","S",$baslik);
$baslik = ereg_replace("ç","c",$baslik);
$baslik = ereg_replace("Ç","C",$baslik);
$baslik = ereg_replace("ý","i",$baslik);
$baslik = ereg_replace("Ý","I",$baslik);
$baslik = ereg_replace("ð","g",$baslik);
$baslik = ereg_replace("Ð","G",$baslik);
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

$sorgu = "SELECT id FROM konular WHERE `baslik`='$baslik'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if ($id) {
echo "Böyle bir baslik var zaten :)";
die;
}
}
}

// db ye yaz
$ukteadi = strtolower($ukteadi);
$sorgu = "INSERT INTO ukte ";
$sorgu .= "(baslik,ip,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$baslik','$ip','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

// id yi almak icin dbye baglan
$sorgu = "SELECT id FROM konular WHERE `baslik`='$baslik'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if (!$id)
echo "Hatamý Oldu? Banamý öyle Geldi? napacam lan ben þimdi? Sen bozdun sen düzelt Admine PM at :)";
}
}
// idyi aldik
// mesaj olarak yaziyoz


$sorgu = "INSERT INTO mesajlar ";
$sorgu .= "(sira,mesaj,yazar,ip,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$id','$mesaj','$yazar','$ip','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
// mesajida yazdik
// ekranada basiyoz
echo "
<script language=\"javascript\">goUrl('sozluk.php?process=today','left');</script>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=sozluk.php?process=word&q=$baslik\">";
} // bitirdik IF i

function form($baslik) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-9">
</head>

<form method=post action=>
  <table width="100%" align="left" class="dash">
      <tr>
      <td colspan="2">
  <INPUT class=inp maxLength=80 SIZE=60 name=baslik value="<? if ($baslik) { echo "$baslik\" readonly"; }?>">
          </td>
    </tr>
    <tr>
       <td colspan="2">

                  <textarea id="aciklama" name="mesaj" rows="8" style="width:100%;"></textarea>

          </td>
    </tr>
<tr>

<td width="90" align="right" valign="top">
<input id="kaydet" class=but type="submit" name="kaydet" value="kaydet">
    <input type=hidden name=ok value=ok>
    <input type=hidden name=okmsj value=ok>
<input type="hidden" name="gonder" value="kaydet">
</td>
</tr>
    <tr>

      <td valign="top"  colspan="2"> Bakiniz vermek icin: (bkz: kelime)<br>
                Gizli bakiniz vermek icin: (gbkz: kelime)<br>
                Arama icin : (ara: aranacak kelime)<br>
				Spoiler icin : (spoiler: hede hödü)<br>
        URL vermek icin: <? include "config.php";  echo $site;?> (url verilecek adresten önce http:// konulmasi)<br>
        * vermek icin: (u: kelime)<br>
        formatlarini kullanmalisiniz. </td>
     </tr>
  </table>
</form>

</form>
<p class="yazi">&nbsp;</p>
</body>
</html>
<? } ?>