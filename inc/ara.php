<?

  # Tercihler ...
  # -----------------------------------------------------------------------
  $dizin      = "Dizin";             // Arama yapýlacak dýzýn
  $limitsonuc = 10;                  // Maksýmum sonuc gosterýmý
  $limitdosya = 50;                  // Maksýmum dosya tarama
  $limitboyut = 200;                 // Maksýmum dosya okuma (kb)
  $dosyatur   = "xml,htm,txt,html";  // Icerýgý aranacak dosya turlerý (výrgulle ayrýlmýs)

  # Sablonlar ...
  # -----------------------------------------------------------------------
  $sablon["oge"] = '
     <a href=$oge[link] class=baslik>$oge[baslik]</a><br>
     $oge[icerik]<br>
     <a href=$oge[link]>$oge[link]</a> - <a>$oge[tarih] ($oge[boyut])</a> $oge[ogedigerlink]<br>
     <br>
     $oge[ogediger]
     ';
  $sablon["ogediger"] = '
     <blockquote>
     <a href=$oge[link] class=baslik>$oge[baslik]</a><br>
     $oge[ogedigericerik]<br>
     <a href=$oge[link]>$oge[link]</a> - <a>$oge[tarih] ($oge[boyut])</a><br>
     <br>
     </blockquote>
     ';
  $sablon["ogedigerlink"]   = ' - <a href=ara.php?sorgu=$oge[sorgu]&dosya=$dosya>Diðer Sonuçlar ($oge[diger])</a>';
  $sablon["ogetumsonuclar"] = ' - <a href=ara.php?sorgu=$oge[sorgu]>Tüm Sonuçlar</a>';

  # Baslangýcta ...
  # -----------------------------------------------------------------------
  $talep = $_REQUEST;
  $sorgu = stripslashes("(".preg_replace(
     array("'\"(.*)\"'Ue","' |\+'"),
     array("SorguCikart('\\1');","|"),$talep["sorgu"] ? $talep["sorgu"] : md5("")
     ).")");
  $sorgu = preg_replace("'(\d+)'e","stripslashes(\$tumlesik['\\1'])",$sorgu);

  # Dosya tara ...
  # -----------------------------------------------------------------------
  $dosya    = array();
  $dosyatur = preg_replace("'\s*,\s*'","|",$dosyatur);

  if($talep["dosya"] and is_file($talep["dosya"]) and preg_match("'.*\.(".$dosyatur.")$'",$talep["dosya"])){
     $dosya[] = $talep["dosya"];
  }  else{
     DizinTara(dirname($_SERVER["SCRIPT_FILENAME"]).($dizin ? "/".$dizin : ""),$dosya);
     unset($talep["dosya"]);
     }

  # Sonuc dýzýsýný olustur ...
  # -----------------------------------------------------------------------
  foreach($dosya as $sira => $dosya){
     # Baslangýcta ...
     $baslik   = "";
     $arasonuc = array();

     # Dosya ýcerýgý
     $tutucu = fopen($dosya,"r");
     $icerik = fread($tutucu,$limitboyut*1024); // Lýmýt kadar oku
     fclose($tutucu);

     # Icerýkte ara
     $icerik = preg_replace(array(
           "'<title.*>(.*)</title>'Usie",
           "'<h1.*>(.*)</h1>'Usie",
           "'<meta http-equiv=\"Description\" content=\"(.{0,160})\">'Usie",
           "'<head.*>.*</head>'Usi",
           "'<[^>]+>'Usi",
           "'(\r|\n|\t| {2})'",
           "'\b.{0,80}".$sorgu.".{0,80}\b'ise"
           ),
        array(
           "\$baslik = htmlspecialchars(stripslashes(strip_tags('\\1')))",
           "\$baslik = htmlspecialchars(stripslashes(strip_tags('\\1')))",
           "\$aciklama = '\\1'",
           "",
           "",
           " ",
           "\$arasonuc[] = '\\0'"),
           $icerik
        );

     # Sonuclar
     if($arasonuc[0] != ""){
        if($saysonuc >= $limitsonuc)
        break; $saysonuc++;

        $sonuc[$dosya] = array();
        $sonuc[$dosya]["link"]   = "http://".$_SERVER["SERVER_NAME"].str_replace($_SERVER["DOCUMENT_ROOT"],"",$dosya);
        $sonuc[$dosya]["diger"]  = count($arasonuc)-1;
        $sonuc[$dosya]["boyut"]  = round(filesize($dosya)/1024)."k";
        $sonuc[$dosya]["tarih"]  = date("Y/m/d",filectime($dosya));
        $sonuc[$dosya]["baslik"] = $baslik != "" ? $baslik : basename($dosya);
        $sonuc[$dosya]["icerik"] = stripslashes(preg_replace("'(".$sorgu.")'is","<b>\\1</b>",$aciklama ? $aciklama : $arasonuc[0])." ...");

        if($talep[dosya])
        for($i=1; $i < count($arasonuc); $i++){
           if($saysonuc >= $limitsonuc)
           break; $saysonuc++;
           $sonuc[$dosya]["digersonuc"][] = stripslashes(preg_replace("'(".$sorgu.")'is","<b>\\1</b>",$arasonuc[$i])." ...");
           }
        }
     }

  # Sonucu cýkart ...
  # -----------------------------------------------------------------------
  if(is_array($sonuc))
  foreach($sonuc as $dosya => $oge){

     # Dýger lýnk?
     $oge["sorgu"] = urlencode(stripslashes($talep["sorgu"]));
     if($oge["diger"] >= 1)
     eval('$oge["ogedigerlink"] = "'.$sablon["ogedigerlink"].'";'); else
     $oge["diger"] = "";

     # Dýger sonuclar ?
     if(is_array($oge["digersonuc"])){
        eval('$oge["ogedigerlink"] = "'.$sablon["ogetumsonuclar"].'";');
        for($i=0; $i < count($oge["digersonuc"]); $i++){
           $oge["ogedigericerik"]  = $oge["digersonuc"][$i];
           eval('$oge["ogediger"] .= "'.$sablon["ogediger"].'";');
           }
        }

     # Ogeyý cýkart ...
     eval('$sayfa["oge"] .= "'.$sablon["oge"].'";');
     }
  else
  $sayfa["oge"] = "Sonuç bulunamadý ...";


  # Fonksýyon : SorguCikart
  # -----------------------------------------------------------------------
  function SorguCikart($sorgu){
     global $tumlesik;
     $tumlesik[] = "(?:$sorgu)";
     return "".(count($tumlesik)-1);
     }

  # Fonksýyon : DýzýnTara
  # -----------------------------------------------------------------------
  function DizinTara($dizin,&$sonuc){
     global $limitdosya,$saydosya,$dosyatur;
     $tutucu = opendir($dizin);
     while($icerik = readdir($tutucu)){
        if($saydosya >= $limitdosya){
           return;
           }
        if(preg_match("'.*\.(".$dosyatur.")$'",$icerik) and ($icerik != "." and $icerik != "..")){
           $sonuc[] = $dizin."/".$icerik;
           $saydosya++;
           }
        else
        if(is_dir($icerik) and ($icerik != "." and $icerik != "..")){
           DizinTara($dizin."/".$icerik,$sonuc); // Alt dýzýnler ...
           }
        }
     closedir($tutucu);
     }

  # Fonksýyon : Gosterge
  # -----------------------------------------------------------------------
  function Gosterge($var){
     if(is_array($var))
     echo "<pre>".htmlspecialchars(print_r($var,true))."</pre>"; else
     echo "<pre>".htmlspecialchars($var)."</pre>";
     }
?>
<html>

<head>
<title>.:: Arama</title>
<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<style>
body, table, tr, th, td, iframe, p, span, div, form{
   color : #000000;
   font-family: Verdana;
   font-size: 8pt;
   }

a.baslik, a.baslik:visited{font-size: 8pt; color : #003366;}
a.baslik:hover{font-size: 8pt; color : #999999;}
a, a:visited{font-size: 7pt; color : #999999;}
a:hover{font-size: 7pt; color : #999999;}


form{margin:0}
input, textarea, select{
   border: 1px solid silver;
   color : black;
   background-color: #FFFFFF;
   font-family: Tahoma;
   font-size: 8pt;
   height : 18;
   }
</style>
</head>

<body>
<table border="0" cellpadding="10" cellspacing="0" width="500" style="border:1px solid #F0F0F0;">
  <tr>
    <td style="padding-left:20" style="background-color: #FAFAFA;">
    <form method="POST" action="ara.php">
      <b>Sorgu:</b><br>
      <input type="text" name="sorgu" size="20" style="width: 300" value="<?echo htmlspecialchars(stripslashes($talep["sorgu"]))?>">
      <input type="submit" value="Ara" name="ara">
    </form>
    </td>
  </tr>
  <tr>
    <td style="padding-left:20">
    <?echo $sayfa["oge"]?>
    </td>
  </tr>
</table>
</body>

</html>
