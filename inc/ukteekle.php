<?
//

//
$m = $_POST['baslik'];
$k = $_POST['tarih'];
$t = $_POST['yazar'];
//
$m = ereg_replace("<","",$m);
$m = ereg_replace(">","",$m);
$e = ereg_replace(">","",$e);
$k = ereg_replace(">","",$k);
$t = ereg_replace(">","",$t);
$t = ereg_replace("<","",$t);
//     
$s = "INSERT into ukte";
$s.= "(ukteadi,tarih,yazar)";
$s.= "VALUES";
$s.= "('$m','$k','$t')";
mysql_query ($s);

if ($s) {
    
    echo "ukte eklendi";
}

else {
    
    echo "trajedik bir hata olustu. ukte kaydedilemedi.";
}

?> 