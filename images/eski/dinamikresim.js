function popUp(URL) {

pencere = window.open(URL,"test","width=400,height=300,left = 440,top = 312");
}



function gosterresmi(sielandedik){
if(sielandedik=="")
{document.getElementById("rifat").innerHTML='<img src="anbean_resimler/avatar-yok.gif" class="glossy" width="150" height="150" /><br>Lütfen bir avatar seçiniz...';
}
else {
document.getElementById("rifat").innerHTML='<img src="'+sielandedik+'" class="glossy" width="150" height="150" /><br>Avatarýnýz';
}
}