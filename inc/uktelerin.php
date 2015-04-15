<fieldset><legend>uktelerin</legend> 
<?
//senin uktelerin

// kullanicilar

echo"cahil kaldýðýn konular<br>";
$sorgu = "SELECT baslik,id FROM ukde  where yazar ='$verified_user'";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
while ($kayit=@mysql_fetch_array($sorgulama)){

/////////
$baslik=$kayit["baslik"];
$id=$kayit['id'];


echo "
<table>
   <tr>
      <td>
         <a href='sozluk.php?process=word&q=$baslik'>$baslik</a>
      </td>
   </tr>
</table>


";
}
}

?>
</fieldset>