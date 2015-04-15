<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
<META http-equiv=Content-Type content="text/html; charset=windows-1254">
<body class=bgleft>
<?
include "hayvanara.php";
$sor = mysql_query("select id from konucuklar where statu = ''");
$w = mysql_num_rows($sor);

echo "
<center><small>·&nbsp;al sana karışık&nbsp;·</small></center><br>
<TABLE cellSpacing=0 cellPadding=0 border=0>
  <TBODY>";

for ( $i = 1 ; $i <= 50 ; ++$i) {
mt_srand ((double)microtime()*1000000);
$maxran = $w;
$sayi = mt_rand(1, $maxran);
if (!$sayi)
echo "var bisiler var";

$sorgu1 = "select baslik from konucuklar WHERE id = $sayi and statu = ''";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];
$link = ereg_replace(" ","+",$baslik);
if (!$baslik)
$i--;
else
echo "
  <TR onmouseover=\"vi('m0',true)\" onmouseout=\"vi('m0',false)\">
    <TD>·&nbsp;</TD>
  <TD width=190><A title=\"\"href=\"$link.html\"
      target=main>$baslik</A>&nbsp;</TD></TR>
";
}
?>
</BODY></HTML>