<fieldset><legend>kisisel ileti</legend>

<form action="sozluk.php?process=iletiekle" method="post">
<input type="text" name="ileti">
<input class="but" type="submit" value="gonder">

</form>
<br>
<?php $sorgu=mysql_query("select ileti from user where nick='$nick'");
 $ileti=@mysql_result($sorgu,0,'ileti'); 
 @mysql_close();
 echo"evladým $nick<br>";
 echo "kullandýðýn Ýleti: '$ileti'";?>
<br><small>
<i>i. ileti 30 karakterden uzun olmamalý</i><br>
<i>ii.siyasi vb. içerikli iletiler koymayýn.</i><br>
<i>ya da bunlara uymayýn iletiniz silinsin</i></small>
</fieldset>
<div class='copyright' align='right'>© <? include "config.php";  echo $sitename;?> </div>