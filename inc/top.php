<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
<META content=noarchive,nosnippet name=robots>
<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<SCRIPT src="images/top.js" type=text/javascript></SCRIPT>
<LINK href="favicon.ico" rel="shortcut Icon"><LINK href="favicon.ico" rel=icon>

<link rel="stylesheet" type="text/css" href="images/<?$tema?>.css" />
<title></title>
</head>
<body class="bgtop">
<table cellspacing="0" cellpadding="0" border="0" style="margin:0;padding:0">

	<tr>
    <TD width="220" noWrap onClick="top.main.location.href='sozluk.php?process=staff'">
    <? //136
    if ($verified_user) {
    $csr=mysql_query("select * from user where nick='$verified_user'");
        $tbul=@mysql_result($csr,0,'tema');
    if (empty($tbul)) {
    } else {
    echo "";
    }
    } else {
	    }
    ?>    </TD>

   <td width="655">
   <table cellpadding="0" cellspacing="1" class="nav">
<tr>

<td onMouseDown="md(this)" onMouseUp="bn(this)" onMouseOver="ov(this)" onMouseOut="bn(this)" class="but" onClick="top.main.location.href='sozluk.php?process=rand'"><a  title="ortayi donat dayi" target="main" href="sozluk.php?process=rand2"> rastgele </a></td>


<td onMouseDown="md(this)" onMouseUp="bn(this)" onMouseOver="ov(this)" onMouseOut="bn(this)" class="but""><a target="left" href="sozluk.php?process=mix"> karışık </a></td>
<?
if (!$verified_user) {
	echo "<td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\"><a target=\"main\" href=\"sozluk.php?process=iletisim   \">iletişim</a></td>";}?> 
<?
if ($verified_user) {
echo "<td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\"><a target=\"left\" href=\"sozluk.php?process=birgun\">bir gün</a></td>";}?>
<td onMouseDown="md(this)" onMouseUp="bn(this)" onMouseOver="ov(this)" onMouseOut="bn(this)" class="but" colspan="1"><a target="main" href="anka sözlük kuralları.html"> asl? </a></td>
<td onMouseDown="md(this)" onMouseUp="bn(this)" onMouseOver="ov(this)" onMouseOut="bn(this)" class="but" colspan="1"><a target="main" href="sozluk.php?process=stat"> istatistik </a></td>
 
 <?
if ($verified_user) {
echo "<td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\" onclick=\"javascript:od('sozluk.php?process=ben',350,450)\">ben</td>

<td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\" onclick=\"top.main.location.href='sozluk.php?process=ayarlarim'\"><a  title=\"levazimatlar\" target=\"main\" href=\"sozluk.php?process=ayarlarim\">ayarlarım</a></td>



";}
else {
echo " <td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\" onclick=\"top.main.location.href='sozluk.php?process=master&login=yescanem'\"><a  title=\"üye girişi\" target=\"main\" href=\"sozluk.php?process=master&login=yescanem\">üye girişi</a></td>

<td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\" onclick=\"top.main.location.href='sozluk.php?process=reg'\"><a  title=\"kayıt ol\" target=\"main\" href=\"sozluk.php?process=reg\">kayıt ol</a></td>";}
?><?
if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust") { echo"
<td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\" onclick=\"top.main.location.href='sozluk.php?process=adm'\"><a  title=\"mod arena\" target=\"main\" href=\"sozluk.php?process=adm\">mod/şik/area</a></td>";}
?>
<? if ($verified_kat == "gammaz") {
echo "<td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\"><a target=\"main\" href=\"sozluk.php?process=adm&islem=ispit\">gammaz staff</a></td>";}?>
<?
if ($verified_user) {
echo " <td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\" onclick=\"location.href='logout.php'\"><a  title=\"terk et\" target=\"top\" href=\"logout.php\">çıkış</a></td>";

/*echo "<td onmousedown=\"md(this) \" onmouseup=\"bn(this) \" onmouseover=\"ov(this) \" onmouseout=\"bn(this) \" class=\"but\"><a href=\"javascript:od('sozluk.php?process=onlinee',400,400)\">kimler var</a></td>";*/
}?>


</TR>
<tr>

<td onMouseDown="md(this)" onMouseUp="bn(this)" onMouseOver="ov(this)" onMouseOut="bn(this)" class="but" ><a target="left" href="sozluk.php?process=today"> bugün </a></td>

<td onMouseDown="md(this)" onMouseUp="bn(this)" onMouseOver="ov(this)" onMouseOut="bn(this)" class="but" ><a target="left" href="sozluk.php?process=yesterday"> dün </a></td>






<td onmousedown="md(this) " onmouseup="bn(this) " onmouseover="ov(this) " onmouseout="bn(this) " class="but"><a target="left" href="sozluk.php?process=popi ">poppi</a></td>

<td onmousedown="md(this) " onmouseup="bn(this) " onmouseover="ov(this) " onmouseout="bn(this) " class="but"><a target="left" href="sozluk.php?process=ukde ">ukte</a></td>


<td onmousedown="md(this) " onmouseup="bn(this) " onmouseover="ov(this) " onmouseout="bn(this) " class="but" onclick="top.main.location.href='sozluk.php?process=sukela'"><a  title="şuku" target="main" href="sozluk.php?process=sukela">$ukela</a></td>


<td colspan="3" style="margin:0;padding:0">
<table border="0" cellspacing="0" cellpadding="0">

<tr>

<td style="height:10px;white-space:nowrap;padding:1px;font-size:x-small">
<form action="sozluk.php?process=word" id="fg" method="post" target="main">
      <u>b</u>a$lık 
      <input class="input" style="height:12px" accesskey="a" id="q" name="q" size="30" />
</form></td>

<td onMouseDown="md(this)" onMouseUp="bn(this)" onMouseOver="ov(this)" onMouseOut="bn(this)" class="but" onClick="top.main.location.href='sozluk.php?process=word&q='+escape(document.getElementById('q').value);"><a href="javascript:document.getElementById('q').submit()"> getir </a></td>
<td onMouseDown="md(this)" onMouseUp="bn(this)" onMouseOver="ov(this)" onMouseOut="bn(this)" class="but" onClick="top.main.javascript:ara();return false"><a  title="böyle birşey" href="javascript:ara()"> ara </a></td>
<td onMouseDown="md(this)" onMouseUp="bn(this)" onMouseOver="ov(this)" onMouseOut="bn(this)" class="but" onClick="top.main.location.href='sozluk.php?process=eid&eid='+escape(document.getElementById('q').value);"><a href="javascript:document.getElementById('q').submit()"> #id </td>

</tr></table></td></tr></table></td>
</tr></table></body></