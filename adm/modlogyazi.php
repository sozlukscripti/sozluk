<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($verified_kat == "user" or $verified_kat == "okur") {
die("olmaz isler bunlar"); }
$sorgu = "SELECT nick,sehir,isim FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){

while ($kayit=mysql_fetch_array($sorgulama)){
$nick=$kayit["nick"];
$sehir=$kayit["sehir"];
$isim=$kayit["isim"];
}
}
?>

<body>
<LINK href="images/sozluk.css" type=text/css rel=stylesheet>
<center>
<div align="center">
<fieldset>
<legend>Modlog Yönetim Diyalog Kutusu </legend>
<div align=justify>
  <p>Burada yazmýþ olduklarýnýz direk olarak modlog'a yansýiyacaðý için lütfen size yakýþýr þekilde diyalog ve monologlar giriniz... </p>
  </div>
<br /><form method="post" action="sozluk.php?process=modloggekle" onSubmit="return cf(this);">
<table class="msg" border=0 width="90%" cellspacing=2 cellpadding=2>
<tr>
<td width="30" align="right" nowrap>nick</td>

<td align="left"><input name="moderat" type="text" value="<? echo "$nick"; ?>" size="50" ></td>
</tr>
<tr>
<td width="30" align="right" nowrap>aksiyon</td>

<td align="left"><input type="text" name="olay" size="50" ></td>
</tr>
<tr>
<td align="right" valign="top">aciklama</td>
<td align="left" valign="top"><textarea name="mesaj" cols="50"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td><td align="left"><input type="submit" class="but"  value="gonder"><input type="reset" class="but"  value="sil"></td>
</tr>
</table>
</form>
</fieldset>
</div>
</center>
<script type="text/javascript">var ee=document.getElementById('e');if(ee){ee.focus();}</script>
<hr />
<div style="text-align:center;font-size:7pt">
</div>  
