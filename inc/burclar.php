<?php

// burç fonksiyonu burc(tarih);
function burc($date) {
$tarih = split ('[/]', $date);
$gun=$tarih[0];
$ay=$tarih[1];
// Koç Burcu (21 Mart - 19 Nisan)
       if ($ay==3 and $gun>=21) return"koc";
  else if ($ay==4 and $gun<=19) return"koc";

//Bo?a Burcu (20 Nisan - 20 Mayys)
  else if ($ay==4 and $gun>=20) return"boga";
  else if ($ay==5 and $gun<=20) return"boga";

//Ykizler Burcu (21 Mayys - 21 Haziran)
  else if ($ay==5 and $gun>=21) return"ikizler";
  else if ($ay==6 and $gun<=21) return"ikizler";

//Yengeç Burcu (22 Haziran - 22 Temmuz)
  else if ($ay==6 and $gun>=22) return"yengec";
  else if ($ay==7 and $gun<=22) return"yengec";

//Aslan Burcu (23 Temmuz - 22 A?ustos)
  else if ($ay==7 and $gun>=23) return"aslan";
  else if ($ay==8 and $gun<=22) return"aslan";

//Ba?ak Burcu (23 A?ustos - 22 Eylül)
  else if ($ay==8 and $gun>=22) return"basak";
  else if ($ay==9 and $gun<=23) return"basak";

//Terazi Burcu (23 Eylül - 22 Ekim)
  else if ($ay==9 and $gun>=23) return"terazi";
  else if ($ay==10 and $gun<=22) return"terazi";

//Akrep Burcu (23 Ekim - 21 Kasym)
  else if ($ay==10 and $gun>=23) return"akrep";
  else if ($ay==11 and $gun<=21) return"akrep";

//Yay Burcu (22 Kasym - 21 Aralyk)
  else if ($ay==11 and $gun>=22) return"yay";
  else if ($ay==12 and $gun<=21) return"yay";

//O?lak Burcu (22 Aralyk - 19 Ocak)
  else if ($ay==12 and $gun>=22) return"oglak";
  else if ($ay==1 and $gun<=19) return"oglak";

//Kova Burcu (20 Ocak - 18 ?ubat)
  else if ($ay==1 and $gun>=20) return"kova";
  else if ($ay==2 and $gun<=18) return"kova";

//Balyk Burcu (19 ?ubat - 20 Mart)
  else if ($ay==2 and $gun>=19) return"balik";
  else if ($ay==3 and $gun<=20) return"balik";
  else return"uzayli";
}
//sayym i?lemi
$toplam=0;
$koc=0;
$boga=0;
$ikizler=0;
$yengec=0;
$aslan=0;
$basak=0;
$terazi=0;
$akrep=0;
$yay=0;
$oglak=0;
$kova=0;
$balik=0;
//sorgulama i?lemi
$sorgu = "SELECT dt FROM user";
$sorgulama = @mysql_query($sorgu);
while ($kayit=@mysql_fetch_array($sorgulama)){
        $toplam++;
        if(burc($kayit["dt"])=="koc") $koc++;
        else if(burc($kayit["dt"])=="boga") $boga++;
        else if(burc($kayit["dt"])=="ikizler") $ikizler++;
        else if(burc($kayit["dt"])=="yengec") $yengec++;
        else if(burc($kayit["dt"])=="aslan") $aslan++;
        else if(burc($kayit["dt"])=="basak") $basak++;
        else if(burc($kayit["dt"])=="terazi") $terazi++;
        else if(burc($kayit["dt"])=="akrep") $akrep++;
        else if(burc($kayit["dt"])=="yay") $yay++;
        else if(burc($kayit["dt"])=="oglak") $oglak++;
        else if(burc($kayit["dt"])=="kova") $kova++;
        else if(burc($kayit["dt"])=="balik") $balik++;
      }

echo "<table border='0'>"
     ."<tr><td>"
     ."koç burcu - $koc kiþi"
     ."</td></tr><tr><td>"
     ."boga burcu - $boga kiþi"
     ."</td></tr><tr><td>"
     ."ikizler burcu - $ikizler kiþi"
     ."</td></tr><tr><td>"
     ."yengeç burcu - $yengec kiþi"
     ."</td></tr><tr><td>"
     ."aslan burcu - $aslan kiþi"
     ."</td></tr><tr><td>"
     ."basak burcu - $basak kiþi"
     ."</td></tr><tr><td>"
     ."terazi burcu - $terazi kiþi"
     ."</td></tr><tr><td>"
     ."akrep burcu - $akrep kiþi"
     ."</td></tr><tr><td>"
     ."yay burcu - $yay kiþi"
     ."</td></tr><tr><td>"
     ."oglak burcu - $oglak kiþi"
     ."</td></tr><tr><td>"
     ."kova burcu - $kova kiþi"
     ."</td></tr><tr><td>"
     ."balik burcu - $balik kiþi"
     ."</td></tr><tr><td>"
     ."</td></tr></table>";

?> 