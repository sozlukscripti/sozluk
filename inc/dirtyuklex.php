<?php
if($file_name !="")
{
copy ("$file", "images/$file_name")
         or die("feci sekilde yuklendi");
}
else { die("oldu bi seyler ben de anlamadim"); }
?>
<html>
<body><h3>dehset sekilde yuklendi...</h3>
<ul>
<li>tema adi: <?php echo "$file_name"; ?>
<li>boyutu:  <?php echo "$file_size"; ?> bytes
<li>dosya tipi: <?php echo "$file_type"; ?>
</ul>
</body></html>


