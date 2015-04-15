<?php
$sorgu = "SELECT baslik,id,yazar FROM ukde  where yazar ='$verified_user'";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){

while ($kayit=@mysql_fetch_array($sorgulama)){
}
}
$baslik=$kayit['baslik'];
$id=$kayit['id'];
$yazar=$kayit['yazar'];

$sql= "DELETE baslik from ukte where yazar,id ='$id','$yazar'";
@mysql_query($sql);

if($sql) {
	echo "istegin yerine getirildi";
} else {
	echo "yapamadim bir gariplik oldu";
}
?>