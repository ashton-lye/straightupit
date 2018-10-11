var idNumber;
var reset = document.getElementById('sessionTable').innerHTML;//copy of blank table

document.getElementById("mentorInteractions").onload = start2();//initialise start() method onload

function start2() {
    getSessions2();
}

function getSessions2 () {
    var url ="php/loadSessions.php";
    ajaxRequest("POST", url, true, "", populateInteractionsTable);
}

//Populate HTML session table with appropriate details from db for interactions page
function populateInteractionsTable(response){       
    var table = document.getElementById("sessions");    
    console.log(response)
    var sessionData = JSON.parse(response);
    console.log(sessionData);
        
    //insert data from array into html table
    for (var i=0; i<sessionData.length; i++)
    {
        var row = table.insertRow();
        row.id="R"+i;
        var cell = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        cell.id = 'c'+[i];
        cell.innerHTML = sessionData[i].sessionID;
        cell.style.cursor = "pointer";
        cell1.innerHTML = sessionData[i].name;
        cell2.innerHTML = sessionData[i].problem;
        cell3.innerHTML = sessionData[i].notes;                      
    }

    var elements= document.getElementsByTagName('td');
    for(var i=0; i<elements.length;i++)
    {
        elements[i].addEventListener("click", function(){
        console.log(this.innerHTML)
        idNumber = this.innerHTML;
        console.log(idNumber);
        getSessionId();        
        });
    }    
}
// method to take selected session id number from table and select from database 
function getSessionId () {
    var url = "php/selectSessionbyId.php";
    var data = "sessions="+idNumber; 
    ajaxRequest("POST", url, true, data, displayNotes)
}

function displayNotes(response) {
    var sIdTitle = document.getElementById('sessionID_title');
    var notes = document.getElementById('notes');
    notes.innerHTML = response;
    sIdTitle.innerText = "Selected SessionID:    "+idNumber;
    console.log(response);
}

function updateSessionNotes (){
    var notes = document.getElementById('notes');
    var updateNotes = notes.value;
    console.log('TEST'+idNumber);
    var url ="php/updateIS.php";
    var data = "notes="+updateNotes+"&sessionID="+idNumber;
    ajaxRequest("POST", url, true, data, updateCheck);
    console.log(updateNotes);
}
function updateCheck(response) {
    if (response == "Session Notes updated Successfully!") {
        alert('Success');
        document.getElementById('sessionTable').innerHTML = reset;   
        document.getElementById('notes').value = "Update Complete"; 
        location = location;
    } else {
        alert(response);
    }
}