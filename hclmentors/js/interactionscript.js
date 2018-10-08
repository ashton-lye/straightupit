
//declare client detail vars
var selectedDate;
var selectedDay;
var selectedLibrary;
var selectedTime;
var clientName;
var clientNumber;
var clientProblem;

//function to make ajax request for library names
function loadLibraries() {
    var url = "php/loadLibraries.php";
    ajaxRequest("POST", url, true, "", populateList);
}

//displaying libraries as drop down options
function populateList(response) {
    console.log(response);
    var libraries = JSON.parse(response);
    var librarySelect = document.getElementById("librarySelect");
    var currentLibrary;

    for (var i = 0; i < libraries.length; i++) {
        currentLibrary = libraries[i].library;
        librarySelect.innerHTML += "<option value="+currentLibrary+">"+currentLibrary+" library</option>";
    }
}

//Get session information from db using ajaxrequest, call populateTable function
function getSessions () {
    var url ="php/loadSessions.php";
    ajaxRequest("POST", url, true, "", populateTable);
}

//Populate HTML session table with appropriate details from db
function populateTable(response){    
    var table = document.getElementById("sessions");    
    console.log(response)
    var sessionData = JSON.parse(response);
    console.log(sessionData)
    var columns = ['time','name','mentor','problem'];

    //insert data from array into html table
    for (var i=0; i<sessionData.length; i++)
    {
        var row = table.insertRow(-1);
        for(var j=0;j <columns.length; j++) {
                var cell = row.insertCell();
                var cell1 = row.insertCell();
                var cell2 = row.insertCell();
                var cell3 = row.insertCell();
                cell.className = columns[j];
                cell.innerHTML = sessionData[i].time;
                cell1.innerHTML = sessionData[i].name;
                cell2.innerHTML = sessionData[i].mentor;
                cell3.innerHTML = sessionData[i].problem;
            }
    }
}

function updateSessionTable () {
    selectedLibrary = document.getElementById("librarySelect").value;
    var data = "library="+selectedLibrary;
    var url = "php/updateSessions.php"
    ajaxRequest("POST", url, true, data, populateTable);
}

function start() {
    loadLibraries();
    getSessions();
}

function rowID() {
    alert(sessionID);
}