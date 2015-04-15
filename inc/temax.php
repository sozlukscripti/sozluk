<?

$sql = mysql_query("SELECT * from temalar");

while($row=mysql_fetch_assoc($sql)) {
	
	echo" {$row['temalar']} <br> ";
}
?>

