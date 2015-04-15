<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?

$sql = mysql_query("Delete from privmsg"); 

if ($sql) {
	echo "tamami silindi";

}
else {
	echo "bir sey oldu anlayamadim, silemedim, yapamadim";
}


?>
