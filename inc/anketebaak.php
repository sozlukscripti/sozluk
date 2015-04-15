<?

$sayac = 0;
$sorgu = "SELECT * FROM anketonline ORDER BY nick asc";
$sorgulama = mysql_query($sorgu);
$kac = mysql_num_rows($sorgulama);

if (mysql_num_rows($sorgulama)>0){

while ($kayit=mysql_fetch_array($sorgulama)){

###################### var ##############################################
$nick=$kayit["nick"];
$ondurum=$kayit["ondurum"];
$ip=$kayit["ip"];
$sayac++;

if ($ondurum == "on")
$echodurum = "Yazar";

$checknick = explode("+", $nick);
$checknick = $checknick[1];

$msgnick = str_replace(".","",$nick);
$msgnick = str_replace("&","",$nick);



if ($checknick)
$nick = "$nick";
$count++;
if ($ondurum == "on")
echo "$iptit <font size='2'><li value=$count>$nick</li></font><br>";

}
}
?>