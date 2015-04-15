<?php

$urlpath = $ayar["upload"]["profil"]["yol"];	
$path = $ayar["upload"]["profil"]["klasor"];			
$max_size =$ayar["upload"]["resim"]["maximum"];       	
$domain = $ayar["upload"]["resim"]["domain"];   

if (!isset($HTTP_POST_FILES['userfile'])) exit;

if (is_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'])) {

if ($HTTP_POST_FILES['userfile']['size']>$max_size) {
        echo "<font color=\"#333333\" face=\"Geneva, Arial, Helvetica, sans-serif\">File is too big !</font><br>\n"; exit; }
if (($HTTP_POST_FILES['userfile']['type']=="image/gif") || ($HTTP_POST_FILES['userfile']['type']=="image/pjpeg") || ($HTTP_POST_FILES['userfile']['type']=="image/jpeg") || ($HTTP_POST_FILES['userfile']['type']=="image/png")) {

        if (file_exists("./".$path . $HTTP_POST_FILES['userfile']['name'])) {
                echo "<font color=\"#333333\" face=\"Geneva, Arial, Helvetica, sans-serif\">There already exists a file with this name, please rename your file and try again</font><br>\n"; exit; }

//generate random number
$zufall = rand(1,9999);
$fupl = "$zufall";

        $res = copy($HTTP_POST_FILES['userfile']['tmp_name'], "./".$path .$fupl .$HTTP_POST_FILES['userfile']['name']);
chmod($path .$fupl .$HTTP_POST_FILES['userfile']['name'],0644);
        if (!$res) { echo "<font color=\"#333333\" face=\"Geneva, Arial, Helvetica, sans-serif\">Didn't work, please try again</font><br>\n"; exit; } else {
        ?>


<?
//set url variable
$domst = "http://";
$drecks = "/";
$urlf = $domst .$domain .$drecks .$urlpath .$fupl .$HTTP_POST_FILES['userfile']['name'];
?>

<?
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
<title>Avatar Yükleyin</title>
</head>
<script language="JavaScript" type="text/javascript">


function insertImage() {

if(document.getElementById('urlsi').value=="")
{window.opener.document.getElementById("rifat").innerHTML='<img src="resimler/resyok.gif" class="glossy"  width="150" height="150" /><br>Lütfen  bir resim seçiniz...';
}
else {
}

window.opener.document.getElementById('avatar').value=document.getElementById('urlsi').value;

  window.close();
}

</script>







<body bgcolor="#EEEEEE" marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" >

<table border="0" cellpadding="0" cellspacing="0" style="padding: 10px;" width="299" align="center"><tr>
	<td align="center">


<input type="hidden" name="urlsi" id="urlsi" value="<?php echo "$urlf";?>"  style="font-size: 10px; width: 100%;">







<tr><td align="center"><img src="<?php echo$urlf;?>" width="150px" height="150px" /><br><input type="submit" value="  Gönder  " onClick="insertImage();" style="font-size: 12px;" >
<input type="submit" value="  Ýptal  " onClick="window.close();" style="font-size: 12px;" ></td></tr>
<?
} else { echo "<font color=\"#333333\" face=\"Geneva, Arial, Helvetica, sans-serif\">Bu tür resim  dosyalarý barýndýrmýyoruz...!</font><br>\n"; exit; }
}
?>
</table>

</body>