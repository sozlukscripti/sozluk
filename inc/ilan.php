<? 
$p=mysql_real_escape_string($_GET["p"]);
$n=mysql_real_escape_string($_GET["n"]);
	  
if(!$p) { $b = 0; }else {$b = $p*10; }
if(!$n) { $n = 10; }else {$n = $n; }
		  
?>
<? if (!$verified_user) {die("sadece araçlardan giriş yapabilirsiniz!");} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title><? include "config.php";  echo $sitename;?> İlanlar</title>


</head> 
<br>
<br>
<center>
<TABLE cellSpacing=0 cellPadding=0 width="50%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD class=tab>
            
           <DIV><A href="sozluk.php?process=ilanx">ilan ekleyeceğim</A></DIV></TD>
          <TD class=tab>
            <TD class=tabsel>ilanlar</TD>
          <TD class=tab>   
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
<td class="tabin">
<fieldset><legend>Bunlar var;</legend>
<?
$tarih = date("d/m/Y");

$ilanbilgi = ereg_replace("'","''",$ilanbilgi);
$ilanbilgi = ereg_replace("&lt","(",$ilanbilgi);
$ilanbilgi = ereg_replace("&gt",")",$ilanbilgi);
$ilanbilgi = ereg_replace("<","(",$ilanbilgi);
$ilanbilgi = ereg_replace(">",")",$ilanbilgi);
$ilanbilgi = ereg_replace("\n","<br>",$ilanbilgi);
$ilanbilgi = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$ilanbilgi);
$ilanbilgi = preg_replace("'\(c: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$ilanbilgi);
$ilanbilgi = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6\\8\\9</a>", $ilanbilgi);
$ilanbilgi = preg_replace("'\&([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>&\\1</a>",$ilanbilgi);

$sorgulama = @mysql_query("Select * from ilansayfasi order by id DESC Limit $b,10");
$sql2 = @mysql_query("Select * from ilansayfasi order by id DESC");


$top = mysql_num_rows($sql2); 
echo "<center><br>$top adet ilan - sayfalar:<br>";
function divs($int,$n){
if(is_float($int/$n)) { $roun = ceil($int/$n); return $roun; }
else{ return $int/$n;}
}
if($top!=0) { 
if($p-1<0) { $onceki = 0; }else {$onceki = 1; }
if(!$p-1<0) { echo @"<a href=\"sozluk.php?process=ilan&p=".($p-$onceki)."#bas\"><img src=\"images/onceki.gif\" height=\"13\" width=\"15\" border=\"0\"></a> "; }
for ($s = 0; $s < divs($top,$n); $s++) {

if($p+1>$s) { $sonraki = 0; }else {$sonraki = 1; }

if($p==$s) { 
echo @"<b><a href=\"sozluk.php?process=ilan&p=$s#bas\">[".($s+1)."]</a></b> ";}else{ echo @"<a  href=\"sozluk.php?process=ilan&p=$s#bas\">".($s+1)."</a> "; } }
if($p+1==$s) { }else{ echo @"<a href=\"sozluk.php?process=ilan&p=".($p+$sonraki)."#bas\"><img src=\"images/sonraki.gif\" height=\"13\" width=\"15\" border=\"0\"></a>"; }

echo "<br><br></center>";


while($kayit=mysql_fetch_array($sorgulama)) {

/////////
$nick=$kayit["nick"];
$ilanbaslik=$kayit["ilanbaslik"];
$ilanbilgi=$kayit["ilanbilgi"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$id=$kayit["id"];


echo "
<div class='highlight'>$ilanbaslik</div>
<img src=\"images/online2.gif\"> $ilanbilgi<br>
[<b>$nick</b> $gun/$ay/$yil ($saat)  <a href=\"javascript:od('http://ankasozluk.com/sozluk.php?process=privmsg&islem=yenimsj&gkime=$nick&gkonu=ilan',700,350)\">/msj</a>]<br><hr>"

;

}
}


?>
<br>
<br>
<hr>
<div class='copyright'><center>ilanlar, ilan verenlerin sorumluluğundadır, <?echo $sitename;?> hiç bir sorumluluk kabul etmez<br><?echo $site;?></center></div>
</fieldset>
<? $date = date ("d/m/y"); echo "<center>bugün: $date</center>"; ?>