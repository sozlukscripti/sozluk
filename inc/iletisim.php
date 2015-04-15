<style type="text/css">
<!--
.orta {
	text-align: center;
}
-->
</style>
<table border=0>
<tr><td>

<script language="javascript">
b("main","sozluk.php?process=staff","hakkýmýzda","hakkýmýzda");
b("main","sozluk.php?process=nedediler","bizim için ne dediler","ne demisler");
b("main","sozluk.php?process=iletisim","iletiþim","iletiþim");
b("main","sozluk.php?process=destek","destek","destekleyenler ve desteklenenler");
</script>
</td></tr>
</table><script type="text/javascript">
_uacct = "UA-1376617-1";
urchinTracker();
</script>


<script type="text/javascript"><!--
document.mst.stop();
//-->
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
<a href=# onClick="document.mst.stop()"><center>
</center></a>
<? include "config.php";  ?>
<body>
<LINK href="images/sozluk.css" type=text/css rel=stylesheet>
<center>
<div align="center">
<fieldset><legend><?=$sitename?> iletiþim</legend>
<div width='90%' style='width:90%;' align=justify>
  <p>Merhaba! 
    Aþaðýda gördüðünüz formu doldurarak <?=$sitename?> ekibiyle irtibata geçebilirsiniz. Size ulaþabilmemiz açýsýndan mail adresinizi doðru girmenizi öneririz. <b>mesajlariniz yazarlara <i>iletilmemektedir.</i></b> Ýlginize teþekkur ederiz. info@ankasozluk.com</p>
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

Copyright by <?=$sitename?> 2015 (c)</a>
</div>  