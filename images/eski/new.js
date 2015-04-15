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

