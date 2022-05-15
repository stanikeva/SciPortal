import("account.php")


    function showContent(a,b,c)
    {
        var x = document.getElementById(a);
        var y = document.getElementById(b);
        var z = document.getElementById(c);
        if (x.style.display == "none")
        {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        }
        else
        {
            x.style.display = "none";
        }
    }

    function hideModal(a)
    {
        var giannisatetokoubo = document.getElementById(a);
        giannisatetokoubo.style.display = "none";
    }

    function navbarContent(p,x)
    {
            var pavlos = document.getElementById(p);
            var xaikalhs = document.getElementById(x);

            pavlos.style.display = "none";
            xaikalhs.style.display = "block";
    }

    function hideSearchBar()
    {
        var charts = document.getElementsByClassName('search');
        if(charts.length) {
            for(var i=0; i<charts.length; i++) {
                    charts[i].style.display = 'none';
            }
        }
    }