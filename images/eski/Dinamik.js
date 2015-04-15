/*Powered by Rifat EROGLU :) */
function kullaniciadikontrol()
{

document.getElementById('sonuc').innerHTML='<img src="images/loading.gif" /></br>Kontrol Ediliyor...'
	xmlHttp=ajax(); 
	if (xmlHttp==null) 
	{
		alert ('Tarayiciniz Ajax Desteklemiyor!');
		return;
	}
	


   var nick = document.getElementById('nick').value; 

    var url='images/uyeadikontrol.php'; 
    var sc ='nick='+nick; /*Paremetre gönderiyoruz Kullandigimiz method POST*/
    xmlHttp.open('POST', url, true); 
    xmlHttp.setRequestHeader('If-Modified-Since', 'Sat, 1 Jan 2000 00:00:00 GMT');
    xmlHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=iso-8859-9');

    xmlHttp.setRequestHeader('Content-length', sc.length);
    xmlHttp.setRequestHeader('Connection', 'close');
    xmlHttp.onreadystatechange=KullaniciVarMi;
    xmlHttp.send(sc);
   
}

function KullaniciVarMi()
{
    if (xmlHttp.readyState==4)
    {
        document.getElementById('sonuc').innerHTML=xmlHttp.responseText;
    }
}








function ajax()
{
	var xmlHttp=null;
	try
	{
	
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
		
		try
		{
			xmlHttp=new ActiveXObject('Msxml2.XMLHTTP');
		}
		catch (e)
		{
			xmlHttp=new ActiveXObject('Microsoft.XMLHTTP');
		}
	}
	return xmlHttp;
}




















