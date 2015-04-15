<?
if (!$verified_user) {
die(" olmayacak isler bunlar");
}
?>
<fieldset><legend>uyarilar</legend>
<b>1-</b> bu bilgiler toplantý kullanýcýlarýna açýk olacaktýr.<br>
<b>2-</b> olabilecek herhangi bir sorumluluðu kabul falan da edemeyiz. çok da umrumuzda deðil hani...
</fieldset>

<legend>sosyallesme platformu</legend>
<br>
<form action="sozluk.php?process=toplanticiekle" method="POST">
<i>müzik tarzýnýz hangisine meyilli:(playlistinizin en çalýnganlarý)</i><br>

<SELECT name='muzik' class='Input' >
          <OPTION value='rock'>rock</OPTION>
          <OPTION value='hardrock'>hard rock</OPTION>
          <OPTION value='hiphop'>hip hop</OPTION>
		  <OPTION value='pop'>pop</OPTION>
		  <OPTION value='tekno'>tekno</OPTION>
		  <OPTION value='turku'>türkü</OPTION>
		  <OPTION value='sanat muzigi'>sanat müziði</OPTION>
		  <OPTION value='karisik'>karýþýk</OPTION>
		  <OPTION value='ben bilmem beyim bilir'>ben bilmem beyim bilir</OPTION></SELECT>
		  <br>
		  <br>
<i>ruh halin: (genellikle)<br></i>
<SELECT name='ruh' class='Input' >
          <OPTION value='girisik'>giriþik</OPTION>
          <OPTION value='cekingen'>çekingen</OPTION>
          <OPTION value='her ortamin adami'>her ortamýn adamý</OPTION>
		  <OPTION value='manik depresif'>manik depresif</OPTION>
		  <OPTION value='melankolik'>melankolik</OPTION>
		  <OPTION value='vurdumduymaz'>vurdumduymaz</OPTION>
		  <OPTION value='sessiz'>sessiz</OPTION>
		  <OPTION value='uyusuk'>uyusuk</OPTION>
		  <OPTION value='sahin k'>sahin k gibi</OPTION>
		  <OPTION value='firlama'>arkadaþlar fýrlama diyor</OPTION>
		  <OPTION value='ben kendimi ovmem'>ben kendimi övmem</OPTION></SELECT>
<br>
<br>
<i>sinemada son izlediðin film:</i><br>
<input type="text" name="film"><br>
<br>

<i>favori mekan (cafe,bar vb.)</i><br>
<input type="text" name="mekan"><br>
<br>
<i>kendini anlat: (istersen tabi)
<table width='290' border='0'>
  <tr>
    <td width='290'>tanimla:</td>
	
	 </tr>
	  <tr>
    <td><textarea name='tanim' rows='5' cols='10'></textarea></td>
	</table>
	<br>
<input type="submit" value="iste bu benim" class="but">
</form>



		  
		  

 