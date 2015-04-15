// JavaScript Document
//Yazan; Ufuk YAYLA: http://www.ufukyayla.com
//Tesekkürler; Ferruh MAVITUNA: http://ferruh.matvituna.com
//Ferruh MAVITUNA'nin SoulTips'inden esinlenerek yapilmistir.
//Ancak SoulTips'in bir sürümü degildir. Kusurlari bana aittir.

var tips_x = 0;
var tips_y = 0;

function tips_konum_bul(e){
	if ( !e ) { e = window.event };
	
	if ( e ) {
		if ( e.pageX || e.pageY ) {
			tips_x = e.pageX;
			tips_y = e.pageY;
		}
		else if ( e.clientX || e.clientY ) {
			tips_x = e.clientX + document.body.scrollLeft;
			tips_y = e.clientY + document.body.scrollTop;
		}
	}
	
	if ( tips_x < 0 ) { tips_x = 0 };
	if ( tips_y < 0 ) { tips_y = 0 };
}

function tips_konum(e){
	tips_konum_bul(e);
	
	if ( !e ) { e = window.event };
	
	var nesne;
	
	if ( e.target!= null ) { nesne = e.target }
	else { nesne = e.srcElement }
	
	var metin = tips_metni(nesne);
	var metin_div = document.getElementById("tips_div");
	
	if (metin == "-") {
		metin_div.style.display = 'none';
		}
	else {
		metin = metin.replace(/\[/g, "<");
		metin = metin.replace(/\]/g, ">");
		
		metin_div.style.left = tips_x + 10 + "px";
		metin_div.style.top = tips_y - 10 + "px";
		
		metin_div.innerHTML = metin;
		metin_div.style.display = 'block';
	}
}

function tips_metni(n){
	var i = 0;
	var metin = "-";
	var ozellikler = n.attributes;
	
	for ( i = 0; i < ozellikler.length; i++ ) {
		if ( ozellikler[i].name == "tips" ) {
			metin = ozellikler[i].value;
			break;
		}
	}
	
	return metin;
}

document.write("<div id='tips_div' name='tips_div' style='");
	document.write("position: absolute;");
	document.write("display: none;");
	document.write("z-index: 255;");
	
	document.write("padding: 5px;");
	document.write("top: 0px;");
	document.write("left: 0px;");
	
	//Yazi rengi
	document.write("color: #000000;");
	document.write("font-size: 9px;");

	
	//Zemin rengi
	document.write("background-color: #F86D71;");
	
	//Kenarlik
	document.write("border: 1px solid #000000;");
	
	//Seffaflik orani, az deger daha seffaf.
	var seffaflik = "70";
	
	document.write("filter: alpha(opacity:" + seffaflik + ");");
	document.write("-khtml-opacity: 0." + seffaflik + ";");
	document.write("-moz-opacity: 0." + seffaflik + ";");
	document.write("-o-opacity: 0." + seffaflik + ";");
	document.write("opacity: 0." + seffaflik + ";");
	
document.write("'>&nbsp;</div>");

document.onmousemove = tips_konum;