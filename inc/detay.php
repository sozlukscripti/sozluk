<table width="580" border="1">
<tr>
<td width="290"><strong>Toplanti Detaylarý</strong></td>
<td width="290"><strong>Katýlanlar</strong><small><i> (Ortam Düskünü Yazarlar)</i></small></td>
</tr>
<?$sorgu=mysql_query("SELECT yazar,zirve,detay,id FROM zirvebox where id=`$id`");
$kayit=mysql_fetch_array($sorgu);
echo "
<tr>
<td>$kayit[detay]</td>
<td></td>
</tr>";
?>
</table>