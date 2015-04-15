<?
if ((isset($_GET["sirala"])) && ($_GET["sirala"] <= "0")) {
echo "vaaay akilli!!!";
die();
} 
?>
<?
if (empty($_GET['sirala']) or !$_GET['sirala']) {
 $deger=0;
} else {
 $deger=$sirala;
}
?>
<div class="div1">
<fieldset><legend>Bunlar benim entrylerim, caným entrylerim</legend>
<?
$sor = mysql_query("SELECT * FROM mesajciklar WHERE `yazar`='$verified_user' order by id desc LIMIT $deger,50");
$w = mysql_num_rows($sor);
echo "<fieldset>";
echo "<div align=center>$w adet baþlýk listeleniyor</div><div align=center>Sayfalanýyor: ";
for ($sayi=0; $sayi<=$w/50; $sayi++) {
$yedeger=$sayi*20;
 echo "<a href='sozluk.php?process=entrylerim&sirala=$yedeger'>$sayi</a>, ";
}
echo "</div>";
while ($oku=mysql_fetch_array($sor)) {
$sor1=mysql_query("select * from konucuklar where id='$oku[sira]'");
$baslik=@mysql_result($sor1,0,'baslik');
?>
<table border="0" width="100%">
<tr>
<td class="title">
<a href="http://www.ankasozluk.com/sozluk.php?process=eid&eid=<?=$oku[id]?>"><?=$baslik?></a>
</td>
</tr>
<tr>
<td>
<?=$oku[mesaj]?>
</td>
</tr>
<tr>
<td align="right">
<a href="http://www.ankasozluk.com/sozluk.php?process=eduzenle&id=<?=$oku[id]?>&sr=<?=$oku[sira]?>">düzenle</a> | <a href="http://www.ankasozluk.com/sozluk.php?process=esil&id=<?=$oku[id]?>&sr=<?=$oku[sira]?>">sil</a>
</td>
</tr>
</table>
<br>
<?
}
echo "</fieldset>";
?>
</fieldset>
</div>
