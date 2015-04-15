<script language="JavaScript">
function cf(f) {
	if (!(/.+\@.+\..+/.test(f.e.value))) {
		f.e.focus();
		alert("girdiðiniz e-mail adresi geçerli deðil");
		return false;
	}
	if(f.k.value=="") {
		f.k.focus();
		alert("adiniz?");
		return false;
	}
	if(f.m.value=="") {
		f.m.focus();
		alert("mesajýnýz?");
		return false;
	}
	return true;
}
</script>
<? include "config.php";  ?>
<body>
<LINK href="images/sozluk.css" type=text/css rel=stylesheet>
<center>
<div align="center">
<fieldset><legend><?=$sitename?> iletiþim</legend>
<div width='90%' style='width:90%;' align=justify>
  <p>Merhaba! 
    Aþaðýda gördüðünüz formu doldurarak <?=$sitename?> ekibiyle irtibata geçebilirsiniz. Size ulaþabilmemiz açýsýndan mail adresinizi doðru girmenizi öneririz.<b>mesajlariniz yazarlara <i>iletilmemektedir.</i></b> Ýlginize teþekkur ederiz.</p>
  <p>    <b>Not: <i>Eger bir entry'yi þikayet edecekseniz mesaj kýsmýna lütfen id numarasýný yazýnýz.</i></b>
    </p>
</div>
<br /><form method="post" action="sozluk.php?process=sikayetettimgitti" onSubmit="return cf(this);">
<table class="msg" border=0 width="90%" cellspacing=2 cellpadding=2>
<tr>
<td width="30" align="right" nowrap>email adresiniz</td>

<td align="left"><input type="text" name="e" size="50" ></td>
</tr>
<tr>
<td width="30" align="right" nowrap>adýnýz</td>

<td align="left"><input type="text" name="k" size="50" ></td>
</tr>
<tr>
<td align="right" valign="top">mesaj</td>
<td align="left" valign="top"><textarea name="m" cols="40" rows="10"></textarea></td>
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
<hr /><div style="text-align:center;font-size:7pt">

<?=$sitename?>
Burada yazýlanlar gerçek ya da deðildir. Bilinemez. Tüm entrylerin sorumluluklarý yazarlarýna aittir.
Copyright by <?=$sitename?> 2009 (c)</a>
</div>  