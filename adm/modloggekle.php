<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?
//

//
$k = $_POST['moderat'];
$e = $_POST['olay'];
$m = $_POST['mesaj'];
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$tarih = "$gun/$ay/$yil";

//
$m = ereg_replace("<","",$m);
$m = ereg_replace(">","",$m);
$e = ereg_replace(">","",$e);
$k = ereg_replace(">","",$k);
//  

$s = "INSERT into history";
$s.= "(olay,mesaj,moderat,tarih,gun,ay,yil,saat)";
$s.= "VALUES";
$s.= "('$e','$m','$k','$tarih','$gun','$ay','$yil','$saat')";
mysql_query ($s);

if ($s) {
    
    echo "modlog u kullandin <input type='button' value='sifonu cek' onclick='window.close();' class=but> ";
}

else {
    
    echo "trajedik bir hata olustu. görüsünüz kaydedilemedi.";
}

?> 