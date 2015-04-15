<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-9">
<SCRIPT language=javascript src="images/sozluk.js"></SCRIPT>
<LINK href="images/<? echo $tema; ?>.css" type=text/css rel=stylesheet>
<title><?=$sitename?> admin</title>
</head>

<body>
<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=sozluk.php?process=refresh\">";
die;
}
if ($_REQUEST[kullanici] or $_REQUEST[sozluk] or $_REQUEST[yazaronayla] or $_REQUEST[ipban] or $_REQUEST[akillananlar] or $_REQUEST[duyuru] or $_REQUEST[register] or $_REQUEST[ipban]) {  die(); }

if ($verified_kat == "admin") {
$entry = 1;
$ispit = 1;
$baslik = 1;
$kullanici = 1;
$sozluk = 1;
$haber = 1;
$duyuru = 1;
$gecmis = 1;
$oluler = 1;
$stat = 1;
$yazaronayla = 1;
$basliktasi = 1;
$register = 1;
$akillananlar = 1;
$ipban = 1;
$temaekle = 1;
$duyurumsj = 1;
$sikayet = 1;
}
else if ($verified_kat == "modust") {
$duyuru = 1;
$ispit = 1;
$entry = 1;
$baslik = 1;
$kullanici = 1;
$sozluk = 1;
$haber = 1;
$gecmis= 1;
$oluler = 1;
$stat = 1;
$yazaronayla = 1;
$basliktasi = 1;
$register = 1;
$akillananlar = 1;
$duyurumsj = 1;
$sikayet = 1;
$ipban = 1;
}
else if ($verified_kat == "mod") { 
$duyuru = 0;
$ispit = 1;
$entry = 1;
$baslik = 1;
$kullanici = 1;
$sozluk = 0;
$haber = 0;
$gecmis= 0;
$oluler = 1;
$stat = 0;
$yazaronayla = 0;
$basliktasi = 1;
$register = 0;
$akillananlar = 1;
$sikayet = 1;
$yazarislem = 1;
}
else if ($verified_kat == "gammaz") {
$ispit = 1;
}

$tarih=date("d,m,y");
echo "
<table width=\"700\" height=\"80\" border=\"0\">
  <tr>
<td colspan=\"4\">$verified_kat /  <b>$verified_user</b> / $tarih /<br><center>gereksiz silmeler yapmayalım bide asl? kuralları dışına çıkmayalım yeter.
</br>


</center><i></i></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
";
if ($verified_kat == "admin") {
echo "
<tr>
 <SCRIPT type=text/javascript>
	b(\"main\",\"sozluk.php?process=adm&islem=sozluk\",\"sözlük işlemleri\",\"sözlük işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=temaekle\",\"tema ekle\",\"tema ekle\");
	b(\"main\",\"sozluk.php?process=adm&islem=haber\",\"olanbiten işlemleri\",\"olanbiten işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=duyuruvarmis\",\"duyuru işlemleri\",\"duyuru işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=stat\",\"stats update\",\"stats update et\");
	b(\"main\",\"sozluk.php?process=adm&islem=goster\",\"şikayetler\",\"şikayetler\");
	b(\"main\",\"sozluk.php?process=adm&islem=statgen\",\"istatislik\",\"istatislik\");
  </script>
 </tr>
<tr>
<SCRIPT type=text/javascript>
	b(\"main\",\"sozluk.php?process=adm&islem=kullanici\",\"kullanıcı işlemleri\",\"kullanıcı işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=register\",\"yazar kayıt\",\"yazar kayıt\");
	b(\"main\",\"sozluk.php?process=adm&islem=okurlar\",\"yazar onayla\",\"yazar onayla\");
	b(\"main\",\"sozluk.php?process=adm&islem=toplupm\",\"toplu pm\",\"toplu pm\");
	b(\"main\",\"sozluk.php?process=adm&islem=dogumgunut\",\"doğum günü\",\"doğum günü tebrik\");
	b(\"main\",\"sozluk.php?process=adm&islem=ulemaa\",\"ulema\",\"ulema\");
	b(\"main\",\"sozluk.php?process=adm&islem=ipbanlist\",\"ip ban\",\"ip banla\");
  </script>
 </tr>
<tr>
<SCRIPT type=text/javascript>
	b(\"main\",\"sozluk.php?process=adm&islem=entry\",\"entry işlemleri\",\"entry işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=akillananlar\",\"a entryler\",\"akıllanan entryler\");
	b(\"main\",\"sozluk.php?process=adm&islem=oluler\",\"ölü entrylar\",\"ölü entrylar\");
	b(\"main\",\"sozluk.php?process=adm&islem=baslik\",\"başlık işlemleri\",\"başlık işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=olubasliklar\",\"ölü başlıklar\",\"ölü başlıklar\");
	b(\"main\",\"sozluk.php?process=adm&islem=ispit\",\"ispitlenenler\",\"ispitlenenler\");
	b(\"main\",\"sozluk.php?process=adm&islem=modlog\",\"modlog\",\"modlog\");
    </script>
</tr>
";
}
else if ($verified_kat == "modust") {
echo "
<tr>
 <SCRIPT type=text/javascript>
	b(\"main\",\"sozluk.php?process=adm&islem=sozluk\",\"sözlük işlemleri\",\"sözlük işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=temaekle\",\"tema ekle\",\"tema ekle\");
	b(\"main\",\"sozluk.php?process=adm&islem=haber\",\"olanbiten işlemleri\",\"olanbiten işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=duyuruvarmis\",\"duyuru işlemleri\",\"duyuru işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=stat\",\"stats update\",\"stats update et\");
	b(\"main\",\"sozluk.php?process=adm&islem=goster\",\"şikayetler\",\"şikayetler\");
	b(\"main\",\"sozluk.php?process=adm&islem=statgen\",\"istatislik\",\"istatislik\");
  </script>
 </tr>
<tr>
<SCRIPT type=text/javascript>
	b(\"main\",\"sozluk.php?process=adm&islem=kullanici\",\"kullanıcı işlemleri\",\"kullanıcı işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=register\",\"yazar kayıt\",\"yazar kayıt\");
	b(\"main\",\"sozluk.php?process=adm&islem=okurlar\",\"yazar onayla\",\"yazar onayla\");
	b(\"main\",\"sozluk.php?process=adm&islem=toplupm\",\"toplu pm\",\"toplu pm\");
	b(\"main\",\"sozluk.php?process=adm&islem=dogumgunut\",\"doğum günü\",\"doğum günü tebrik\");
	b(\"main\",\"sozluk.php?process=adm&islem=ulemaa\",\"ulema\",\"ulema\");
	b(\"main\",\"sozluk.php?process=adm&islem=ipbanlist\",\"ip ban\",\"ip banla\");
  </script>
 </tr>
<tr>
<SCRIPT type=text/javascript>
	b(\"main\",\"sozluk.php?process=adm&islem=entry\",\"entry işlemleri\",\"entry işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=akillananlar\",\"a entryler\",\"akıllanan entryler\");
	b(\"main\",\"sozluk.php?process=adm&islem=oluler\",\"ölü entrylar\",\"ölü entrylar\");
	b(\"main\",\"sozluk.php?process=adm&islem=baslik\",\"başlık işlemleri\",\"başlık işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=olubasliklar\",\"ölü başlıklar\",\"ölü başlıklar\");
	b(\"main\",\"sozluk.php?process=adm&islem=ispit\",\"ispitlenenler\",\"ispitlenenler\");
	b(\"main\",\"sozluk.php?process=adm&islem=modlog\",\"modlog\",\"modlog\");
    </script>
</tr>
";
}
else{

if ($verified_kat != "gammaz") {
echo "
  <tr>
<SCRIPT type=text/javascript>
	b(\"main\",\"sozluk.php?process=adm&islem=entry\",\"entry işlemleri\",\"entry işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=oluler\",\"ölü entrylar\",\"ölü entrylar\");
	b(\"main\",\"sozluk.php?process=adm&islem=baslik\",\"başlık işlemleri\",\"başlık işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=haber\",\"olanbiten işlemleri\",\"olanbiten işlemleri\");
	b(\"main\",\"sozluk.php?process=adm&islem=olubasliklar\",\"ölü başlıklar\",\"ölü başlıklar\");


</script>
 </tr>
 <tr>
<SCRIPT type=text/javascript>

	b(\"main\",\"sozluk.php?process=adm&islem=register\",\"yazar kayıt\",\"yazar kayıt\");
	b(\"main\",\"sozluk.php?process=adm&islem=okurlar\",\"yazar onayla\",\"yazar onayla\")
	b(\"main\",\"sozluk.php?process=adm&islem=yazarislem\",\"yazar işlemleri\",\"yazar işlemleri\")
	b(\"main\",\"sozluk.php?process=adm&islem=modlog\",\"modlog\",\"modlog\");;;

</script>
 </tr>
";
}
echo "
<SCRIPT type=text/javascript>
	b(\"main\",\"sozluk.php?process=adm&islem=ispit\",\"ispitlenenler\",\"ispitlenenler\");
</script>";}
echo "
  </tr>
  <tr>
    <td colspan=\"6\"><hr></td>
  </tr>
  <tr>
    <td colspan=\"6\">
    ";

if ($islem) {
// echo $process;
if (file_exists("adm/$islem.php"))
include "adm/$islem.php";
else
echo "
Bu bölüm geçici olarak servis dışı.";
}

echo "
    </td>
  </tr>
</table>
";
   ?>

         





</body>
</html>