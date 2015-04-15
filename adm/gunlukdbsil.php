<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA AÇIK VAR ORAYA DA BAK!";
die;
}
?>

<?

$sql = mysql_query("Delete from gunluk"); 

if ($sql) {
	echo "eyvallah sildim yaladim yuttum";

}
else {
	echo "bir sey oldu anlayamadim, silemedim, yapamadim";
}
?>
