<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('encokultema');
?>


En fazla asindirilan temalar:<p>
<?
$sorgu1 = "SELECT * FROM temalar";
$sorgu2 = mysql_query($sorgu1);
echo "<table align=center width=200 border=0 cellSpacing=0 cellPadding=0>";
while ($oku=mysql_fetch_array($sorgu2)) {
 $tsrg=mysql_query("select * from user where tema='$oku[tema]'");
 $kactsrg=@mysql_num_rows($tsrg);
?>
<tr>
 <td><a href="sozluk.php?process=word&q=<?=$oku[tema]?>" target="main"><?=$oku[tema]?></a></td>
 <td><?=$kactsrg?></td>
</tr>
<?
}
echo "</table>";
?>
<?
cache_save('encokultema');
?>