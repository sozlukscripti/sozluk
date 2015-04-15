<?php
if($file_name !="")
{
copy ("$file", "./images/$file_name")
         or die("dosya yuklenemedi lan");
}
else { die("No file specified"); }
?>

<html>
<body><h3>dehset sekilde yuklendi...</h3>
<ul>
<li>tema adi: <?php echo "$file_name"; ?>
<li>boyutu:  <?php echo "$file_size"; ?> bytes
<li>dosya tipi: <?php echo "$file_type"; ?>
</ul>
</body></html>