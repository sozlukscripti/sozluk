<script>
function loaded()
{
    window.setTimeout(CloseMe, 200);
}

function CloseMe() 
{
    window.close();
}
</script>
</head>
<body onLoad="loaded()">

<?
if ($id) {
###########################
$sorgu1 = "SELECT yazar FROM mesajciklar WHERE `id` = '$id'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$yazar=$kayit2["yazar"];

if ($verified_user == $yazar) {
echo "<div class=dash><center><b><img src=images/unlem.gif> Kendi entry'ina oy veremezsin canem..";
die;
}

if (!$verified_user)
die;

if (!$yazar)
die;

#################################

$listele = mysql_query("SELECT entry_id FROM oylar WHERE `entry_id` = $id and `nick` = '$verified_user'");
$say = mysql_num_rows($listele);
if ($say) {
echo "<div class=dash><center><b><img src=images/unlem.gif> Bu entry'a zaten oy vermiþsiniz.";
die;
}
################################
else {
$sorgu = "INSERT INTO oylar ";
$sorgu .= "(entry_id,nick,entry_sahibi,oy)";
$sorgu .= " VALUES ";
$sorgu .= "('$id','$verified_user','$yazar','0')";
mysql_query($sorgu);
echo "<div class=dash><center><b><img src=images/unlem.gif> (-) Oyunuz eklendi.<br><input type='button' value='rahatladim' onclick='window.close();' class=but> ";
}
###############################

} //id
?></body>