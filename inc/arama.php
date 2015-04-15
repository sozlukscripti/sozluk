<script type="text/javascript">
function sch(s) { var o = document.getElementById("cf");o.checked=(o.disabled=(s=="r"))?true:o.checked; }
function vi(s,v) { var o = document.getElementById(s); if(o) o.style.visibility=v?"visible":"hidden"; }
</script>
<div id="a" class="adiv" style="top:44px"><form target="main" action="sozluk.php?process=dsearch" id=sr method="post">
<table border="0" cellpadding="0" cellspacing="0" style="width:200px">
<tr><td class="aup"> </td>
<td id="amain" rowspan="3" class="amain">
<input type="hidden" name="a" value="sr" />
<table class="msg" border="0" cellpadding="0" cellspacing="0">
<tr><td>sey</td><td>
  <input type="text" id="kw" name="q" size="19" maxlength="100" /></td></tr>
<tr><td>yazarý</td><td>
  <input type="text" name="yazar" size="19" maxlength="50" value="" /></td></tr>
</table>
<fieldset><legend>sýra sekli</legend>
<table class="msg"><tr>
<td style="white-space:nowrap">
<input id="ra" type="radio" class="radio" name="sirala" value="1" checked='' onclick="sch('a')" />
<label accesskey="a" for="ra"><u>a</u>lfa-beta</label></td>
<td style="white-space:nowrap">
<input id="rr" type="radio" class="radio" name="sirala" value="2"  onclick="sch('r')" />
<label accesskey="r" for="rr"><u>r</u><script type="text/javascript">
<!--
for(var n=1;n < 7;n++)document.write(String.fromCharCode(Math.round(Math.random()*25)+97));
-->
</script></label></td></tr>
<tr>
<td style="white-space:nowrap">
<input id="ry" type="radio" class="radio" name="sirala" value="0"  onclick="sch('y')" />
<label accesskey="y" for="ry"><u>y</u>eni-eski</label></td>
<td style="white-space:nowrap">
<input id="rg" type="radio" class="radio" name="sirala" value="1"  onclick="sch('g')" />
<label accesskey="u" for="rg">g<u>u</u>dik</label></td>
</tr></table>
</fieldset>
<fieldset style="white-space:nowrap;text-align:center"><legend>tarih aralýðý</legend>
surdan<br />
<select name="dc1"><option value="" /><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select>
<select name="dc2"><option value="" /><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option></select>
<select name="dc3"><option value="" /><option>2009</option><option>2008</option></select>
<br />suraya<br />
<select name="dc1"><option value="" /><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select>
<select name="dc2"><option value="" /><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option></select>
<select name="dc3"><option value="" /><option>2009</option><option>2008</option></select>
</fieldset>
<fieldset><legend>ývýr zývýr</legend>
<input id="cf" accesskey="h" type="checkbox" class="checkbox" name="sirala" value="1" /> 
<label for="cf"><u>h</u>ýzlý yaþa genç öl</label><br />
<input id="cr" accesskey="g" type="checkbox" class="checkbox" name="sirala" value="0" checked /> 
<label for="cr"><u>g</u>üzelinden olsun</label>

</fieldset><br />
<div style="text-align:center">
<input type="submit" class="but" value="hayvanlar gibi ara" name="Submit" /></div>
</td></tr>
<tr><td class="amid" onmouseup="pp()">i n s a n  a r a</td></tr>
<tr><td class="abot"> </td></tr>
</table></form></div> 