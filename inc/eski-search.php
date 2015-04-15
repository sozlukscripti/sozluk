<?php
/*
$link = explode("{basla}",$mesaj);
$link = ereg_replace("{bitir}", "", $link[1]);
echo "Yakaladým: $link";
*/
if ($q) {
$q = ereg_replace("%u0131","i",$q);
$q = ereg_replace("%u011F","g",$q);
$q = ereg_replace("%u015F","s",$q);
/*$q = ereg_replace("þ","s",$q);
$q = ereg_replace("Þ","S",$q);
$q = ereg_replace("ç","c",$q);
$q = ereg_replace("Ç","C",$q);
$q = ereg_replace("ý","i",$q);
$q = ereg_replace("Ý","I",$q);
$q = ereg_replace("ð","g",$q);
$q = ereg_replace("Ð","G",$q);
$q = ereg_replace("ö","o",$q);
$q = ereg_replace("Ö","O",$q);
$q = ereg_replace("ü","u",$q);
$q = ereg_replace("Ü","U",$q);
$q = ereg_replace("Ö","O",$q);*/

    
$string=$q;
if (!$q) {
echo "<div class=dash><center><b><img src=images/unlem.gif> Müneccim miyim ben ?";
die;
}
    echo "<font class=link><i>'$q'</i> <br> <small>ile alakali basliklar..</small></font><br><br>";
    if ($sirala == 1)
    $SQL="SELECT baslik,id FROM konular WHERE baslik like '%$string%' and statu='' ORDER By tarih desc";
    else if ($sirala == 2)
    $SQL="SELECT baslik,id FROM konular WHERE baslik like '%$string%' and statu='' ORDER By baslik";
    else
    $SQL="SELECT baslik,id FROM konular WHERE baslik like '%$string%' and statu=''";
    }

    baglan();
    $sorgu=mysql_query($SQL) ;
    if (!$sorgu)
        {
            echo "<div class=dash><a href='sozluk.php?process=word&q=oha+falan+oldum'>oha falan oldum</a>";  exit();
        }
        $arguman=0;
        $adet=0;
        while($sira=mysql_fetch_array($sorgu))
            {
                $sonuc[$arguman]=$sira["id"];
                $arguman++;

            }
        if($string{0}!='"')
        {
        $pieces=explode(" ",$string);
            for($i=0;$i<(count($pieces)-1);$i++)
            {
            if ($adi) {
            $SQL="SELECT baslik FROM konular WHERE baslik like '%$pieces[$i]%' and statu=''";
            }
            $sorgu=mysql_query($SQL) ;
                if (!$sorgu)
                {  echo("<P>Hata Olustu2:  " . mysql_error() . "</P>");  exit();}
                $i=0;
                echo count("Sonuclar :$sonuc");
                while($sira=mysql_fetch_array($sorgu))
                {
                while($i<(count($sonuc)-1))
                  {
                   if($sira["id"]!=$sonuc[$i])
                  $sonuc[$arguman]=$sira["id"];
                  $arguman++;
                  $i++;
                  }
                }
            }
        }
        echo "<div class=div1>";
        for($i=0;$i<count($sonuc);$i++)
        {
        $SQL="SELECT * FROM konular WHERE id='$sonuc[$i]' and statu=''";
        $sorgu=mysql_query($SQL) ;
        while($sira=mysql_fetch_array($sorgu))
        {
        $baslik = $sira["baslik"];
        echo "<a href=\"sozluk.php?process=word&q=$baslik\" target='main'><font size=2><img src=images/ara.gif alt=\"$baslik\">&nbsp;$baslik</font></a><br>";
        }
        }
        $SQL="SELECT id FROM konular WHERE baslik='$q' and statu=''";
        $sorgu=mysql_query($SQL);
        if (!mysql_num_rows($sorgu)){
        echo "</div>";
        echo "<br><center><font class=link><font color=Red><i>'$q'</i></font><font class=link> diye bir baslik yok ki ?";
if ($verified_durum == "on")
echo "
<form action=\"sozluk.php?process=add\" target=\"main\" method=post>
<input type=hidden target=main name=\"baslik\" value=\"$q\">
<input type=hidden target=main name=\"okword\" value=\"$q\">
<input type=hidden target=main name=okmsj value=ok>
<input type=submit target=main class=but name=ac value=\"E madem yok ben açayým\"></form><br><br>

<form action=\"sozluk.php?process=ukdever\" target=\"main\"method=post> 
<input type=hidden name=\"baslik\" value=\"$q\"> 
<input type=hidden name=\"okword\" value=\"$q\"> 
<input type=hidden name=okmsj value=ok> 
<input type=submit class=but name=ac value=\"ukde vereyim birileri doldursun\"> 
</form>
</center>
";
        }
        ?>