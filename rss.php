<?PHP
include("config.php");
$bugunnn = date("r"); 
$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$adres=$kayit2["site_url"];
$title=$kayit2["site_title"];
$desc=$kayit2["site_desc"];
echo "<?xml version=\"1.0\" encoding=\"iso-8859-9\"?>\n";
?>
<rss version="2.0">
<channel>
<title><?=$title?></title>
<link><?=$adres?></link>
<description><?=$desc?></description>
<lastBuildDate><?=$bugunnn?></lastBuildDate>
<language>tr-TR</language> 
<?
//sorgu baþlar
$sqlRSS="SELECT * FROM konucuklar ORDER BY tarih DESC limit 20000000";
$okuRSS=mysql_query($sqlRSS); 

while ($konucuklar=mysql_fetch_array($okuRSS)){
$konuid=$konucuklar["id"];
$konuadi=$konucuklar["baslik"];
$sorgu2=mysql_query("select * from mesajciklar where sira='$konuid' order by tarih desc limit 1");
$entryler=mysql_fetch_array($sorgu2);
$sonentry=$entryler["mesaj"];
$entry=substr($sonentry,0,350);
$link1=$konuadi;
$link=str_replace (" ", "+",$link1);
$tarih=$entryler["tarih"];

echo "<item>\n";
echo "<title>".$konuadi."</title>\n";
echo "<link>$adres".$link.".html</link>\n";
echo "<description><![CDATA[".$entry."]]></description>\n";
echo "</item>\n";
}

?>
</channel>
</rss> 