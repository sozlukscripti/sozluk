</fieldset><legend><b>anka sözlük candýr canandýr, kutsal ankaç sözlüktür..</b></legend>
<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<SCRIPT src="images/Dinamik2.js" type=text/javascript></SCRIPT>
<?
include "config.php";
$ip = getenv('REMOTE_ADDR');
if ($okmu != "ok") {
echo "Oha! Söz vermeden geçebileceðinimi düþündün?";
exit;
}
if (!$okmu) {
echo "Olum/Kýzým Adam Gibi Doldursana! Boþluk býrakma!($ip logged)";
}
else {
?>
<style type="text/css">
<!--
.style2 {color: #CCCCCC}
-->
</style>
<body>
<BR>
</span>

<FORM action="sozluk.php?process=regok" method="post">
  <p>
    <INPUT type=hidden value=ok name=okmu>
    <INPUT
type=hidden value=y name=submit>
</p>
  <table width="580" border="0" class="inbox">
    <tr>
      <td width="91"><strong>üye adýnýz</strong></td>
      <td width="3">:</td>
      <td width="464"><input maxlength=40 type=text size=30 name=nick id=nick onChange="javascript:kullaniciadikontrol();">
         <div id="sonuc"> </div> </td>
    </tr>
      <?
$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$reg=$kayit2["reg"];
if ($reg == "off") {
echo "
    <tr>
      <td width=\"91\"><strong>þifre</strong></td>
      <td width=\"3\">:</td>
      <td width=\"464\"><INPUT type=password maxLength=50 size=40 name=sifre>
          </td>
    </tr>
    <tr>
      <td width=\"91\"><strong>þifre tekrar</strong></td>
      <td width=\"3\">:</td>
      <td width=\"464\"><INPUT type=password maxLength=50 size=40 name=sifre2>
          </td>
    </tr>
    <tr>
      <td colspan=\"3\"></td>
    </tr>

";
}
?>


  <tr>
      <td><strong>e-posta</strong></td>
      <td>:</td>
      <td><input maxlength=50 size=40 name=email></td>
    </tr>

    <tr>
      <td><strong>adýn soyadýn</strong></td>
      <td>:</td>
      <td><INPUT name=isim id="isim" size=30 maxLength=50></td>
    </tr>
    <tr>
      <td><strong>doðduðun yýl</strong></td>
      <td>:</td>
      <td><SELECT name=day class="ksel">
        <OPTION
selected>
        <OPTION>1
          <OPTION>2
          <OPTION>3
          <OPTION>4
          <OPTION>5
          <OPTION>6
          <OPTION>7
          <OPTION>8
          <OPTION>9
          <OPTION>10
          <OPTION>11
          <OPTION>12
          <OPTION>13
          <OPTION>14
          <OPTION>15
          <OPTION>16
          <OPTION>17
          <OPTION>18
          <OPTION>19
          <OPTION>20
          <OPTION>21
          <OPTION>22
          <OPTION>23
          <OPTION>24
          <OPTION>25
          <OPTION>26
          <OPTION>27
          <OPTION>28
          <OPTION>29
          <OPTION>30
          <OPTION>31</OPTION>
      </SELECT>
        <SELECT name=month class="ksel">
          <OPTION selected>
          <OPTION value=1>ocak
          <OPTION
value=2>subat
          <OPTION value=3>mart
          <OPTION value=4>nisan
          <OPTION
value=5>mayis
          <OPTION value=6>haziran
          <OPTION value=7>temmuz
          <OPTION
value=8>agustos
          <OPTION value=9>eylul
          <OPTION value=10>ekim
          <OPTION
value=11>kasim
          <OPTION value=12>aralik</OPTION>
        </SELECT>
        <SELECT name=year class="ksel">
          <OPTION
selected>
		  <OPTION>1995
		  <OPTION>1994
          <OPTION>1993
          <OPTION>1992
          <OPTION>1991
          <OPTION>1990
          <OPTION>1989
          <OPTION>1988
          <OPTION>1987
          <OPTION>1986
          <OPTION>1985
          <OPTION>1984
          <OPTION>1983
          <OPTION>1982
          <OPTION>1981
          <OPTION>1980
          <OPTION>1979
          <OPTION>1978
          <OPTION>1977
          <OPTION>1976
          <OPTION>1975
          <OPTION>1974
          <OPTION>1973
          <OPTION>1972
          <OPTION>1971
          <OPTION>1970
          <OPTION>1969
          <OPTION>1968
          <OPTION>1967
          <OPTION>1966
          <OPTION>1965
          <OPTION>1964
          <OPTION>1963
          <OPTION>1962
          <OPTION>1961
          <OPTION>1960
          <OPTION>1959
          <OPTION>1958
          <OPTION>1957
          <OPTION>1956
          <OPTION>1955
          <OPTION>1954
          <OPTION>1953
          <OPTION>1952
          <OPTION>1951
          <OPTION>1950
          <OPTION>1949
          <OPTION>1948
          <OPTION>1947
          <OPTION>1946
          <OPTION>1945
          <OPTION>1944
          <OPTION>1943
          <OPTION>1942
          <OPTION>1941
          <OPTION>1940
          <OPTION>1939
          <OPTION>1938
          <OPTION>1937
          <OPTION>1936
          <OPTION>1935
          <OPTION>1934
          <OPTION>1933
          <OPTION>1932
          <OPTION>1931
          <OPTION>OHA!</OPTION>
        </SELECT></td>
    </tr>
    <tr>
      <td><strong>cinsiyet</strong></td>
      <td>:</td>
      <td><SELECT name=cinsiyet class="ksel" id="cinsiyet">
        <option value="m">erkek
          <option value="f">bayan          
		  <option value="fm">bayan gibi
		  <option value="mf">erkek gibi </option>
      </SELECT></td>
    </tr>
    <tr>
      
    </tr>
    <tr>
      <td><strong>bulunduðunuz yer</strong></td>
      <td>:</td>
      <td><SELECT name=sehir id="sehir" class="ksel">
	  	<option value="" ></option>
		<option value="Ýstanbul" >Ýstanbul
		<option value="Ýzmir" >Ýzmir
		<option value="Ankara" >Ankara
		<option value="Adana" >Adana
		<option value="Adýyaman" >Adýyaman
		<option value="Afyon" >Afyon
		<option value="Aksaray" >Aksaray
		<option value="Amasya" >Amasya
		<option value="Antalya" >Antalya
		<option value="Ardahan" >Ardahan
		<option value="Artvin" >Artvin
		<option value="Aydýn" >Aydýn
		<option value="Aðrý" >Aðrý
		<option value="Balýkesir" >Balýkesir
		<option value="Bartýn" >Bartýn
		<option value="Batman" >Batman
		<option value="Bayburt" >Bayburt
		<option value="Bilecik" >Bilecik
		<option value="Bingöl" >Bingöl
		<option value="Bitlis" >Bitlis
		<option value="Bolu" >Bolu
		<option value="Burdur" >Burdur
		<option value="Bursa" >Bursa
		<option value="Çanakkale" >Çanakkale
		<option value="Çankýrý" >Çankýrý
		<option value="Çorum" >Çorum
		<option value="Denizli" >Denizli
		<option value="Diyarbakýr" >Diyarbakýr
		<option value="Düzce" >Düzce
		<option value="Edirne" >Edirne
		<option value="Elazýð" >Elazýð
		<option value="Erzincan" >Erzincan
		<option value="Erzurum" >Erzurum
		<option value="Eskiþehir" >Eskiþehir
		<option value="Gaziantep" >Gaziantep
		<option value="Giresun" >Giresun
		<option value="Gümüþhane" >Gümüþhane
		<option value="Hakkari" >Hakkari
		<option value="Hatay" >Hatay
		<option value="Iðdýr" >Iðdýr
		<option value="Ýsparta" >Ýsparta
		<option value="Kahramanmaraþ" >Kahramanmaraþ
		<option value="Karabük" >Karabük
		<option value="Karaman" >Karaman
		<option value="Kars" >Kars
		<option value="Kastamonu" >Kastamonu
		<option value="Kayseri" >Kayseri
		<option value="Kýrklareli" >Kýrklareli
		<option value="Kilis" >Kilis
		<option value="Kocaeli" >Kocaeli
		<option value="Konya" >Konya
		<option value="Kütahya" >Kütahya
		<option value="Kýrýkkale" >Kýrýkkale
		<option value="Kýrþehir" >Kýrþehir
		<option value="Malatya" >Malatya
		<option value="Manisa" >Manisa
		<option value="Mardin" >Mardin
		<option value="Mersin" >Mersin
		<option value="Muðla" >Muðla
		<option value="Muþ" >Muþ
		<option value="Nevþehir" >Nevþehir
		<option value="Niðde" >Niðde
		<option value="Ordu" >Ordu
		<option value="Osmaniye" >Osmaniye
		<option value="Rize" >Rize
		<option value="Sakarya" >Sakarya
		<option value="Samsun" >Samsun
		<option value="Siirt" >Siirt
		<option value="Sinop" >Sinop
		<option value="Sivas" >Sivas
		<option value="Þanlýurfa" >Þanlýurfa
		<option value="Þýrnak" >Þýrnak
		<option value="Tekirdað" >Tekirdað
		<option value="Tokat" >Tokat
		<option value="Trabzon" >Trabzon
		<option value="Tunceli" >Tunceli
		<option value="Uþak" >Uþak
		<option value="Van" >Van
		<option value="Yalova" >Yalova
		<option value="Yozgat" >Yozgat
		<option value="Zonguldak" >Zonguldak
		<option value="Yurtdýþý" >Mars</option>
			</select>
	  </td>
    </tr>

    </tr>

    <tr>
      <td width=\"3\"></td>
<td>
<font size="1"></font>	 
   </td>
<td bgcolor="#BBB7CA">
<font size="1">• yazarlýðýn onaylanmasý için tüm alanlarý doldurmak zorunludur.</br>• mail adresi girmeniz önerilir aksi takdirde þifrenizi unuttuðunuzda size ulaþamayýz.</font>	 
   </td>


<tr>
<center>
<td>


    <input type=submit class=gonder value="kayýt ol"></td></center>

</tr>
</tr>
  </table><br>

</FORM>



  <p></P>
</body>
</html>
<? } ?>
</fieldset>
<hr>
<div align="center">2015 © anka sözlük kayýt formu</div>