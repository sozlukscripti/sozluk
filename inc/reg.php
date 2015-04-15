<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<title></title>
</head>

<?
$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$reg=$kayit2["reg"];
if ($reg == "on") {
echo "
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=sozluk.php?process=reg1222\">
";
}
?>
<?
$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$reg=$kayit2["reg"];
if ($reg == "off") {
echo "
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=sozluk.php?process=reg1\">
";
}
?>



<body>

</FORM>
</body>
</html>