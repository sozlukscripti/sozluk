<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//TR" "http://www.w3c.org/TR/1999/REC-html401-19991224/frameset.dtd">
<META http-equiv=Content-Type content="text/html; charset=iso-8859-9">
<META content="MSHTML 6.00.2800.1106" name=GENERATOR>


<?php 
$soru = htmlspecialchars($_POST["soru"]);
$cevaplar = array("selam"=>"Sana da selam",
"sa"=>"As",
"naber"=>"Tesekkurler sen?",
"kim"=>"Tanımıyorum",
"seni seviyorum"=>"Bende seni asqiw",
"adın ne"=>"Sözlük Robotu",
"nerde yaşıyorsun"=>"Anka Sözlükte",
"şifre"=>"ananzaa xd",
"anan"=>"ananzaa xd",
"nasılsın"=>"iyiyim sen ?",
"benimle"=>"malesef babanla evliyim.",
"lan"=>"ne var be.",
"napıyorsun"=>"sözlüğü kontrol ediyorum sen ?.",
"nap"=>"sözlüğü kontrol ediyorum sen ?.",
"hey"=>"heey.",
"iyi"=>"hım pekii.",
"peki"=>"konuşmuyacak mısın ?.",
"seni sikerim"=>"sen önce elini sikmeyi öğren",
"sikerim"=>"sen önce elini sikmeyi öğren",
"siki"=>"yatağama bekliyorum yakışıklı",
"vajina"=>"güneşi görmek ister misin delikanlı",
"meme"=>"bende var görmek ister misin",
"göt"=>"ister misin ?",
"evet"=>"karı istiyosan önce anneni elden geçir",
"porno"=>"ben varken izlememelisin",
"siktir"=>"Terbiyesiz",
"mal"=>"Sensin o",
"amcık"=>"annen'de var",
"orospu çocuğu"=>"biz kardeşiz",
"beni sik"=>"domalmanı bekliyorum",
"renvacy"=>"yaratıcım",
"seviyorum"=>"kimi ?",
"seni"=>"ayy bende seni asqiw",
"lise"=>"kendinle karıştırdın.",
"sus"=>"siktir git",
);
$anlamadim = array("Anlayamadım?","Afedersin?","Uff snne be slk .s.s","Bilmiyorum ki","Zekice şeyler sor bence hıh !");

foreach($cevaplar as $sorunun=>$cevap) {
        if(eregi($sorunun,$soru)) {
        die($cevap);
        }
}

echo $anlamadim[rand(0,count($anlamadim))];

?>