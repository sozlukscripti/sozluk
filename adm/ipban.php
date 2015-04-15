<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<?
if ($ipban != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}

if ($ok) {
$ip =@$_POST["ip"];

$sorgu = "INSERT INTO ipban ";
$sorgu .= "(ip)";
$sorgu .= " VALUES ";
$sorgu .= "('$ip')";
mysql_query($sorgu);
echo "$ip blocklandi.";
}
else {
$ip =@$_GET["ip"];
?>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>
</head>

<body>
<form METHOD=post action>
<table width="600" border="0">
  <tr>
    <td width="116">IP</td>
    <td width="8">:</td>
    <td width="341"><input name="ip" size=60 type="text" id="ip" value="<? echo $ip; ?>"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <input TYPE=hidden name=ok value=ok>
    <td><input type="submit" name="Submit" value="IP Ban"></td>
  </tr>
</table>
</form>
</body>
</html>
<? } ?>