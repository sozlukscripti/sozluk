<? 
$a = $_GET['a'];
$id = $_GET['id'];
if($id) { 
if(!is_numeric($id) ) { header("Location: index.php"); die(); }
}
if(!$a) { header("Location: index.php"); die(); }

if($a=="kelime_sil") {

$sql = mysql_query("Select * from soru where id = '$id'");
if(mysql_num_rows($sql)==0) { header("Location: sozluk.php?process=adm&islem=ulemaa&mode=sil&h=2"); die(); }


mysql_query("Delete from soru where id = '$id'");
header("Location: sozluk.php?process=adm&islem=ulemaa&mode=sil&ekle=ok"); die();


}
elseif($a=="kelime_ekle") {

$cevap = $_POST['cevap'];
$id = $_POST['id'];

mysql_query("Update soru set cevap = '$cevap', durum = 'e' where id = '$id'");

header("Location: sozluk.php?process=adm&islem=ulemaa&ekle=ok"); die();

}
else {

header("Location: index.php?"); die();

}

header("Location: index.php?"); die();
?>