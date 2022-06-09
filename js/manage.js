$(document).ready(function() {
    if (window.location.href.indexOf("manage") > -1) 
    {
        checkChoice();

        const site = document.getElementById("website");
        site.addEventListener("change", checkChoice);
        const task = document.getElementById("task");
        task.addEventListener("change", checkChoice);

        const go = document.getElementById("manageGo");
        go.addEventListener("click", function()
        {
            window.location.href = PickedOption + ".php";
        });
    }

    if (window.location.href.indexOf("upload") > -1) 
    {
        console.log('upload');
    }

    if (window.location.href.indexOf("delete") > -1) 
    {
        console.log('delete');
    }
});

var PickedWebsite = 'dummy_website';
var PickedOption = 'upload_image';

function checkChoice()
{
    var e = document.getElementById("task");
    PickedWebsite = e.value;
    var e = document.getElementById("task");
    PickedOption = e.value;
};

