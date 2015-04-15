<title>Online Yazar Sayýsý</title>
<SCRIPT LANGUAGE="JavaScript">
 <!-- 
function Start(page)
 {
 OpenWin = this.open(page, "CtrlWindow","toolbar=No,menubar=No,location=No,scrollbars=No,resizable=No,status=No,left=150,top=150,");
 }
 //-->
</SCRIPT>
<small></small><br>


<?

if (!$verified_user)
die("ya meraktan..!");
if ($verified_user)
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"60;URL=sozluk.php?process=onlines\">";

$sayac = 0;
$sorgu = "SELECT * FROM online ORDER BY nick asc";
$sorgulama = mysql_query($sorgu);
$kac = mysql_num_rows($sorgulama);

echo "

</center>
<a title=\"$kac kayitli onlayn\"><b>online</b> ($kac) </a>$pms<hr>";
if (mysql_num_rows($sorgulama)>0){
//kayytlary listele
while ($kayit=mysql_fetch_array($sorgulama)){

###################### var ##############################################
$nick=$kayit["nick"];
$ondurum=$kayit["ondurum"];
$ip=$kayit["ip"];
$sayac++;

if ($ondurum == "on")
$echodurum = "Yazar";
if ($ondurum == "off")
$echodurum = "Çömez";
if ($ondurum == "wait")
$echodurum = "Yazar Adayý";
if ($ondurum == "sus")
$echodurum = "Tekmelenmiþ";

$checknick = explode("+", $nick);
$checknick = $checknick[1];

$msgnick = str_replace(".","",$nick);
$msgnick = str_replace("&","",$nick);



if ($checknick)
$nick = "$nick";

if ($verified_kat == "admin" or $verified_kat == "modust") {
$iptit = "<a title=\"$ip blockla\" href=\"sozluk.php?process=adm&islem=ipban&ip=$ip\" class=link> <font size=\"1\" color=\"red\">$ip </font></a> "
;
}
if ($verified_kat == "admin" or $verified_kat == "modust") {
$editit = "<a title=\"$nick editle\" href=\"sozluk.php?process=adm&islem=kullanici&update=ok&gnick=$nick\" class=link> <font size=\"1\" color=\"blue\">edit </font></a> "
;
}
$sorgu=mysql_query("select durum,yetki,nick,regtarih,ileti from user where nick='$msgnick'");
$iletisi=@mysql_result($sorgu,0,'ileti');



if ($ondurum == "off")
echo "$iptit $editit<font size='2'>$nick<br></font><a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$msgnick\" title=\"$echodurum\"><font size=1>msg</a> <a href='sozluk.php?process=arkadasekle&n=$msgnick' title='panpam olsun'>+</a>  <a href='sozluk.php?process=dusmanekle&n=$msgnick' title='bloke et'>-</a>  <a href=\"javascript:od('sozluk.php?process=ben&kim=$msgnick',350,450)\">?</a></font> <br>";  
if ($ondurum == "on")
echo "$iptit $editit<a href=\"javascript:od('sozluk.php?process=ben&kim=$msgnick',350,450)\"><font size='2' color='black'>$nick</font></a></br><font size=1 color=gray>$iletisi </font><a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$msgnick\" title=\"$echodurum\"><font size=1>msg</a> <a href='sozluk.php?process=arkadasekle&n=$msgnick' title='panpam olsun'>+</a> <a href='sozluk.php?process=dusmanekle&n=$msgnick' title='bloke et'>-</a> <a href=\"javascript:od('sozluk.php?process=ben&kim=$msgnick',350,450)\">?</a>
<br>";
if ($ondurum == "wait")
echo "$iptit $editit<font size='2'>$nick<br></font><a href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$msgnick\" title=\"$echodurum\"><font size=1>msg</a> <a href='sozluk.php?process=arkadasekle&n=$msgnick' title='panpam olsun'>(+)</a>  <a href=\"javascript:od('sozluk.php?process=ben&kim=$msgnick',350,450)\">?</a><br>";

}
}

?>

<center>


