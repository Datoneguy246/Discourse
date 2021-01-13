var Room = null;
var msgBox = document.getElementById('msgBox');
setInterval(retrieveRoom, 250);

// Find what room the client is connected to
function findCurrentRoom()
{
    var hidden = document.getElementById('rmID');
    return hidden.innerHTML;
}

// Read/return contents of a file
function readFile(filePath) {
    var result = null;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", filePath, false);
    xmlhttp.send();
    if (xmlhttp.status==200) {
      result = xmlhttp.responseText;
    }
    return result;
  }

// Refresh room
function retrieveRoom()
{
    // Are we connected to a room?
    if(Room == null)
    {
        Room = findCurrentRoom();
    }

    // Get data
    var rawData = readFile(Room);

    // Clear box
    msgBox.innerHTML = "";

    // Process data
    var messages = rawData.split('\n');
    for(var i = 0; i < messages.length; i++)
    {
        var msgData = messages[i].split(';');

        var msgHeader = document.createTextNode('[' + msgData[0] + '] ' + msgData[1] + ': ');
        var boldNode = document.createElement('strong');
        boldNode.appendChild(msgHeader);

        var msg = document.createTextNode(msgData[2]);
        var pNode = document.createElement('p');
        pNode.appendChild(boldNode);
        pNode.appendChild(msg);

        msgBox.appendChild(pNode);
    }
}