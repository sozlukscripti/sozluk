<? 
$p=mysql_real_escape_string($_GET["p"]);
$n=mysql_real_escape_string($_GET["n"]);

if(!$p) { $b = 0; }else {$b = $p*10; }
if(!$n) { $n = 10; }else {$n = $n; }
		  
?>
<?
if (!$verified_user) die("just register yazarlar girebilir lan!");

$sorgu = "SELECT nick,sehir,isim FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);

$tarih = date("dmY");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
 
mysql_query("SET NAMES 'latin5'"); 
if($_POST['mode']=="gonder") { 

@mysql_query("INSERT INTO `soru` ( `id` , `soru` , `cevap` , `tarih` , `gun` , `ay` , `yil` , `saat` , `soran` , `durum` ) 
VALUES (
NULL , '".$_POST['soru']."', '','$tarih','$gun','$ay','$yil','$saat', '$nick', 'h'
)");
echo "<script>alert('sorunuz en kisa sürede yanýtlanacaktýr')</script>";
}
?>
<span class="title"><? include "config.php";  echo $sitename;?> ulema</span><br><br>
<?
$sorgulama = @mysql_query("Select * from soru where durum = 'e' order by id DESC Limit $b,10");
$sql2 = @mysql_query("Select * from soru where durum = 'e' order by id DESC");




$top = mysql_num_rows($sql2); 
echo "<center><br>$top Adet Soru - Sayfalar:<br>";
function divs($int,$n){
if(is_float($int/$n)) { $roun = ceil($int/$n); return $roun; }
else{ return $int/$n;}
}
if($top!=0) { 
if($p-1<0) { $onceki = 0; }else {$onceki = 1; }
if(!$p-1<0) { echo @"<a href=\"sozluk.php?process=ulema&p=".($p-$onceki)."#bas\"><img src=\"images/onceki.gif\" height=\"13\" width=\"15\" border=\"0\"></a> "; }
for ($s = 0; $s < divs($top,$n); $s++) {

if($p+1>$s) { $sonraki = 0; }else {$sonraki = 1; }

if($p==$s) { 
echo @"<b><a href=\"sozluk.php?process=ulema&p=$s#bas\">[".($s+1)."]</a></b> ";}else{ echo @"<a  href=\"sozluk.php?process=ulema&p=$s#bas\">".($s+1)."</a> "; } }
if($p+1==$s) { }else{ echo @"<a href=\"sozluk.php?process=ulema&p=".($p+$sonraki)."#bas\"><img src=\"images/sonraki.gif\" height=\"13\" width=\"15\" border=\"0\"></a>"; }

echo "<br><br></center>";


while($kayit=mysql_fetch_array($sorgulama)) {

$id=$kayit["id"];
$soru=$kayit["soru"];
$cevap=$kayit["cevap"];
$tarih=$kayit["tarih"];
$soran=$kayit["soran"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$say++;

$soru = ereg_replace("&lt","(",$soru);
$soru = ereg_replace("&gt",")",$soru);
$soru = ereg_replace("<","(",$soru);
$soru = ereg_replace(">",")",$soru);
$soru = ereg_replace("\n","<br>",$soru);
$soru = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$soru);
$soru = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$soru);
$soru = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$soru);
$soru = preg_replace("'\(spoiler: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br><br>",$soru);
$soru = preg_replace("'\(alinti: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br><br>",$soru);
$soru = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6\\8\\9</a>", $soru);
$soru = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$soru);




$cevap = ereg_replace("&lt","(",$cevap);
$cevap = ereg_replace("&gt",")",$cevap);
$cevap = ereg_replace("<","(",$cevap);
$cevap = ereg_replace(">",")",$cevap);
$cevap = ereg_replace("\n","<br>",$cevap);
$cevap = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$cevap);
$cevap = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$cevap);
$cevap = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$cevap);
$cevap = preg_replace("'\(spoiler: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br><br>",$cevap);
$cevap = preg_replace("'\(alinti: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br><br>",$cevap);
$cevap = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6\\8\\9</a>", $cevap);
$cevap = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$cevap);

echo "<table>";
echo "<li><fieldset align=right><legend>#$say nolu soru - $gun/$ay/$yil $saat</legend>

<div class=\"highlight\"><b>kim sormuþ</b> : <a href=\"javascript:od('sozluk.php?process=ben&kim=$soran','400','400')\">$soran</a></div><br> 
<div><b>ne sormuþ</b> : $soru <br><br></div>
<div class=\"highlight\"><b>cevabý</b> : $cevap</div><br><br>

</fieldset></li>";
}
}

?>

				
                      <br><br><br><br><br><br>
                      <form name="form1" method="post" action="">
                        <table width="500" border="0" cellpadding="1" cellspacing="1">
                         <tr>
                            <td align="center" valign="middle"><strong>sorum geldi:</strong>
                            <textarea name="soru" cols="75" rows="5" id="soru" onKeyPress="eval(document.getElementById('submit').disabled=false)"></textarea>
                        <tr>
				<td align=\"left\">
				<input class="but" type="button" name="bkz" value="(bkz: )" onclick="hen('soru','(bkz: ',')')" accesskey=x>
				<input class="but" type="button" name="bkz" value="(gbkz: )" onclick="hen('soru','(gbkz: ',')')" accesskey=c>
				<input class="but" type="button" name="bkz" value="*" onclick="hen('soru','(u: ',')')" accesskey=v>
				<input class="but" type="button" name="bkz" value="-spo-" onclick="hen('soru','--- (gbkz: spoiler) ---\n\n','\n\n--- (gbkz: spoiler) ---')" accesskey=s> 
				<br>
				<br>	
			      </td>
                          </tr>
                          <a href='sozluk.php?process=ulema' title="yenile">yenile</a>
				  <tr>
                            <td align="center"><input name="mode" type="hidden" id="mode" value="gonder">
                              <input name="submit" type="submit" class="but" id="submit" value="sor, rahatla" onMouseOut="this.className = 'but'" onMouseOver="this.className = 'but'" disabled="disabled"/>
                              <input name="Reset" type="reset" class="but" value="sil sil! bu ne!"  onmouseout="this.className = 'but'" onMouseOver="this.className = 'but'"/></td>
                          </tr>
                          <tr>
                            <td align="center">lütfen size yakýþýr þekilde, mantýklý sorular sorun. her sorunuza cevap verilecek diye hayatýn anlamýný sormaya kalkmayýn, daha biz de bilmiyoruz çünkü...</span></td>
                          </tr>
                     </table>
                     </form>
                  </center></td>
<?
if ($verified_user == "the brain" or $verified_user == "sermininbeceriksizi" ) {
echo "<br><br><div class=\"but\"><a type=submit title=\"yönetim\" target=\"main\" href=\"javascript:od('sozluk.php?process=adm&islem=ulemaa',600,600)\">sorulara bakayým, cevap vereyim</a></div>
</td><br>";
}
?>
     
		</tr>
          </table></td>
</html>
<? mysql_close(); ?> 
