<? 
ob_start();

mysql_query("SET NAMES 'latin5'"); 
@$sayfa = $_GET['sayfa'];
switch (@$sayfa){ 
case "haber"; 
$sayfa = "inc/haber.php";  
break;
default: 
$sayfa = "inc/haber.php";
} 
$h = $_GET['h'];
$ekle = $_GET['ekle'];
if ($h==1) {
$hata = "Kelime eklerken tüm alanları doldurunuz!";
}
if ($h==2) {
$hata = "Soru silerken bir hata oluştu!";
}
if($h) { echo "<script>window.alert('$hata')</script>"; }
if ($ekle=="ok") {
$hata = "İşleminiz gerçekleştirilmiştir!";
 }
 if($ekle) { echo "<script>window.alert('$hata')</script>";
}
?>
<HTML><HEAD><TITLE><?=$sitename?> | Ulema Panel</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-9">
<title>Ulema Paneli</title><table width="780"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="168">&nbsp;</td>
    <td width="612">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" height="49" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="95%">Gelen Sorular / Cevap Ver</td>
            </tr>
        </table></td>
      </tr>
    </table>       </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" height="273"  border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td width="26%" valign="top"><table width="200"  border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="15" height="25">&nbsp;</td>
            <td width="170" height="25"><div align="center"></div></td>
            <td width="15" height="25">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top"><a href="sozluk.php?process=adm&islem=ulemasayfa&mode=ekle">Soru Cevapla (<?=@mysql_num_rows(mysql_query("Select * from soru where durum = 'h'"))?>)</a><br />            
              <br>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
        </table></td>
        <td width="74%" valign="top"><table width="560"  border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="15" height="14"></td>
            <td width="530" height="14"></td>
            <td width="15" height="14"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top" class="Anayazi7"><? @include "$sayfa"; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="15" height="25">&nbsp;</td>
            <td width="170" height="25">&nbsp;</td>
            <td width="15" height="25">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
