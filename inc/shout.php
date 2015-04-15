<?
include "config.php";
$table = "shoutbox";  ##  Database Table
$logo = "images/sorunsal.gif";  ## Logo File

?>



 <center><img src=<? echo $logo ?> >
<form method="POST"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT TYPE="HIDDEN" NAME="sub" VALUE="1">
<table><tr><td>
<b>Name:</b></td><td><INPUT TYPE='TEXT' value='' NAME='name' SIZE=30 maxlength='100'></td></tr>
<tr><td><b>Message:</b></td><td><INPUT TYPE='TEXT' value='' NAME='message' SIZE=30 maxlength='100'></td></tr>
<tr><td colspan=2 align=center><input type="submit" name="submit" value="submit"><hr color=blue></td></tr></table>
</form>

<?php
if (!$connection = mysql_connect($host,$user,$password))
  {
    $message = mysql_error();
    echo "$message<br>";
    die();
  }

$db = mysql_select_db($name,$connection)
      or die ("Couldn't select database");
if (array_key_exists('sub', $_POST)) {
$name =$_POST['name'];
$message =$_POST['message'];
$time=date("h:ia d/j/y");
$name1 =strip_tags($name);
$message1 =strip_tags($message);
$name =addcslashes($name1,'\'')."";
$message =addcslashes($message1,'\'')."";


if ($name != '' && $message != ''){

mysql_query("INSERT INTO shoutbox
(id, name, message, time) VALUES('NULL', '$name', '$message', '$time' ) ")
or die(mysql_error());
} else {
echo "birseyler yazman gerekli";
}
}

// DISPLAYING the entries

//returning the last 10 messages
$result = mysql_query("select * from shoutbox order by id desc limit 10");
echo "<table width=50%>";
//the while loop
while($r=mysql_fetch_array($result))
{
   //getting each variable from the table
   $time=$r["time"];
   $id=$r["id"];
   $message=$r["message"];
   $name=$r["name"];
 $message = str_replace("fuck","f***",$message);
$message = str_replace("bitch","b****",$message);
$message = str_replace("asshole","a**h***",$message);
$message = str_replace("cunt","c***",$message);
$message = str_replace("bullshit","b***s***",$message);
$message = str_replace("shit","s***",$message);

$name = str_replace("fuck","f***",$name);
$name = str_replace("bitch","b****",$name);
$name = str_replace("asshole","a**h***",$name);
$name = str_replace("cunt","c***",$name);
$name = str_replace("bullshit","b***s***",$name);
$name = str_replace("shit","s***",$name);
?>
 <tr><td><b>Date:</b> <? echo $time ?></td>
   <td><b>Name:</b> <? echo $name ?></td></tr>
   <tr><td colspan=2><b>Message:</b> <? echo $message ?><hr color=blue></td></tr>
<? }
?>
</table>
<br>
&copy copyright <a href=<?=$site?> target=_blank><?=$sitename?></a>