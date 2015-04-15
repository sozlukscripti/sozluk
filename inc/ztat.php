<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title></title>
</head>

<body>
<form id="frm" action="sozluk.php" method="get" target="gostert">
                <div>
                    <b>istatistikler!</b>:<p>
                    <select class="tedit" name="process" size="1" onchange='document.getElementById("frm").submit()'>
                        <optgroup label="genel">
                            <option value="gstat">genel istatistikler</option>
                        </optgroup>
                
                        <optgroup label="---entrysel---">
                                                        <option value="entrystat">yaz buraya biseyler</option>
                                                        
                            </optgroup>
                        <optgroup label="---oy istatistikleri---">
                                                        <option value="encokarti">yaz buraya</option>
                                                        
                                                        <option value="entereveren">enteresan entry tespitcileri</option>
                                                <optgroup label="---yazar istatistikleri---">
                                                        <option value="yazarstat">yazar istatistikleri</optio
                                                ><optgroup label="---moderator gucu---">
                                                        <option value="sebep">sebep</option>
                                                        <option value="duyuru">duyuru</option>
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
echo "<center>Son güncelleme: $tarih</center>";
?>