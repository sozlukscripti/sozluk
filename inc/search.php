<?php
/*
$link = explode("{basla}",$mesaj);
$link = ereg_replace("{bitir}", "", $link[1]);
echo "Yakaladým: $link";
*/

$sirala = $_POST["sirala"];
$dc1 = $_POST["dc1"];
$dc2 = $_POST["dc2"];
$dc3 = $_POST["dc3"];
$dc4 = $_POST["dc4"];
$dc5 = $_POST["dc5"];
$dc6 = $_POST["dc6"];
if ($dc1)
echo"$dc1/$dc2/$dc3 tarihinden $dc1/$dc2/$dc3 tarihine";
if ($yazar)
Header ("Location: sozluk.php?process=yazar&yazar=$yazar");
else {
if ($q==NULL) {
header("Location:sozluk.php?process=search&q=anka+sözlük");
die();
}
}

if ($q) {
if ($q[0]==" ") {
echo ". <a href='sozluk.php?process=word&q=$sitename' target='main'>$sitename burada sýkýntý var</a>";
die();
}
if ($q[0]=="<") {
echo ". <a href='sozluk.php?process=word&q=$sitename' target='main'>$sitename burada sýkýntý var</a>";
die();
}
$q = ereg_replace("%u0131","ý",$q);
$q = ereg_replace("%u0130","Ý",$q);
$q = ereg_replace("%u011F","ð",$q);
$q = ereg_replace("%u011E","Ð",$q);
$q = ereg_replace("%u015F","þ",$q);
$q = ereg_replace("%u015E","Þ",$q);

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
$q = ereg_replace("-","",$q);
$q = ereg_replace("?","",$q);
$q = ereg_replace("#","",$q);
$q = ereg_replace("Ö","O",$q);*/

    $string=mysql_real_escape_string($q);
    echo "<div align=center><font class=link>$q ile alakali basliklar..";
    if (!$_GET['sayfa']) {
    $deger=0;
    } else {
    $deger=$_GET['sayfa'];
    }
    if ($sirala == 1)
    $SQL="SELECT baslik,id, MATCH (baslik) AGAINST ('$string*' in boolean mode) as ayi FROM konucuklar WHERE MATCH (baslik) AGAINST ('$string*' in boolean mode) and statu='' ORDER By tarih asc limit $deger,50";
    else if ($sirala == 2)
    $SQL="SELECT baslik,id, MATCH (baslik) AGAINST ('$string*' in boolean mode) as ayi FROM konucuklar WHERE MATCH (baslik) AGAINST ('$string*' in boolean mode) and statu='' ORDER By baslik asc limit $deger,50";
    else
    $SQL="SELECT baslik,id, MATCH (baslik) AGAINST ('$string*' in boolean mode) as ayi FROM konucuklar WHERE MATCH (baslik) AGAINST ('$string*' in boolean mode) and statu='' order by id desc limit $deger,50";
    }
    $sorgu=mysql_query($SQL) ;
    echo "<br>sayfa <select name='sayfa' class=pagis onchange=\"jm('self',this,0);\">";
    $toplam=mysql_num_rows(mysql_query("SELECT baslik,id, MATCH (baslik) AGAINST ('$string*' in boolean mode) as ayi FROM konucuklar WHERE MATCH (baslik) AGAINST ('$string*' in boolean mode)"));
    $y=$toplam/50;
    $yy=ceil($y);
	$yy=$yy-1;
    for ($sayac=1; $sayac<=$yy; $sayac++) {
    $ysayac=$sayac*50;
    if ($sayfa==$ysayac) {
    echo "<option value='?process=search&q=$q&sayfa=$ysayac' selected>$sayac</option>";
    } else {
    echo "<option value='?process=search&q=$q&sayfa=$ysayac'>$sayac</option>";
    }
    }
    echo "</select></font></div><table border='0' cellpadding='0' cellspacing='0'>";
        while ($oku=mysql_fetch_array($sorgu)) {
        echo "<tr><td>.</td><td><a href='sozluk.php?process=word&q=$oku[baslik]' target='main'>$oku[baslik]</a></td></tr>";
        }
        $SQL="SELECT id FROM konucuklar WHERE baslik='".mysql_real_escape_string($q)."' and statu=''";
        $sorgu=mysql_query($SQL);
        if (mysql_num_rows($sorgu)>0){
        echo "</table></div>";
		echo "<br><div align=center>sayfa <select name='sayfa' class=pagis onchange=\"jm('self',this,0);\">";	
		    for ($sayac=1; $sayac<=$yy; $sayac++) {
		    $ysayac=$sayac*50;
		    if ($sayfa==$ysayac) {
		    echo "<option value='?process=search&q=$q&sayfa=$ysayac' selected>$sayac</option>";
		    } else {
		    echo "<option value='?process=search&q=$q&sayfa=$ysayac'>$sayac</option>";
		    }
		    }
		echo "</div>";
		} else {
        echo "<center><font class=link><font color=Red>$q</font><font class=link> diye birþey bulamadým?";

        }
        ?>