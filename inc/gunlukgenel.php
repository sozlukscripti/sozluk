<?
$cachetime = (15*60) * 1;
include "cache.php";
cache_check('yazargunlukleri');
?>

<?
//rudy
echo "<strong><i>Yazarlarýn Günlüðü</i></strong><br><br><hr>";
$query = "SELECT * FROM gunluk";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
echo 
"Kullanici :{$row['kullanici']} <br> " .
"Mesaj: : <b>{$row['msj']} </b><br><hr>";

} 

?>
<SCRIPT type=text/javascript>
    var o=document.getElementById("sc");
    function vov(){if(++o.scrollTop>o.scrollHeight-o.clientHeight)o.scrollTop=0;setTimeout(vov,20);}
    setTimeout(vov,20);
    </SCRIPT>
	
<?
cache_save('yazargunlukleri');
?>