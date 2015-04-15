// Author: math

function popup( sname,kalinlik,yukseklik,isim ) {

        window.open(sname,isim,"toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,width=" + kalinlik+ ",height=" + yukseklik+"resizeable=0");

}

function at(sel)
{
        frames['stmain'].location.href = sel;
}

function dis(f)
{
        if(document.getElementById)
        {
                var obj = document.getElementById(f);
                obj.disabled = true;

        }
        else if (document.all)
        {
                var obj = document.all(f);
                obj.disabled = true;
        }
}

function kontrol()

{

        var hata = '';

        var dd = document.getElementById;

        var i = dd('e').value;

        var j = dd('f').value;

        var ads = dd('a').value;

        var email = dd('b').value;

        var kadi = dd('d').value;

        var il = dd('il').value;



        if(i != j)

        {

                hata = 'Sifreler birbirini tutmuyor. Kontrol edip, tekrar deneyin';

                alert(hata);

        }



                if((i == '') || (j == '') || (ads == '') || (email == '') || (kadi == '') || (il == ''))

        {

                hata = 'Asagidaki hucreler bos birakilamaz : \n - Sifre \n - Adi Soyad \n - E-Mail \n - Kullanici Adi \n - Sehir ';

                alert(hata);

        }



        document.hedeValue = (hata == '');

}



function jm(targ,selObj,restore){ //v3.0

  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}



function jump(selObj,restore){

var url = selObj.options[selObj.selectedIndex].value;

if (url) {

remote = window.open(url, 'other');

if (remote != null) {

if (remote.opener == null)

remote.opener = self;

}

}

if (restore) selObj.selectedIndex=0;

}



function changeStyle(tagName,styleName)

{

                tagName.className = styleName;

}



function goUrl(url,frm)

{

                open(url,frm);

}





function bkzver(a)

{

    if(document.selection)

    {

            var sel = document.selection.createRange();

        if(sel.parentElement() == document.getElementById("aciklama"))

        {

           var b = a;

            sel.text = "("+b+": "+sel.text+")";

            sel.select();

        return false;

        }

    }

    else

    {

        var nedir="";

        var b="";

        if(a == 'url') b = 'adresi';

        else b = 'kelimeyi';

        nedir = prompt(a+" verilecek "+b+" giriniz","");

        if(nedir != "" && nedir != null)

        {

                document.getElementById("aciklama").value += "("+a+": "+nedir+")";

                document.getElementById("aciklama").focus();

                return false;

        }

        else return false;

    }

}



function sec(){

for (var i=0;i<document.mesajform.elements.length;i++)

{

        var e=document.mesajform.elements[i];

        if ((e.name != 'allbox') && (e.type=='checkbox'))

        {

                if (e.checked != true)

                {

                        e.checked = true;

                }

                else

                {

                        e.checked = false;

                }

        }

}

}



var dlara=null;

var dara=null;



function brcont(){

        if (document.getElementById)

        {

                dlara = document.getElementById("lara");

                dara = document.getElementById("ara");

        }

        else if (document.all)
        {

                dlara = document.all("lara");

                dara = document.all("ara");
        }

else if (document.layers){

        dlara = document.layers["lara"];

        dara = document.layers["ara"];

}

}



function goster(){

        brcont();

        dlara.style.visibility = 'visible';

        dara.style.visibility = 'hidden';

}



function gizle(){

        brcont();

        dlara.style.visibility = 'hidden';

        dara.style.visibility = 'visible';

}

function h(obj,drm)
{
                if(drm == "goster")
                        document.getElementById(obj).style.visibility = 'visible';
                else
                        document.getElementById(obj).style.visibility = 'hidden';
}

function gG(obj) {
        if (document.getElementById(obj).style.display == 'block')

                document.getElementById(obj).style.display = 'none';

        else

                document.getElementById(obj).style.display = 'block';

}