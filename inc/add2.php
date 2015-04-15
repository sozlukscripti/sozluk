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
function pingGoogleSitemaps( $url_xml )
{
   $status = 0;
   $google = 'www.google.com';
   if( $fp=@fsockopen($google, 80) )
   {
      $req =  'GET /webmasters/sitemaps/ping?sitemap=' .
              urlencode( $url_xml ) . " HTTP/1.1\r\n" .
              "Host: $google\r\n" .
              "User-Agent: Mozilla/5.0 (compatible; " .
              PHP_OS . ") PHP/" . PHP_VERSION . "\r\n" .
              "Connection: Close\r\n\r\n";
      fwrite( $fp, $req );
      while( !feof($fp) )
      {
         if( @preg_match('~^HTTP/\d\.\d (\d+)~i', fgets($fp, 128), $m) )
         {
            $status = intval( $m[1] );
            break;
         }
      }
      fclose( $fp );
   }
   return( $status );
}
function getir($url){
	if(function_exists('curl_init')){
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_TIMEOUT, 0);
		$xml = curl_exec($ch);
		curl_close($ch);
	}else{
		$xml = file_get_contents($url);
	}
	return $xml;
}
include "config.php";
$baslik= htmlspecialchars($_POST["baslik"]);
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
$baslik = ereg_replace("-","",$baslik);
$baslik = ereg_replace("?","",$baslik);
$baslik = ereg_replace("#","",$baslik);
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
if (strstr($mesaj,"youtube.com/watch")) {
            $youtube='#((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?#i';
            preg_match($youtube,$mesaj,$tube);
            $tube=$tube[0];
            $tube2=str_replace("watch?v=","v/",$tube);
        }  

$sorgu = "SELECT id FROM konucuklar WHERE `baslik`='".mysql_real_escape_string($baslik)."'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if ($id) {
echo "Bu baþlýktan zaten var.";
die;
}
}
}

// db ye yaz
$baslik = strtolower($baslik);
$sorgu = "INSERT INTO konucuklar ";
$sorgu .= "(baslik,ip,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('".mysql_real_escape_string($baslik)."','$ip','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);


//sitemap pingliyoruz.
include "config.php";
$sitemap = $sitemap;
if ($sorgu) { 
$pingle = pingGoogleSitemaps($sitemap); 
$rss = "http://pingomatic.com/ping/?title=Anka+Sozluk&blogurl=$site&rssurl=$sitemap&chk_weblogscom=on&chk_blogs=on&chk_technorati=on&chk_feedburner=on&chk_syndic8=on&chk_newsgator=on&chk_myyahoo=on&chk_pubsubcom=on&chk_blogdigger=on&chk_blogrolling=on&chk_blogstreet=on&chk_moreover=on&chk_weblogalot=on&chk_icerocket=on&chk_newsisfree=on&chk_topicexchange=on&chk_google=on&chk_tailrank=on&chk_bloglines=on&chk_postrank=on&chk_skygrid=on&chk_collecta=on&chk_audioweblogs=on&chk_rubhub=on&chk_geourl=on&chk_a2b=on&chk_blogshares=on";
$rss=getir($rss);
} else {}







// id yi almak icin dbye baglan
$sorgu = "SELECT id FROM konucuklar WHERE `baslik`='".mysql_real_escape_string($baslik)."'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if (!$id)
echo "Hata var beah: patrona söylesene bi düzeltsin :(";
}
}
// idyi aldik
// mesaj olarak yaziyoz


$sorgu = "INSERT INTO mesajciklar ";
$sorgu .= "(sira,mesaj,yazar,ip,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$id','".mysql_real_escape_string($mesaj)."','$yazar','$ip','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
// mesajida yazdik


//rss pingliyoruz.
include "config.php";
$sitemap = $siterss;
if ($sorgu) { 
$pingle = pingGoogleSitemaps($sitemap); 
$rss = "http://pingomatic.com/ping/?title=Anka+Sozluk&blogurl=$site&rssurl=$siterss&chk_weblogscom=on&chk_blogs=on&chk_technorati=on&chk_feedburner=on&chk_syndic8=on&chk_newsgator=on&chk_myyahoo=on&chk_pubsubcom=on&chk_blogdigger=on&chk_blogrolling=on&chk_blogstreet=on&chk_moreover=on&chk_weblogalot=on&chk_icerocket=on&chk_newsisfree=on&chk_topicexchange=on&chk_google=on&chk_tailrank=on&chk_bloglines=on&chk_postrank=on&chk_skygrid=on&chk_collecta=on&chk_audioweblogs=on&chk_rubhub=on&chk_geourl=on&chk_a2b=on&chk_blogshares=on";
$rss=getir($rss);
} else {}



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
<td width="788">
<input class="but" type="button" name="bkz" value="(bkz: )" onclick="hen('aciklama','(bkz: ',')')" accesskey=x>
<input class="but" type="button" name="bkz" value="(gbkz: )" onclick="hen('aciklama','(gbkz: ',')')" accesskey=c>
<input class="but" type="button" name="bkz" value="*" onclick="hen('aciklama','(u: ',')')" accesskey=v>
<input class="but" type="button" name="bkz" value="-spo-" onclick="hen('aciklama','--- (gbkz: spoiler) ---\n\n','--- (gbkz: spoiler) ---')" accesskey=s> 
</td>
<td width="90" align="right" valign="top">
<input id="kaydet" class=but type="submit" name="kaydet" value="yolla panpa">
    <input type=hidden name=ok value=ok>
    <input type=hidden name=okmsj value=ok>
<input type="hidden" name="gonder" value="kaydet">
</td>
</tr>
    <tr>

      <td valign="top"  colspan="2"> Bakýnýz vermek için: (bkz: kelime)<br>
                Gizli bakýnýz vermek için: (gbkz: kelime)<br>
                Arama için : (ara: aranacak kelime)<br>
				
        URL vermek icin: <?include "config.php"; echo "$site";?> (url verilecek adresten önce http:// konulmasý)<br>
        * vermek icin: (u: kelime)<br>
        formatlarýný kullanmalýsýnýz. </td>
     </tr>
  </table>
</form>

</form>
<p class="yazi">&nbsp;</p>
</body>
</html>
<? } ?>