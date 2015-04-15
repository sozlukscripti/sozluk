<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD class=tab>
            
            <DIV><A href="sozluk.php?process=privmsg">inbox</A></DIV></TD>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=cop">ayarlar</A></DIV></TD>
          <TD class=tab>
         <DIV><A href="sozluk.php?process=onlines">olan biten</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=gorunum">tema</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=arkadaslarim">panpa</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=dusmanlarim">bloke</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=modlog2">modlog</A></DIV></TD>
         <TD class=tab>

           <TD class=tabsel>sub-ethna</TD>
         <TD class=tab>


          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>


<?

if ($verified_durum == "off" or $verified_durum == "wait")

die("malesef yazarlýðýnýz onaylanana kadar bu fasilitelerden yararlanamiyorsunuz.<br><br>

<input type=button class='but' onClick='history.go(-1)' value='hih cok lazýmdý sanki'>");

if (!$verified_user)

die("hoppa cakala bak sen <br><br>

<input type=button class='but' onClick='history.go(-1)' value='affet bi yanlýþlýk oldu'>");
include "config.php"; 
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<SCRIPT src="images/top.js" type=text/javascript></SCRIPT>
<SCRIPT language=javascript src="images/sozluk.js"></SCRIPT>
<LINK href="favicon.ico" rel="shortcut Icon"><LINK href="favicon.ico" rel=icon>
</head>


<body>

<br>
<table border="0" width="100%">
 <tr>
  <td valign=top>
  <table border=0 cellspacing=4 cellpadding=2>
   <tr>
    <td>
    </td>
    <td>
    <b><A 

            onclick="window.open('sozluk.php?process=toplantigoster','zirveler','width=800,height=600,,navbar=0,scrollbars=1');" 
            href="sozluk.php?process=arac#">zirve</b></a><br>piçler eðlensin diye yaptýk

    </td>
   </tr>

  <tr>
    <td>

    </td>

    <td>

    

    <b><A 

            onclick="window.open('/sozluk.php?process=entrylerim','yenientry','width=800,height=600,,navbar=0,scrollbars=1');" 

            href="/sozluk.php?process=arac#">entryler</b></a><br>
    yazdýðýn son 50 entry

    </td>

</tr>
  <tr>
    <td></td>
    <td><b><A 

            onclick="javascript:od('/sozluk.php?process=ilan',700,700,scrollbars=1);"  

            href="/sozluk.php?process=arac#">ilanlar</b></a><br>
      <? echo $sitename;?> ilan sayfasý</td>
  </tr>
  <tr>
    <td></td>
    <td><b><A 

            onclick="javascript:od('/robot',400,600,scrollbars=1);"  

            href="/sozluk.php?process=arac#">sözlük robotu</b></a><br>
      <? echo $sitename;?> sözlük robotu</td>
  </tr>
  <tr>
    <td></td>

  </table>
<p>&nbsp;</p></td>

  <td valign=top>

  <table border=0 cellspacing=4 cellpadding=2>
  <tr>

    <td>

    </td>

    <td>

    <b><A 
            onclick="window.open('/sozluk.php?process=dsearch&dsearch=resolve','yenientry','width=300,height=300,,navbar=0,scrollbars=1');" 
            href="/sozluk.php?process=arac#">detaylý ara</b></a><br>etraflica aramak isteyenlere

    </td>

   </tr> 
 <tr>

    <td>
    </td>

    <td>

    <b><A 

            onclick="javascript:od('/sozluk.php?process=ulema',540,700,scrollbars=1);"  
            href="/sozluk.php?process=arac#">ulema</b></a><br>sorularýnýza cevaplar veriyoruz

    </td>
   </tr> 
 <tr>

    <td>
    </td>
    <td>

    <b><A 
            onclick="javascript:od('/sozluk.php?process=anketgoster',700,700,scrollbars=1);"  
            href="/sozluk.php?process=arac#">anketör</b></a><br>anketseverlerin toplaþtýðý mekan

    </td>
   </tr> 
   <tr><td>
    <td>

    <b><A 
            onclick="javascript:od('http://twitter.com/ankasozlukcom',700,700,scrollbars=1);"  
            href="http://twitter.com/ankasozlukcom">twitter</b></a><br>ankasözlük resmi twitter hesabý

    </td>
   </tr> 
    </td>

  </table>
  </td>

 </tr>
</table>
  <hr>
</body>
</html>