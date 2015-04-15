<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<? if ($_GET['id']) {
?>
<table width="580" border="1">
  <tr>
    <td width="290"><strong>Zirve Detaylarý</strong></td>
    <td width="290"><strong>Katýlanlar</strong><small><i> (Ortam Düskünü Yazarlar)</i></small></td>
	
  </tr>
<?


$sorgu=mysql_query("SELECT yazar,zirve,detay,id FROM zirvebox where id=`$id`");
$kayit=mysql_fetch_array($sorgu);
/////////
$detay=$kayit["detay"];

echo "
  <tr>
    <td>$detay</a></td>
    <td>$katilan</td>
	</tr>";
    }
	echo "</table>";
	?>