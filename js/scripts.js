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




function navbarSwitcher(p,x,c)
{
    var pavlos;
    var xaikalhs;
    if (!c.localeCompare("true"))
    {
        pavlos = document.getElementById(p);
        xaikalhs = document.getElementById(x);

        pavlos.style.display = "none";
        xaikalhs.style.display = "block";
    }
    else if (!c.localeCompare("false"))
    {
        pavlos = document.getElementById(p);
        xaikalhs = document.getElementById(x);

        pavlos.style.display = "";
        xaikalhs.style.display = "none";
    }
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



function logout()
{
    localStorage.setItem("navbarHidden", "false");
}



function emailShowWarning(a,b)
{
    var el = document.getElementById(a);
    if (b)
        el.style.display = "";
    else
        el.style.display = "none";

}










/*function hideModal(a)
{
    var giannisatetokoubo = document.getElementById(a);
    giannisatetokoubo.style.display = "none";
}



function navbarLoggedIn(p,x,c)
{

    if (!c.localeCompare("success"))
    {

        var pavlos = document.getElementById(p);
        var xaikalhs = document.getElementById(x);

        pavlos.style.display = "none";
        xaikalhs.style.display = "block";
        return true;
    }
    return false;


}
 */