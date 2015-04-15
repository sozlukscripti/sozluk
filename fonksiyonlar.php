<?
function degistir($mesaj) {
$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?t=\\1\"><b>\\1</b></a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?t=\\1\"><b>\\1</b></a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?t=\\1\" title=\"\\1\"><b>*</b></a>",$mesaj);
$yenimesaj=$mesaj;
return $yenimesaj;
}
?>
<form action="" method="POST">
<textarea cols="50" rows="10" name="msj"></textarea><br>
<input type="submit" value="gönder">
</form>
<?
if ($_POST) {
echo degistir($_POST['msj']);
}
?>
