<br>
<br>
<fieldset><legend>Kiþisel Ýletini Gir</legend>
<form action="sozluk.php?process=iletiekle" method="post">
<input type="text" name="ileti">
<input class="but" type="submit" value="gonder">

</form>
<br>
<?php $sorgu=mysql_query("select ileti from user where nick='nick'");
 $ileti=@mysql_result($sorgu,0,'ileti');
 echo "Kullandýðýnýz Ýleti: '$ileti'";?>
<br><small>
<i>i. Ýleti 30 karakterden uzun olmamalý</i><br>
<i>ii.Siyasi vb. içerikli iletiler koymayýn.</i><br>
<i>Ya da bunlara uymayýn iletiniz silinsin</i></small>
</fieldset>