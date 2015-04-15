<?php

include "../config.php";

// Veri Tabanimiza baglandik Simdi POST ile gelen username in veri tabanýnýn user tablosunda olup olmadigina bakiyoruz
// Once POST ile gelen username trimleyip tmizleyelim....

	
	$nick=trim($_POST["nick"]); 
    $sorgu = mysql_query("SELECT * FROM user WHERE nick='$nick'"); 
    if ( mysql_num_rows($sorgu) >= 1 ) 
    { 
    echo "Uzgunum Bu kullanici adi sistemde mevcut.. özenti olma kendin ol..<br>";
    }
    
	else 
	{
	echo "Kullanilabilir orjinal bir nickin varmýþ demekki.. ;) <br>";
	}
// Yukarida yazdigim Response mesajlar daha suslenebilir Gerisi sana kalmis....
//Örenðin Tick yada Çarpý iþareti koyabilirsin küçük resim olarak...



?>