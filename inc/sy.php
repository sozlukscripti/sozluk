<div class="div1">
<table width="80%" border="0">
  <form action="" method="POST">
    <tr>
      <td>Yorum:</td>
      <td><p>
        <textarea cols="30" rows="6" name="yorum"></textarea>
        <br />
      yorumu yollayýnca yolladýðýný belli etmesse bil ki yolladý.</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="yorumyap" value="evet yorumum bu!"></td>
      </tr>
  </form>
</table>
<?
} else {

$yorum = htmlspecialchars(strip_tags($_POST['yorum']));


$sorgu=mysql_query("select * from mesajciklar where id='$_GET[id]'");
$yazar=@mysql_result($sorgu,0,'yazar');
$ekle=mysql_query("insert into yorum values('','$yazar','$verified_user','$yorum','$_GET[id]')");
$no=@mysql_num_rows($ekle);
?>
</div>

