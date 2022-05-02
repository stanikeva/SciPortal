import("account.html")


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

