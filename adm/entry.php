<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<?
if ($entry != 1) {
echo "Bu iþlem için gerekli yetkiye sahip deðilsiniz";
die;
}
?>

<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>


<FORM action=sozluk.php?process=adm&islem=entrylist method=post>
  <p>
    <INPUT type=hidden value=ok name=okmu>
</p>
  <table width="580" border="0">
    <tr>
      <td width="30"><strong>Nick</strong></td>
      <td width="3">:</td>
      <td width="464"><input maxlength=30 type=text size=30 name=nick>
          </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Tum entrylerini getir"></td>
    </tr>
    </table>
    </form>    <br><br>

<strong>SON 50 ENTRY LISTESI</strong>    

<table width="700" height="77" border="1">
  <tr>
    <td width="174"><strong>BASLIK</strong></td>
    <td width="534"><strong>METIN</strong></td>
    <td width="133"><strong>YAZAR</strong></td>
    <td width="84"><strong>SIL</strong></td>
  </tr>
<?
$sorgu = "SELECT id,sira,mesaj,yazar,tarih FROM mesajciklar ORDER by `id` desc LIMIT 0,50";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
//kayýtlarý listele
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
$sira=$kayit["sira"];
$mesaj=$kayit["mesaj"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];

$sorgu1 = "SELECT baslik,id FROM konucuklar WHERE `id` = '$sira'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];

$kesbaslik = substr ($baslik, 0, 21);
$titlebaslik = $baslik;
$baslik = ereg_replace(" ","+",$baslik);
$mesaj = ereg_replace("<br>","",$mesaj);

$mesaj = substr ($mesaj, 0, 50);


echo "
  <tr>
    <td><a href=\"sozluk.php?process=word&q=$baslik\" title=\"$titlebaslik\">$kesbaslik</a></td>
    <td><font size=1><i>$mesaj</i></td>
    <td>$yazar</td>
    <td><a href=sozluk.php?process=adm&islem=entrysil&id=$id>SIL!</td>
  </tr>
  <tr>
    <td colspan=\"4\"><hr></td>
  </tr>
";
}
}
echo "
</table>
</body>
</html>";
?>