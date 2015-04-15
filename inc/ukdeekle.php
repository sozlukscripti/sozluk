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
$baslik=mysql_real_escape_string($_POST["baslik"]);
$mesaj = htmlspecialchars(strip_tags($_POST["mesaj"]));
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

/*if (!ereg("^([A-Za-z0-9]|[[:space:]])+$",$baslik)) {
echo "<p class=div1>Ba\$l&#305;klarda;<br>ingilizce harfler,<br>bo\$luk,<br>ve rakamlar bulunabilir.<br>Lütfen bu kurallara uygun bir ba\$lik yaz&#305;n.</p>";
exit;
}*/

$yazar = $verified_user;
$baslik = ereg_replace("%u0131","ı",$baslik);
$baslik = ereg_replace("%u0130","İ",$baslik);
$baslik = ereg_replace("%u011F","ğ",$baslik);
$baslik = ereg_replace("%u011E","Ğ",$baslik);
$baslik = ereg_replace("%u015F","ş",$baslik);
$baslik = ereg_replace("%u015E","Ş",$baslik);
/*$baslik = ereg_replace("&#351;","s",$baslik);
$baslik = ereg_replace("&#350;","S",$baslik);
$baslik = ereg_replace("ç","c",$baslik);
$baslik = ereg_replace("Ç","C",$baslik);
$baslik = ereg_replace("&#305;","i",$baslik);
$baslik = ereg_replace("&#304;","I",$baslik);
$baslik = ereg_replace("&#287;","g",$baslik);
$baslik = ereg_replace("&#286;","G",$baslik);
$baslik = ereg_replace("ö","o",$baslik);
$baslik = ereg_replace("Ö","O",$baslik);
$baslik = ereg_replace("ü","u",$baslik);
$baslik = ereg_replace("Ü","U",$baslik);
$baslik = ereg_replace("Ö","O",$baslik);*/


$baslik = strtolower($baslik);
if (strstr($mesaj,"youtube.com/watch")) {
            $youtube='#((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?#i';
            preg_match($youtube,$mesaj,$tube);
            $tube=$tube[0];
            $tube2=str_replace("watch?v=","v/",$tube);
        }  

$baslik = substr($baslik, 0, 80);

$mesaj = ereg_replace("&lt","(",$mesaj);
$mesaj = ereg_replace("&gt",")",$mesaj);
$mesaj = ereg_replace("<","(",$mesaj);
$mesaj = ereg_replace(">",")",$mesaj);
$mesaj = ereg_replace("\n","<br>",$mesaj);

$sorgu = "SELECT id FROM konucuklar WHERE `baslik`='$baslik'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kay&#305;tlar&#305; listele
while ($kayit=mysql_fetch_assoc($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if ($id) {
echo "böyle bir basl&#305;k zaten mevcut ";
die;
}
}
}



// db ye yaz
$baslik = strtolower($baslik);
$sorgu = "INSERT INTO konucuklar ";
$sorgu .= "(baslik,ip,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$baslik','$ip','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

// id yi almak icin dbye baglan
$sorgu = "SELECT id FROM konucuklar WHERE `baslik`='$baslik'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kay&#305;tlar&#305; listele
while ($kayit=mysql_fetch_assoc($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if (!$id)
echo "Hata olu\$tu :(";
}
}
// idyi aldik
// mesaj olarak yaziyoz


$sorgu = "INSERT INTO mesajciklar ";
$sorgu .= "(sira,mesaj,yazar,ip,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$id','$mesaj','$verified_user','$ip','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
// mesaji yazdik ukdeyi siliyoruz
$ukdesil= "delete from ukde where baslik='$baslik'";
mysql_query($ukdesil);
// ekrana basiyoz sol framde bugun refreshi yapiyoruz
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
<body>



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
<td width="288">
<input class="but" type="button" name="bkz" value="(bkz: )" onclick="hen('aciklama','(bkz: ',')')" accesskey=x>
<input class="but" type="button" name="bkz" value="(gbkz: )" onclick="hen('aciklama','(gbkz: ',')')" accesskey=c>
<input class="but" type="button" name="bkz" value="(ara: )" onclick="hen('aciklama','(ara: ',')')" accesskey=x>
<input class="but" type="button" name="bkz" value="*" onclick="hen('aciklama','(u: ',')')" accesskey=v>
<input class="but" type="button" name="bkz" value="-spo-" onclick="hen('aciklama','--- (gbkz: spoiler) ---\n\n','--- /(gbkz: spoiler) ---')" accesskey=s> 
</td>
<td width="90" align="right" valign="top">
<input id="kaydet" class=but type="submit" name="kaydet" value="kaydet">
    <input type=hidden name=ok value=ok>
    <input type=hidden name=okmsj value=ok>
<input type="hidden" name="gonder" value="kaydet">
</td>
</tr>
    <tr>

      <td valign="top"  colspan="2"> Benim kafam kel mi? diyorsanız<br>
        buyrun kafanızdakileri yazın...</td>
     </tr>
  </table>
</form>

</form>
<p class="yazi">&nbsp;</p>
</body>
</html>
<? } ?>