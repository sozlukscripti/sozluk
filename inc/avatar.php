<title><? echo $sitename;?> - Avatar Ayarcýk</title>
<fieldset><legend>Þeklini Belirt</legend>
<?php $sorgu=mysql_query("select * from user where nick='$nick'");
 $avatar=@mysql_result($sorgu,0,'avatar'); 
 $nick=@mysql_result($sorgu,0,'nick');
 $cinsiyet=@mysql_result($sorgu,0,'cinsiyet');
 
 @mysql_close();
 echo "<center>";
 if (empty($avatar)) {
  if ($cinsiyet =="m"){
  echo"<img src=\"images/avatar/erkek.jpg\" alt=\"$nick - $sitename yazarý\" width=\"$avataryukseklik\"/>";
  }
  if ($cinsiyet =="f"){
  echo"<img src=\"images/avatar/kadin.jpg\" alt=\"$nick - $sitename yazarý\" width=\"$avataryukseklik\"/>";
  }
  if ($cinsiyet =="mf"){
  echo"<img src=\"images/avatar/adamkadin.jpg\" alt=\"$nick - $sitename yazarý\" width=\"$avataryukseklik\"/>";
  }
  if ($cinsiyet =="fm"){
  echo"<img src=\"images/avatar/kadinadam.jpg\" alt=\"$nick - $sitename yazarý\" width=\"$avataryukseklik\"/>";
  }
  echo "<br>";
  }
  else {
  echo"<img src=\"$avatar\" alt=\"$nick - $sitename yazarý\" width=\"$avataryukseklik\"/>";
  echo "<br>"; 
  } 
   echo "</center>";
 echo"evladým $nick;<br><br>";
 echo "Gördüðün avatarý deðiþtirmek mi istiyorsun? Seçim senin..<br><font color=\"red\">Kýrmýzý</font> hapý seçersen url girmek zorundasýn..<br><font color=\"blue\">Mavi</font> hapý seçersen bilgisayarýndan resim seçersin..<br>Hangi hapý yutacaksýn genç? Kararýný ver.. Yada gözüm görmesin seni..";
 ?>

<br><br><fieldset><legend>Kýrmýzý Hap</legend>

<form name="url" action="sozluk.php?process=avatarekle" method="post">
url: <input type="text" name="avatar">
<input class="but" name="url" type="submit" value="evet evet resmim bu adreste eminim">

</form>
</fieldset>

<br><fieldset><legend>Mavi Hap</legend>

<form name="yukle" enctype="multipart/form-data" method="post" action="sozluk.php?process=avatarekle">
 rsm: <input name="avatar" type="file" id="avatar">
  <input class="but" name="yukle" type="submit" id="submit" value="vallaha seçtim. yükle gitsin"> 

</form>
</fieldset>
<br><fieldset><legend>Siyah Hap</legend>

<form name="sil" enctype="multipart/form-data" method="post" action="sozluk.php?process=avatarekle">
Eðer bu butona týklarsan vallaha avatarýný sileriz...<br>
  <center><input class="but" name="sil" type="submit" id="submit" value="avatar silen buton"> </center>
</form>
</fieldset>
  <br>
</fieldset>
<div class='copyright' align='right'>(c) <? include "config.php";  echo $sitename;?> </div>