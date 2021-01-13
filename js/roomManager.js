var Room = null;
var msgBox = document.getElementById('msgBox');
var initialized = false;
var refreshLoop = setInterval(retrieveRoom, 250);

// Special characters that need to be substituted in the server
var subCharacters = [
    [";", "(semi)"],
    ["&", "(amp)"]
];

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
    if(rawData == null)
    {
        // Error
        var errorMsg = document.createTextNode("Could not connect to room");
        var errorNode = document.createElement('p');
        errorNode.appendChild(errorMsg);
        msgBox.appendChild(errorNode);
        clearInterval(refreshLoop);
        return;
    }

    // Clear box
    msgBox.innerHTML = "";

    // Process data
    var messages = rawData.split('\n');
    for(var i = 0; i < messages.length; i++)
    {
        var msgData = messages[i].split(';');
        // Replace subsitution characters
        (subCharacters).forEach(character => {
            msgData[2] = msgData[2].replace(character[1], character[0]);
        });

        var msgHeader = document.createTextNode('[' + msgData[0] + '] ' + msgData[1] + ': ');
        var boldNode = document.createElement('strong');
        boldNode.appendChild(msgHeader);

        var msg = document.createTextNode(msgData[2]);
        var pNode = document.createElement('p');
        pNode.appendChild(boldNode);
        pNode.appendChild(msg);

        msgBox.appendChild(pNode);
    }

    if(initialized == false)
    {
        initialized = true;
        msgBox.scrollTop = msgBox.scrollHeight;
    }
}

function sendMessage()
{
    // Get input from field
    var inputField = document.getElementById('msg');
    var toSend = inputField.value;

    // Replace subsitution characters
    (subCharacters).forEach(character => {
        toSend = toSend.replace(character[0], character[1]);
    });
    
    // Are we in a room?
    if(Room == null)
    {
        Room = findCurrentRoom();
    }

    // Call php script
    var xmlhttp = new XMLHttpRequest();
    var phpUrl = "addToRoom.php?rm=" + Room + "&q=" + toSend;
    console.log("sending: " + toSend+ " to: " + phpUrl);
    xmlhttp.open("GET", phpUrl, true);
    xmlhttp.send();
}