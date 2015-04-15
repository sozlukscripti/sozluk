<?php


$banner_resim = $_POST['banner_resim'];
if ($kaydet == 1)
{
        if ($_FILES['banner_resim']['type'] != "image/gif" &&
            $_FILES['banner_resim']['type'] != "image/jpeg" &&
            $_FILES['banner_resim']['type'] != "image/jpg" &&
            $_FILES['banner_resim']['type'] != "image/png")
        {
            echo "Dosya formatýnýz yanlýþ";
        }  else {
            if($_FILES['banner_resim']['type'] == "image/gif") $uzanti=".gif";
            else if($_FILES['banner_resim']['type'] == "image/jpeg") $uzanti=".jpeg";
            else if($_FILES['banner_resim']['type'] == "image/jpg") $uzanti=".jpg";
            else if($_FILES['banner_resim']['type'] == "image/png") $uzanti=".png";
            if ($_FILES['resim']['size'] < 1024000) {
$ekle = mysql_query("insert into banner values('', '" . $banner_resim . "')");

            $banner_id=mysql_insert_id();
             print mysql_error();
                   $banner_resim=$banner_id.$uzanti;
                   $resim_url1 = "banner/".$banner_resim;
                  if (move_uploaded_file($_FILES['banner_resim']['tmp_name'], $resim_url1)) {
                           echo "Dosya Kayit Edildi.\n";
                           $yaz=mysql_query("UPDATE banner SET banner_resim='$resim_url1' WHERE banner_id=$banner_id");
                  }
                  else echo "dosya kayit edilemedi";
            }  else {  
                $boyut = $_FILES['banner_resim']['size'];
                $dosyamb = ($boyut / 1024) / 1024; // kb için bir 1024 ü sil
                $mb = substr($dosyamb,0,4);
                $hata1 = "Maks. dosya boyutu 1 MB. Sizin dosyanýz:  ".$mb." MB";
            }
        }           

}
else
{
	
}
?>