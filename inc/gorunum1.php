<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD>

<?
$sorgutema=mysql_query("select * from temalar order by id desc");
$kactema=@mysql_num_rows($sorgutema);
echo "<div>toplam $kactema adet tema bulunmaktadýr. seç beðendiðin birini iþte...
<a target=\"I8\" href=\"sozluk.php?process=cp&tema=sozluk\">orginale dön</a></div><br/>";
while ($oku=mysql_fetch_array($sorgutema)) {
$sorgukisi=mysql_query("select * from user where tema='$oku[tema]'");
$say=@mysql_num_rows($sorgukisi);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
 <tr>
  <td width="100%"><a href="sozluk.php?process=cp&tema=<?=$oku[tema]?>"><?=$oku[tema]?></a>&nbsp;&nbsp;(<?echo("$say kiþi");?>)
	<a target="I8" href="sozluk.php?process=temabak&tema=<?=$oku[tema]?>">bak?</a></td>
 </tr>
</table>
<?
}
?>
tema yüklemek için admin veya modlarla iletiþime geçin.