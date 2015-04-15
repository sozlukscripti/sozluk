</fieldset><legend><b><font size="2" color="#B7310B">anka sözlük kullanýcý giriþi </font></b></legend>
<?
session_start();
if ($verified_user) {
header ("Location: sozluk.php?process=rand2");
}
else if (!$login) {

$sorgu1 = "SELECT hit FROM ayar";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$hit=$kayit2["hit"];
$hit++;
$sorgu = "UPDATE ayar SET hit='$hit'";
mysql_query($sorgu);

header ("Location: sozluk.php?process=rand2");
}
else {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<script type="text/javascript">
  function ede(o)
  {
    if(o.selectedIndex > 0)
       document.getElementById("p").value += o.options[o.selectedIndex].text;
      o.selectedIndex = 0;
  }
  </script>

<meta name="keywords" content="<? echo "uzaktan kumanda - $sitename - $description"; ?>">
<meta name="description" content="<? echo "uzaktan kumanda - $sitename - $description"; ?>">
<title><? echo "Uzaktan kumanda - $sitename - $description"; ?></title></head>
</head><body onLoad="document.getElementById('n').focus()">
  
  <div style="text-align:center">
  <div class="loginbox" style="text-align:left">
  <form action="checklogin.php" method="post">
  <input type="hidden" name="ref" value="http://" />
<table width="300" border="0"><br>
    <tr><td style="white-space:nowrap">üye adý:</td>
    <td style="white-space:nowrap;text-align:right"><a target="main" href="sozluk.php?process=reg1">yeni üyelik</a>
    </td>
    </tr>
    <tr><td colspan="2">
      <input type="text" name="gnick" id="n" tabindex="1" class="lin" maxlength="40" size="20" /></td></tr>
    <tr><td>þifre:</td><td style="white-space:nowrap" align="right"><a href="#" onClick="od('sozluk.php?process=forgetpass')">þifremi unuttum</a></td></tr>
    <tr><td style="white-space:nowrap" colspan="2">
      <input tabindex="2" type="password" name="gsifre" id="p" class="lin" maxlength="50" size="20" /></td></tr>
    <tr><td colspan="2">
    <table cellpadding="0" cellspacing="0">
      <tr><td><input tabindex="4" type="checkbox" id="re" name="re" value="y" /></td>
      <td><label id="lre" for="re">þifremi hatýrla.</label></td></tr>
      <tr>
      </tr>
      <tr><td>
        <input tabindex="4" type="checkbox"
         onclick="with(document.getElementById('hede').style){var b=display=='none';display=b?'inline':'none'}with(document.getElementById('re')){checked=false;disabled=b;}document.getElementById('lre').disabled=b" 
         id="bibi" value="ON" /></td>
      <td>
      <label for="bibi">sanal klavye</label>
      <div id="hede" style="display:none;white-space:nowrap">
      sanal tuþ:
         <select id="ba" onChange="ede(this)" tabindex="10">
         <option></option><option>a</option><option>b</option><option>c</option><option>d</option><option>e</option><option>f</option><option>g</option><option>h</option><option>i</option><option>j</option><option>k</option><option>l</option><option>m</option><option>n</option><option>o</option><option>p</option><option>q</option><option>r</option><option>s</option><option>t</option><option>u</option><option>v</option><option>w</option><option>x</option><option>y</option><option>z</option>
          </select>
          <select id="bn" onChange="ede(this)" tabindex="11">
          <option></option><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option>
          </select>
          <select id="bc" onChange="ede(this)" tabindex="12">
            <option></option><option>!</option><option>"</option><option>#</option><option>$</option><option>%</option><option>&amp;</option><option>'</option><option>(</option><option>)</option><option>*</option><option>+</option><option>,</option><option>-</option><option>.</option><option>/</option><option>:</option><option>;</option><option><</option><option>=</option><option>></option><option>?</option><option>@</option><option>[</option><option>\</option><option>]</option><option>^</option><option>_</option>
          </select>
         </div>
      </td></tr>

    </table></td></tr>
    <tr><td colspan="2" style="white=space:nowrap;text-align:center">
      <input tabindex="6" type="submit" id="b" class="gonder" value="login" style="float: right" />
    </td></tr>
  </table>
  </form>
</div></div>
</body>
</html> 
<? } ?>
</fieldset>