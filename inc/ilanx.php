<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title><? include "config.php";  echo $sitename;?> İlan</title>


</head> 
<?

if (!$verified_user) {die("sadece araçlardan gelebilirsiniz!");}

?>
<br>
<br>
<center>
<TABLE cellSpacing=0 cellPadding=0 width="50%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD class=tab>
            
           <TD class=tabsel>ilan ekle</TD>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=ilan">ilanlar</A></DIV></TD>
          <TD class=tab>   
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
<td class="tabin">
<fieldset><legend><img src="images/unlem.gif"><small>Çarşı Pazar</small></legend>
<br>
<div class="left"><font size=2><b>ilan ekle:</b></font></div>
<center>

<table  border="0">  
<tr> 
<form action="sozluk.php?process=ilanxekle" method="POST">
      <td>ilan türü</td>
	  <td><SELECT name="ilanbaslik" class="Input" >
          <OPTION value="Ev Arkadasi">Ev Arkada$ı</OPTION>
          <OPTION value="Ders Notu">Ders Notu</OPTION>
          <OPTION value="alim-satim">Alım / Satım</OPTION>
          <OPTION value="duyuru">Duyurular</OPTION>
          <OPTION value="i$ arayanlar">İş Arayanlar</OPTION></select><a href="#" title="en uygun kategoriyi secin">[?]</a></td>
</tr>
<tr>
      <td>bilgi:</td>
	  <td><textarea name="ilanbilgi" cols=50 rows=5></textarea><br><div class="right"><input type="submit" class="but" value="ekle"></div></form></td>
	  <br><br>
	  
</tr>
</table>
<br>
<div class='copyright'>ilanlardan doğan mağduriyet, sevinme, yerinme, gerinme ve gaz çıkarma çeşitleri <?echo $sitename;?> 'ü bağlamaz, tamamiyle ilan veren kişinin üzerindedir tüm sorumluluk. <br> <?echo $sitename;?> </div>
</center>
</fieldset>