<?
include "config.php";


$sorgu1 = "SELECT * FROM stat";

$sorgu2 = mysql_query($sorgu1);

$kayit2=mysql_fetch_array($sorgu2);
mysql_num_rows($sorgu2);
$baslik=$kayit2[baslik];

$entry=$kayit2["entry"];
$silbaslik=$kayit2["silbaslik"];
$silentry=$kayit2["silentry"];
$hit=$kayit2["hit"];
$tekil=$kayit2["tekil"];
$yazar=$kayit2["yazar"];
$okur=$kayit2["okur"];
$mod=$kayit2["moderat"];
$modust=$kayit2["moderatust"];
$op=$kayit2["op"];
$pilot=$kayit2["pilot"];
$admin=$kayit2["admin"];
$ortbaslik=$kayit2["ortbaslik"];
$ortentry=$kayit2["ortentry"];
$enhitbaslik=$kayit2["enhitbaslik"];
$tarih=$kayit2["tarih"];

$gammaz=@mysql_num_rows(mysql_query("select * from user where yetki='gammaz'"));

$basliklink = ereg_replace(" ","+",$enhitbaslik);
$user=mysql_query("Select * from user",$baglan);
$totaluser=mysql_num_rows($user);
$caylakuser=mysql_num_rows(mysql_query("select * from user where durum='off'"));
$comezuser=mysql_num_rows(mysql_query("select * from user where durum='wait'"));
$silikuser=mysql_num_rows(mysql_query("select * from user where durum='sus'"));
$bayanuser=mysql_num_rows(mysql_query("select * from user where cinsiyet='f'"));
$erkekuser=mysql_num_rows(mysql_query("select * from user where cinsiyet='m'"));
$erkekgibi=mysql_num_rows(mysql_query("select * from user where cinsiyet='mf'"));
$kadingibi=mysql_num_rows(mysql_query("select * from user where cinsiyet='fm'"));
$adminuser=mysql_num_rows(mysql_query("select * from user where yetki='admin'"));
$modust=mysql_num_rows(mysql_query("select * from user where yetki='modust'"));
$modalt=mysql_num_rows(mysql_query("select * from user where yetki='mod'"));
$gammazuser=mysql_num_rows(mysql_query("select * from user where yetki='gammaz'"));
$basliksayisi=mysql_num_rows(mysql_query("select * from konucuklar"));
$entrysayisi=mysql_num_rows(mysql_query("select * from mesajciklar"));
echo "
<SCRIPT src=\"images/sozluk.js\" type=text/javascript></SCRIPT>
<META http-equiv=Content-Type content=\"text/html; charset=iso-8859-9\">
anka sözlük hakkýnda rakamsal atraksiyonlar.... <br><br>

<table align=center width=\"520\" border=\"0\" cellSpacing=0 cellPadding=0>
  <tr>
    <td width=\"300\">1. <a class=div>baþlýk sayýsý</td>
    <td width=\"4\">:</td>
    <td width=\"271\">$basliksayisi</td>
  </tr>
  
   <tr>
   <td>2. <a class=div>girilen entry sayýsý </td>
   <td>:</td>
   <td>$entrysayisi</td>
  </tr>
  <tr>
    <td colspan=\"3\"></td>
  </tr>
  <tr>
    <td>3. <a class=div>...total yazar sayýsý </td>
    <td>:</td>
    <td>$totaluser</td>
  </tr>
  <tr>
    <td>4. <a class=div>...çaylak yazar sayýsý </td>
    <td>:</td>
    <td>$caylakuser</td>
  </tr>
  <tr>
    <td>5. <a class=div>...çömez yazar sayýsý </td>
    <td>:</td>
    <td>$comezuser</td>
  </tr>
  <tr>
    <td>6. <a class=div>...silik yazar sayýsý </td>
    <td>:</td>
    <td>$silikuser</td>
  </tr>
  <tr>
    <td>7. <a class=div>...baðyan yazar sayýsý </td>
    <td>:</td>
    <td>$bayanuser</td>
  </tr>
  <tr>
    <td>8. <a class=div>...erkek yazar sayýsý </td>
    <td>:</td>
    <td>$erkekuser</td>
  </tr>
  <tr>
    <td>9. <a class=div>...erkek gibi yazar sayýsý </td>
    <td>:</td>
    <td>$erkekgibi</td>
  </tr>
    <tr>
    <td>10. <a class=div>...kadýn gibi yazar sayýsý </td>
    <td>:</td>
    <td>$kadingibi</td>
  </tr>
  <tr>
   <td>11. <a class=div>admin </td>
   <td>:</td>
   <td>$adminuser</td>
  </tr>
  <tr>
   <td>12. <a class=div>mod </td>
   <td>:</td>
   <td>$modust</td>
  </tr>
  <tr>
   <td>13. <a class=div>co-mod </td>
   <td>:</td>
   <td>$modalt</td>
  </tr>
  <tr>
   <td>14. <a class=div>gammaz </td>
   <td>:</td>
   <td>$gammazuser</td>
  </tr>
	<tr>
    <td>13. <a class=div>en çok siklenen baþlýk </td>
    <td>:</td>
    <td><a href=sozluk.php?process=word&q=anka+sözlük target='main'> anka sözlük </a></td>
  </tr>



 
</table>
";

?>

