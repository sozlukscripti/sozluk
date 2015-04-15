<?  if($mode=="ekle") { 
?>
<script language="JavaScript" type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<?
$p = @$_GET['p'];
$n = @$_GET['n'];
if(!$p) { $b = 0; }else {$b = $p*25; }
if(!$n) { $n = 25; }else {$n = $n; }
 
$i = 1;  
$sql = @mysql_query("SELECT * from `soru` order by durum, id DESC Limit $b,$n");
$sql2 = @mysql_query("SELECT * from `soru`");
?>
<br />
<table cellspacing="0" cellpadding="5" width="100%" align="center" border="0">
  <tbody>
    <tr>
      <td align="right" valign="top"><table width="100%"  border="0" align="center" cellpadding="2" cellspacing="1" class="yazi">
        <tr class="legend">
          <td width="86%"><strong>Soru</strong></td>
          <td width="12%"><strong>Soran</strong></td>
          <td width="2%" align="center"><strong>Sil</strong></td>
        </tr>
        <? if(mysql_num_rows($sql)==0) { ?>
        <tr align="center">
          <td colspan="5">Herhangi bir soru bulamadým&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <? }?>
        <? while($f=mysql_fetch_object($sql)){?>
        <tr onmouseover="this.bgColor='#eeeeee';" onmouseout="this.bgColor='#D5D5CB';">
          <td><a href="sozluk.php?process=adm&islem=ulemasayfa&mode=cvp&id=<?= $f -> id;?>" <? if($f -> durum!='e') { echo "style=\"color: #ff0000\""; }?>><?= $f -> soru;?></a></td>
          <td><a href="sozluk.php?process=adm&islem=ulemasayfa&amp;mode=cvp&amp;id=<?= $f -> id;?>" <? if($f -> durum!='e') { echo "style=\"color: #ff0000\""; }?>>
            <a href="javascript:od('sozluk.php?process=ben&kim=<?= $f -> soran?>','400','400')"><?= $f -> soran?></a>
          </a></td>
          <td align="center"><a href="sozluk.php?process=adm&islem=ulemasil&amp;a=kelime_sil&amp;id=<?= $f -> id;?>"><img src="<?=$sitename?>/images/silah.gif" width="12" height="13" border="0" alt="Bu kelimeyi sil!" onclick="return confirm('\'<?= $f -> soru;?>\'  silinecek ! Devam etmek istiyor musunuz ?')" /></a></td>
        </tr>
        <? } ?>
      </table>
          <? 
  if(mysql_num_rows($sql)>0) { ?>
          <form name="form1" class="form" id="form1" style="margin-top:5px; margin-right:2px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="yazi">
              <tr>
                <td width="52%" valign="top" style="padding-top:3px;">&nbsp;</td>
                <td width="48%" align="right" valign="top"><?
 $top = mysql_num_rows($sql2); echo "<span class=\"yazi\">Toplam Soru: $top &nbsp;&nbsp; Sayfa: </span>";
 echo '<select name="menu1" onChange="MM_jumpMenu(\'parent\',this,0)">';
 
function divs($int){
if(is_float($int/25)) { $roun = ceil($int/25); return $roun; }
else{ return $int/25;}
}

for ($s = 0; $s < divs($top,$n); $s++) {


if($p==$s) { 
echo @"<option value=\"sozluk.php?process=adm&islem=ulemasayfa&mode=ekle&p=$s\" selected>".($s+1)."</option>"; 
}
else
{
echo @"<option value=\"sozluk.php?process=adm&islem=ulemasayfa&mode=ekle&p=$s\">".($s+1)."</option>"; } }
echo "</select><br><br>";

 ?>
                </td>
              </tr>
            </table>
            <? }
?>
        </form></td>
    </tr>
  </tbody>
</table>
<? } ?>
<?  if($mode=="cvp") {  
$sql = mysql_query("Select * from soru where id = '$id'");
$f = mysql_fetch_array($sql);
?>
<form id="form2" name="form2" method="post" action="sozluk.php?process=adm&islem=ulemasil&a=kelime_ekle">
  <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="23%">Soru</td>
      <td width="77%"><?= $f['soru'];?>
      </td>
    </tr>
    <tr>
      <td>Cevap</td>
      <td><textarea name="cevap" cols="79" rows="15" id="cevap"><?= @$f['cevap'];?></textarea></td>
<br>
<input class="but" type="button" name="bkz" value="(bkz: )" onclick="hen('cevap','(bkz: ',')')" accesskey=x>
<input class="but" type="button" name="bkz" value="(gbkz: )" onclick="hen('cevap','(gbkz: ',')')" accesskey=c>
<input class="but" type="button" name="bkz" value="*" onclick="hen('cevap','(u: ',')')" accesskey=v>
<input class="but" type="button" name="bkz" value="-spo-" onclick="hen('cevap','--- (gbkz: spoiler) ---\n\n','\n\n--- (gbkz: spoiler) ---')" accesskey=s> 
<br>
<br>
<br>
    </tr>
    <tr>
      <td colspan="2" align="center" style="color:red; font-weight:bold;">&nbsp;<span id="hadi" style="display:none">hadii beeeeeeeee!! eklesene büssürü var daha!</span></td>
    </tr>
    <tr>
      <td><input name="id" type="hidden" id="id" value="<?=$f['id']?>" /></td>
      <td><input name="submit" type="submit" class="but" id="submit" value="evet böyle" onmouseout="this.className = 'but'" onmouseover="this.className = 'but'"/>
          <input name="Reset" type="reset" class="but" value="bi düþüneyim"  onmouseout="this.className = 'but'" onmouseover="this.className = 'but'"/>
      </td>
    </tr>
  </table>
</form>
<? }?>
