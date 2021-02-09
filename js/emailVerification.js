var code;
window.onload = function Send()
{
    // Find the data and swiftly remove it
    var userDataNode = document.getElementById('rmId');
    var userData = userDataNode.innerHTML.split(';');
    userDataNode.remove();
    code = userData[1];
    var message = "The code is: " + code;

    // Call email sender
    var xmlhttp = new XMLHttpRequest();
    var phpUrl = "./backend_php/sendEmail.php?to=" + userData[0] + "&subject=Sign-up to Discourse!" + "&msg=" + message;
    xmlhttp.open("GET", phpUrl, true);
    xmlhttp.send();
}

function Check()
{
    var codeGiven = document.getElementById('code').value;
    if(codeGiven.toString() == code)
    {
        window.location.href = "./room.php";
    }
}