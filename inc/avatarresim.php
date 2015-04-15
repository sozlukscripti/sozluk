<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
<title><? echo $sitename;?> - Resim Yükleme</title>
</head>

<?

$bol = 1024;
$boyut = $ayar["upload"]["resim"]["maximum"] / $bol;
$yuvarla_boyut = round($boyut);
?>


<table border="0" width="50%" cellspacing="0" cellpadding="0" id="table1">
	<tr>
		<td style="padding:10px;"><form method="post" enctype="multipart/form-data" action="sozluk.php?process=basicresim"</script>
		<span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold">
		Yükelemek istediðiniz resmi seçiniz...</span><br>
<span style="font-family: arial, verdana, helvetica; font-size: 8pt; ">Bir 
		kerede en fazla <?echo $yuvarla_boyut;?> Kb resim yükleyebilirsiniz</span><table border="0" width="388" height="22" style="background-color: #F7F7F7" cellspacing="0" cellpadding="0">
	<tr>
		<td height="22" width="388">

 <INPUT TYPE="file" NAME="userfile" size="37" ><input type="submit" value="Yükle" name="upload" ></td>
	</tr>

</form></td>
	</tr>
</table>


</body>
</html>