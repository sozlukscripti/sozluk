<? 
$sorgu=mysql_query("select id,entry_id from oylar where oy='1' order by rand() limit 1"); 
$entry=mysql_result($sorgu,0,'entry_id'); 
$sorgu2=mysql_num_rows(mysql_query("select id from mesajciklar where id='$entry'")); 
if ($sorgu2>0) { 
header("Location:sozluk.php?process=eid&eid=$entry"); 
} else { 
header("Location:sozluk.php?process=eid&eid=1"); 
} 
?>