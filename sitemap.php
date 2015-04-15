<?
header('Content-Type: text/xml');
include ("config.php");
$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$adres=$kayit2["site_url"];
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">";
echo "<url>";
echo "<loc>$adres";
echo "</loc> ";
echo "<lastmod>".date('Y-m-d')."</lastmod>";
echo "<changefreq>daily</changefreq>";
echo "<priority>1.00</priority>";
echo "</url>";
$sor = mysql_query("SELECT * FROM konucuklar ORDER BY tarih DESC");
while($yaz=mysql_fetch_array($sor)){
$ad = $yaz['baslik'];
$id = $yaz['id'];
$yil = $yaz['yil'];
$ay = $yaz['ay'];
if($ay<10) $ay='0'.$ay;

$gun = $yaz['gun'];
if($gun<10) $gun='0'.$gun;
$date =date("$yil-$ay-$gun");
$ad = strtolower(stripslashes(strtr($ad,"ÜSÇIGÖüösçigi?","USCIGOuoscigi-")));
$ad = str_replace(" ","+",$ad);
echo "<url>";
echo "<loc>$adres";
echo "$ad.html";
echo "</loc> ";
echo "<lastmod>$date</lastmod>";
echo "<changefreq>daily</changefreq>";
echo "<priority>0.70</priority>";
echo "</url>";
}
echo "</urlset>";
?>