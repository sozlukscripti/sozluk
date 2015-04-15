<?
if ($q) {

if (ereg("^([A-Za-z0-9]|[[:space:]])+$",$q)) {
echo "$q if tamam";
}
else {
echo "$q else oldu";
}

}
?>

<form method=post ACTION=>
<input type=text name=q>
<input type=submit value=test>

</form>