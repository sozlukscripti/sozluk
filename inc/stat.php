<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?=$sitename?> istatislik</title>
</head>

<body>
<form id="frm" action="sozluk.php" method="get" target="gostert">
				<div>
					<b><font size="2" color="#B7310B">anka sözlük istatistikleri </font></b><p>
					<select class="tedit" name="process" size="1" onchange='document.getElementById("frm").submit()'>
						<optgroup label="genel">
							<option value="gstat">genel istatistikler</option>
						</optgroup>
				
						<optgroup label="---entrysel---">
							<option value="entrystat">gelmiþ geçmiþ en iyi entryler</option>
							<option value="kotu">en çok kotulenmiþ entryler</option>
                                                        <option value="entere">en enteresan entryler</option>
                                                        <option value="hit">en hit baþlýklar</option>
                                                        <option value="baslikst">en dolu baþlýklar</option>
                                                        <option value="eforay">en bir efor sarfedilen aylar</option>
                                                        <option value="eforgun">en bir efor sarf edilen günler</option>
                                                        <option value="ghiyi">gecen haftanýn miss entryleri</option>
							</optgroup>
						<optgroup label="---oy istatistikleri---">
                                                        <option value="encokarti">en çok þuku oy alan yazarlar</option>
                                                        <option value="encokeksi">en çok çükü oy alan yazarlar</option>
                                                        <option value="enterealan">en enteresan yazarlar</option>
                                                        <option value="mesaj1">en çok þuku oy verenler</option>
                                                        <option value="mesaj2">en çok çükü oy verenler</option>
                                                        <option value="entereveren">enteresan entry tespitçileri</option>
                                                <optgroup label="---yazar istatistikleri---">
                                                        <option value="yazarstat">en çok entry giren yazarlar</option>
                                                        <option value="ukteverenler">en çok ukte veren yazarlar</option>
                                                        <option value="buayyazan">ayýn en çok entry girenleri</option>
                                                        <option value="temastat">yazarlarýn tema tercihleri</option>
                                                        <option value="mesajgonder">olur olmaz mesaj atanlar</option>
                                                        <option value="sehir">nerden ulan bu yazarlar</option>
                                                        <option value="kime">mesaj kutusu dolu olanlar</option>
                                                        <option value="mod">en bi entry editleyen</option>
                                                        <option value="eklenen">arkadaþ listesine eklenenler</option>
                                                        <option value="ekleyen">arkadaþ listesine ekleyenler</option>
                                                <optgroup label="---moderator gücü---">
                                                        
                                                        <option value="duyuru">en çok duyuru yapanlar</option>
                                                <optgroup label="---diðer---">
                                                        <option value="burclar">yazarlarýn burçlarý</option>
                                                        
                                                        </optgroup>
                                                      
					</select>
				</p></div>
			</form>
    <td>

        <DIV align=left><iframe name="gostert" id="gostert" width="100%" height="400" frameborder="0" src="sozluk.php?process=gstat"></iframe></DIV>
        </td>
  </tr>
</table>
</body>
</html>
<?
$sorgu = "SELECT tarih FROM stat";
$sorgulama = mysql_query($sorgu);
$kayit=mysql_fetch_array($sorgulama);
$tarih=$kayit["tarih"];
echo "$tarih";
?>
