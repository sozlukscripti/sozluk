<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
<style type="text/css">
.kutu {
        background:#eee;
        border: 1px solid #ddd;
        padding:10px;
        margin-bottom:10px;
                height:500px;
                weight:200px;
}
#sorular {
        height:440px;
        padding:10px;
        overflow:scroll;
        overflow-x:hidden;
}
</style>
<script type="text/javascript">
function sor() {
var soru = $("#konus :input").val();
if(soru != '') {
$.post("bot.php",$('#konus').serialize(), function(gelen) { 
$("#sorular").append("ben:"+soru+" <br />sözlük robotu:"+gelen+" <br />");
}); 
}else{
 alert("Birþeyler yazmayý deneyebilirsiniz?");  
}
return false; }</script>
<div class="kutu">sözlük robotuyla sýcak dakikalar !
<div id="sorular">biþeyler yazmaný bekliyorum aþqim;<br /></div>
<form id="konus" name="form1" method="post" action="javascript:void(0);">
    <label>
        <input name="soru" type="text" id="soru" value="" size="30" />
         </label>
        <label>
            <input type="submit" name="button" id="button" value="yolla asqüm" onclick="sor()"/>
        </label>
</form></div>
