<? 
include ("inc/baglan.php"); // TonyMontana veritabaniba baglanti.

$timeoutseconds = 60; 
$timestamp = time(); 
$timeout = $timestamp-$timeoutseconds; 
$SID = session_id(); 

$insert = mysql_query("INSERT INTO useronline (timestamp,ip,file) VALUES ('$timestamp','$SID','$PHP_SELF')"); 
if(!($insert)) { 
print "kayit hatasi> "; 
} 
$delete = mysql_query("DELETE FROM useronline WHERE timestamp<$timeout"); 
if(!($delete)) { 
print ""; 
} 
$result = mysql_query("SELECT DISTINCT ip FROM useronline WHERE file='$PHP_SELF'"); 
if(!($result)) { 
print ""; 
} 
$user = mysql_num_rows($result); 


mysql_close(); 
if($user == 1) { 
print("<center><font color=blue size=1><b>$user</b></font><font size=1> Kisi Online</font>\n"); 
} else { 
print("<font color=blue size=1><b>$user</b></font><font size=1> Kisi Online</font>\n"); 
} 

?>