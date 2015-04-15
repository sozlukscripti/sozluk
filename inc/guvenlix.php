<?
include "config.php";
if(!function_exists('stripos')) {//stripos fonk varmý yok mu diye bakýyoruz
  function stripos_clone($haystack, $needle, $offset=0) {
    return strpos(strtoupper($haystack), strtoupper($needle), $offset);//yoksa strips_clone u tanýmladýk
  }
} else {
  function stripos_clone($haystack, $needle, $offset=0) {
    return stripos($haystack, $needle, $offset=0);
  }
}
if(isset($_SERVER['QUERY_STRING'])) {//isset ile bir sorgu gelmiþ mi dedik geldiyse iþimize devam ediyoruz
$queryString = strtolower($_SERVER['QUERY_STRING']);//sürekli uzun yazýyý yazmamak için az kýsalttýk
    if (stripos_clone($queryString,'%select%20') OR stripos_clone($queryString,'%20union%20') OR stripos_clone($queryString,'union/*') OR stripos_clone($queryString,'c2nyaxb0') OR stripos_clone($queryString,'+union+') OR stripos_clone($queryString,'http://') OR stripos_clone($queryString,'https://') OR (stripos_clone($queryString,'cmd=') AND !stripos_clone($queryString,'&cmd')) OR (stripos_clone($queryString,'exec') AND !stripos_clone($queryString,'execu')) OR stripos_clone($queryString,'union') OR stripos_clone($queryString,'concat') OR stripos_clone($queryString,'ftp://')) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $sayfa = $queryString;
        $time = time();
$sql = "INSERT INTO ban VALUES (NULL,'$ip','$sayfa', '$time')";
$query = mysql_query($sql); 
      die('
	  
<title>UYARI!</title>
<style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
}
body {
	background-color: #000000;
	background-image: url('.$site.'/images/kurukafa.jpg);
	background-repeat: no-repeat;
}
.style1 {
	font-family: TAHOMA;
	font-weight: bold;
}
.style2 {color: #FF0000}
-->
</style>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<fieldset>
<legend class="style2">olmaz iþler pesindesin!</legend>
<div align="center" class="style1">
  <p>UYARI!</p>
  <p>kod : 31</p>
  <p>yapilan islem : '.$queryString.'  </p>
  <p>ip adresiniz : '.$ip.'</p>
  <p>not : </p>
  <p><a href="javascript:history.back()"><span class="style2"><b>Affet abi, Geri Dön Bari</b></span> </a></p>
</div>
</fieldset>



	  
	  
	  ');//die mesajý
    unset($queryString);// deðiþkeni bellekten kaldýr
exit;//aþaðýsýndaki tüm kodlarýn çalýþmasýný die iptal etti ama yinede iþimizi garantiye alýp exit; yaptýk
}
  }
?>