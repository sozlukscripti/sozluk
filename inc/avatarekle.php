<title><? echo $sitename;?> - Avatar Ayarcýk</title>
<?
if ($verified_durum !== "off" or $verified_durum == !"wait" or $verified_durum !== "on")
{
function trsil($deger) {
$turkce=array("þ","Þ","ð","Ð","I","ö","Ö","Ç","ç","ü","Ü","--","","ý");
$duzgun=array("s","S","g","G","I","o","O","C","c","u","U","-","-","i");
$deger=str_replace($turkce,$duzgun,$deger);
return $deger;
}

if ($_POST["url"]){  

if( strlen($avatar) <20) {
die("bukadar kýsa url mi olur len bi daha bak þuna <br><br> <input type=button class='but' onClick='history.go(-1)' value='özür dilerim'>");
}

$avatar=$_POST['avatar'];


$sorgu = "UPDATE user SET avatar='$avatar' WHERE nick='$nick'";
mysql_query($sorgu);
echo "sayýn $nick; <br>avatarýný deðiþtirdin. Ne Mutlu Sana. <br>
<br>
<input type='button' value='eyvallah' onclick='window.close();' class=but>
";
exit;
mysql_close();
}

if ($_POST["yukle"]){

if (empty($_FILES["avatar"]["name"])) {
  echo '
    <script language="javascript">
        alert("Resim seçilmedi seçde gel.");
        history.back();
    </script>';
exit;
}
$kaynak = $_FILES["avatar"]["tmp_name"]; 
$dosya = str_replace(" ", "_", $_FILES[avatar][name]);
$dosya = trsil($dosya);
$uzanti = explode(".", $_FILES[avatar][name]);
$hedef  = "images/avatar/".$dosya;

if ($uzanti[1] == "jpg" || $uzanti[1] == "bmp" || $uzanti[1] == "JPG" || $uzanti[1] == "gif" || $uzanti[1] == "GIF" || $uzanti[1] == "png" || $uzanti[1] == "PNG" || $uzanti[1] == "TIF" || $uzanti[1] == "TIFF" ) {
if (file_exists($hedef)) {
    $hmz = substr(md5(uniqid(rand())),0,3);
    $hedef = "images/avatar/$hmz-".$dosya;
    $dosya = "$hmz-".$dosya;
}
move_uploaded_file($kaynak,$hedef);

$sorgu = "UPDATE user SET avatar='$hedef' WHERE nick='$nick'";
mysql_query($sorgu);
echo "sayýn $nick; <br>avatarýný yükledin. Ne Mutlu Sana. <br>
<br>
<input type='button' value='eyvallah' onclick='window.close();' class=but>
";
exit;
mysql_close();
} else

{ echo " geçersiz dosya tipi "; } 

}

if ($_POST["sil"]){echo "<center>";
 echo "Geri dönülmez bir yola giriyorsun. Eðer iþlemi onaylarsan yüklediðin avatar silinecek ve sende sýradan insanlar gibi temsili resimle süsleneceksin..
 <br><br><form name='ok' method='post' action='sozluk.php?process=avatarekle'>
 <input class='but' name='ok' type='submit' id='submit' value='sonunu düþünen kahraman olamaz'> <input type=button class='but' onClick='history.go(-1)' value='gözüm yemedi! geri dön'>
</form>";
echo "</center>";}  

if ($_POST["ok"]){
$sorgu = "UPDATE user SET avatar='' WHERE nick='$nick'";
$update=mysql_query($sorgu);
if($update){
echo "sayýn $nick; <br>artýk sende sýradan bir üyesin.. Haydi koþ, zýpla, sevin..<br>
<br>
<input type='button' value='eyvallah' onclick='window.close();' class=but>
";}else {echo "vallaha silemedim billaha silemedim.. bence bu bir iþaret.<br>
<br>
<input type='button' value='oo tanrým çok mutluyum' onclick='window.close();' class=but>";}
exit;
mysql_close();
}}
?>
