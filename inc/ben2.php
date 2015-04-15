<?

if ($verified_user) {

 if ($_GET['kim']) {

?>

<title>Yazar</title>

<script type="text/javascript">function sc(id){var o = document.getElementById(id),d = new Date(2012,12,21);with(o.style){display=display=="none"?"block":"none";document.cookie = id+"="+display+";expires="+d.toGMTString();}}</script>

<table width="100%" border=0 cellpadding=0 cellspacing=0>

<tr><td>

<?

 $sorgu=mysql_query("select * from user where nick='$_GET[kim]'");

 $kontrol=@mysql_num_rows($sorgu);

 $nesil=@mysql_result($sorgu,0,'nesil');

 $nosebep=@mysql_num_rows($silsebep);

 $regtarih=@mysql_result($sorgu,0,'regtarih');

 $durum=@mysql_result($sorgu,0,'durum');

 $yetki=@mysql_result($sorgu,0,'yetki');

 $nick=@mysql_result($sorgu,0,'nick');

 $ileti=@mysql_result($sorgu,0,'ileti');
 
 $avatar=@mysql_result($sorgu,0,'avatar');
 
 $cinsiyet=@mysql_result($sorgu,0,'cinsiyet');
 
  $bolum=@mysql_result($sorgu,0,'bolum');

  $sorgu2=mysql_query("select * from oylar where entry_sahibi='$nick' and oy='1' order by id desc limit 0,20");

 $sorgu3=mysql_query("select * from oylar where entry_sahibi='$nick' and oy='0' order by id desc limit 0,20");

  $sorgu4=mysql_query("select * from oylar where entry_sahibi='$nick' and oy='2' order by id desc limit 0,20");

 $kacmesaj=mysql_num_rows(mysql_query("select id from mesajciklar where yazar='$nick'"));

$silsebep=mysql_query("select silsebep from mesajciklar where yazar='$nick' group by silsebep order by yazar desc limit 10");

 $no=@mysql_num_rows($sorgu2);

 $no2=@mysql_num_rows($sorgu3);
 $no3=@mysql_num_rows($sorgu4);

 echo "<form action='' method='GET'><input type='hidden' name='process' value='ben'><input type='text' name='kim' size='13' class='input'> <input type='submit' value='getir' class='but'> <input type='button' value='kapat' onclick='window.close();' class=but></form><br>";
echo "<center>";
 if ($kontrol==0) {

 echo "yok böyle bir yazar</td></tr></table>";

 die();

 } else 
 


 echo "<a href='sozluk.php?process=word&q=$nick' target=main>$nick</a><br> ";

       if( $nick == "renvacy") {
	echo ("yeni gelmiþ sünepe ");
	}
	   else if( $nick == "metalist") {
	echo ("coder ");
	}
	   else if( $nick == "fisting") {
	echo ("anka sözlük mobil geliþtirmenatör ");
	}
	   else if( $nick == "kurt") {
	echo ("birinci nesil 'fedakar' anka sözlük ");
	}
	   else if( $nick == "ilyadis") {
	echo ("birinci nesil 'fedakar' anka sözlük ");
	}
	   else if( $nick == "tombul dede") {
	echo ("birinci nesil 'fedakar' anka sözlük ");
	}
	   else if( $nick == "harb0y anka") {
	echo ("birinci nesil 'destekçi' anka sözlük ");
	}
	   else if( $nick == "dexter moron") {
	echo ("birinci nesil 'emektar' anka sözlük ");
	}
	
	   else if( $nick == "biz turistiz") {
	echo ("birinci nesil anka sözlük gececi ");
	}
	   else if( $nick == "pilotburak") {
	echo ("birinci nesil anka sözlük pilot ");
	}
	   else if( $nick == "emekli kerhaneci") {
	echo ("birinci nesil anka sözlük 'klarnetçi' ");
	}

	else if ($regtarih<"2015/06/01 17:08") {

    echo ("birinci nesil anka sözlük ");
	
    }

        else if ($regtarih>"2015/06/01 17:10" and  $regtarih<"2015/06/01 17:11") {

    echo ("ikinci nesil anka sözlük ");

    }
	
	else
	echo ("üçüküncü anka sözlük ");
	 
	



  if ($durum=="on") {

   if ( $nick == "renvacy") {

    echo "";
   } else
   if ( $nick == "kurt") {

    echo "kurusu";
   } else

   if ($yetki=="admin") {

    echo "admin";

   } else if ($yetki=="modust") {

    echo "moderatörü";

   }else if ($yetki=="mod") {

   echo "co-mod";

   }else if ($yetki=="gammaz") {
   echo "ispitçi";
   }else if ($yetki=="yetkisiz") {
   echo "silik";

   } else {

   if ($kacmesaj>100 and $kacmesaj<=200) {

   echo "sünepe yazarý";

   } else if ($kacmesaj>200 and $kacmesaj<=500) {

   echo "piçöz yazarý";

   } else if ($kacmesaj>500 and $kacmesaj<=1000) {

   echo "aðabeyi";

   } else if ($kacmesaj>1000 and $kacmesaj<=2000) {

   echo "taþaklý yazarý";

   } else if ($kacmesaj>2000 and $kacmesaj<=5000) {

   echo "kurusu";

   } else if ($kacmesaj>5000 and $kacmesaj<=10000) {

   echo "azizi";
   } 
    else if ($kacmesaj>10000) {

   echo "efendisi";
   } 
	else {

   echo "yazarý";

   }}

  } else if ($durum=="off") {

   echo "çaylaðý";

  } else if ($durum=="wait") {

   echo "çömez";

  } else if ($durum=="sus") {

   echo "silik";

  }

  echo "<center><br>";

 



 echo "<br>";



 echo "<fieldset style=\"font-style: italic;\">



<span style=\"font-style: normal\"><b>$ileti</b></span></fieldset>

";

 echo "<br>";
echo"<table width=\"100%\" border=0 cellpadding=0 cellspacing=0>"
  . "<tr>"
  . "<td>"
  . "<br>"
  . "<script language=\"javascript\">b(\"main\",\"sozluk.php?process=yazar&yazar=$_GET[kim]\",\"entry'ler\",\"tanýmlarý\")</script><script language=\"javascript\">b(\"main\",\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$_GET[kim]\",\"msj\",\"mesaj yolla\")</script><script language=\"javascript\">b(\"main\",\"sozluk.php?process=arkadasekle&n=$_GET[kim]\",\"dost\",\"arkadaþ listene ekle\")</script><script language=\"javascript\">b(\"main\",\"sozluk.php?process=dusmanekle&n=$_GET[kim]\",\"düþman\",\"düþman listene ekle\")</script>"
  . "</table>"
  . "</td>"
  . "</tr>"
 ."";

 echo "<table cellpadding=0 cellspacing=0 border=0><tr><td width='100%'></td><td><small>";

 $online=mysql_num_rows(mysql_query("select nick from online where nick='$_GET[kim]'"));

 if ($online==0) {

 echo "<hr>(<font color=red>offline</font>)";

 } else {

 echo "<hr>(<font color=green>online</font>)";

 }

 echo "</td></tr></table>";


 echo "<div class=infosec onclick=\"return sc('sb_1')\"><font size='1'>&nbsp;genel ulan</font></div><div style=\"display:none\" id=\"sb_gn\"> </div>";

 echo "<div class=infosec2 id=\"sb_1\">";

 echo "<table class=msg width='80%'><tr class=highlight><td>toplam entry</td><td align=right><b>$kacmesaj</b></td></tr>";

 $artioylar=mysql_num_rows(mysql_query("select id from oylar where entry_sahibi='$_GET[kim]' and oy='1'"));

  $enteresanoylar=mysql_num_rows(mysql_query("select id from oylar where entry_sahibi='$_GET[kim]' and oy='2'"));

 $eksioylar=mysql_num_rows(mysql_query("select id from oylar where entry_sahibi='$_GET[kim]' and oy='0'"));

 $bg=date("d");

 $buay=date("m");

 if ($buay <=10) {

 $r=substr($buay,1,1);

 $f=$r-1;

 $oncekiay="0$f";

 } else {

 $oncekiay=$ay-1;

 }

 if ($bg <=10) {

$ra=substr($bg,1,1);

$du=$ra-1;

$d="0$du";

} else {

$d=$bg-1;

}

 $entrybugun=mysql_num_rows(mysql_query("select id from mesajciklar where yazar='$_GET[kim]' and gun='$bg' and ay='$buay'"));

 $entrydun=mysql_num_rows(mysql_query("select id from mesajciklar where yazar='$_GET[kim]' and gun='$d' and ay='$buay'"));

 $entryay=mysql_num_rows(mysql_query("select id from mesajciklar where yazar='$_GET[kim]' and ay='$buay'"));

 $entrygay=mysql_num_rows(mysql_query("select id from mesajciklar where yazar='$_GET[kim]' and ay='$oncekiay'"));

 $karma=$artioylar-$eksioylar;

 $zaman=mysql_query("select id,gun,ay,yil,saat from mesajciklar where yazar='$_GET[kim]' order by id desc limit 0,1");

 $zamana=@mysql_result($zaman,0,'gun');

 $zamanb=@mysql_result($zaman,0,'ay');

 $zamanc=@mysql_result($zaman,0,'yil');

 $saat=@mysql_result($zaman,0,'saat');

 $saygin=mysql_query("select sayginlik from user where nick='$_GET[kim]'");

 $sayginlik=@mysql_result($saygin,0,'sayginlik');
if ($sayginlik < 1){
$sayginlik = "saygýsýz";
}
  echo "";
 echo "<tr><td>bugün</td><td align=right><b>$entrybugun</b></td></tr>";

 echo "<tr class=highlight><td>dün</td><td align=right><b>$entrydun</b></td></tr>";

 echo "<tr><td>bu ay</td><td align=right><b>$entryay</b></td></tr>";

 echo "<tr class=highlight><td>geçen ay</td><td align=right><b>$entrygay</b></td></tr>";

 echo "<tr><td>þuku sayýsý</td><td align=right><b>$artioylar</b></td></tr>";

 echo "<tr class=highlight><td>çükü sayýsý</td><td align=right><b>$eksioylar</b></td></tr>";

 echo "<tr><td>entere oy sayýsý</td><td align=right><b>$enteresanoylar</b></td></tr>";

 echo "<tr class=highlight><td>karma</td><td align=right><b>$karma</b></td></tr>";

 echo "<tr><td>son görüldüðü zaman</td><td align=right><b>$zamana/$zamanb/$zamanc $saat</b></td></tr>";

 

 echo "</table>";

 echo "</div>";

 echo "<div class=infosec onclick=\"return sc('sb_2')\"><font size='1'>&nbsp;þukela entryler</font></div><div style=\"display:none\" id=\"sb_gn\"></div>";

 echo "<div class=infosec2 style=\"display:none\" id=\"sb_2\"><ol>";

  if ($no==0) {

   echo "<li>þu anda beðenilen entrysi yok.</li>";

  } else {

   while ($oku=mysql_fetch_array($sorgu2)) {

    $a=mysql_query("select * from mesajciklar where id='$oku[entry_id]'");

    $abul=@mysql_result($a,0,'sira');

    $s=mysql_query("select * from konucuklar where id='$abul'");

    $sno=@mysql_num_rows($s);

    if ($sno!=0) {

    $bul=@mysql_result($s,0,'baslik');

    echo "<li><a href='sozluk.php?process=eid&eid=$oku[entry_id]' target='main'>$bul/#$oku[entry_id]</a> ";

    if ($verified_kat=="admin" or $verified_kat=="modust") {



    }

    echo "</li>";

    }

   }

  }

 echo "</ol></div>";

 echo "<div class=infosec onclick=\"return sc('sb_3')\"><font size='1'>&nbsp;çükü entryler</font></div><div style=\"display:none\" id=\"sb_gn\"></div>";

 echo "<div class=infosec2 style=\"display:none\" id=\"sb_3\"><ol>";

  if ($no2==0) {

   echo "<li>þu anda berbat entrysi yok.</li>";

  } else {

   while ($oku2=mysql_fetch_array($sorgu3)) {

    $b=mysql_query("select * from mesajciklar where id='$oku2[entry_id]'");

    $bbul=@mysql_result($b,0,'sira');

    $k=mysql_query("select * from konucuklar where id='$bbul'");

    $kno=@mysql_num_rows($k);

    if ($kno!=0) {

    $bul2=@mysql_result($k,0,'baslik');

    echo "<li><a href='sozluk.php?process=eid&eid=$oku2[entry_id]' target='main'>$bul2/#$oku2[entry_id]</a> ";

    if ($verified_kat=="admin" or $verified_kat=="modust") {


    }

    echo "</li>";

    }

   }

  }

 echo "</ol></div>";

 echo "<div class=infosec onclick=\"return sc('sb_4')\"><font size='1'>&nbsp;enteresan entryler</font></div><div style=\"display:none\" id=\"sb_gn\"></div>";

 echo "<div class=infosec2 style=\"display:none\" id=\"sb_4\"><ol>";

  if ($no3==0) {

   echo "<li>þu ana kadar kimseyi enterese etmemis.</li>";

  } else {

   while ($oku2=mysql_fetch_array($sorgu4)) {

    $b=mysql_query("select * from mesajciklar where id='$oku2[entry_id]'");

    $bbul=@mysql_result($b,0,'sira');

    $k=mysql_query("select * from konucuklar where id='$bbul'");

    $kno=@mysql_num_rows($k);

    if ($kno!=0) {

    $bul2=@mysql_result($k,0,'baslik');

    echo "<li><a href='sozluk.php?process=eid&eid=$oku2[entry_id]' target='main'>$bul2/#$oku2[entry_id]</a> ";

    if ($verified_kat=="admin" or $verified_kat=="modust") {



    }

    echo "</li>";

    }

   }

  }

 echo "</ol></div>";

?>

<?

//

$ay=date("m");

$buguna=date("d");

if ($ay <=10) {

$e=substr($ay,1,1);

$q=$e-1;

$gecenay="0$q";

} else {

$gecenay=$ay-1;

}

$s2=mysql_query("select mesaj,yazar,id from mesajciklar where yazar='$_GET[kim]' and gun='$buguna' and ay='$ay'");

 echo "<div class=infosec onclick=\"return sc('sb_5')\"><font size='1'>&nbsp;bugün girdiði entryler</font></div><div style=\"display:none\" id=\"sb_gn\"></div>";

 echo "<div class=infosec2 style=\"display:none\" id=\"sb_5\"><ol>";

while ($o=mysql_fetch_array($s2)) {

 $yenimesaj=substr($o['mesaj'],0,150);

 echo "

 <li><a href='sozluk.php?process=eid&eid=$o[id]' target='main'>$yenimesaj</a></li>

 ";

 }

echo "

</ol></div>

";

$s3=mysql_query("select mesaj,yazar,id from mesajciklar where yazar='$_GET[kim]' and gun='$d' and ay='$ay'");

 echo "<div class=infosec onclick=\"return sc('sb_6')\"><font size='1'>&nbsp;dün girdiði entryler</font></div><div style=\"display:none\" id=\"sb_gn\"></div>";

 echo "<div class=infosec2 style=\"display:none\" id=\"sb_6\"><ol>";

while ($o2=mysql_fetch_array($s3)) {

 $yenimesaj2=substr($o2['mesaj'],0,150);

 echo "

 <li><a href='sozluk.php?process=eid&eid=$o2[id]' target='main'>$yenimesaj2</a></li>

 ";

 }

echo "

</ol></div>

";

//

?>

</td></tr>

</table>

<?

 } else {

 header("Location:sozluk.php?process=ben&kim=$verified_user");

}

} else {

echo "olmaz iþler bunlar";

}



mysql_close();

?>