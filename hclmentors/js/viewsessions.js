//Johnnys scripts for viewsessions page

//declare client detail vars
var idNumber;
var selectedDate;
var selectedDay;
var selectedLibrary;
var selectedTime;
var clientName;
var clientNumber;
var clientProblem;

var reset = document.getElementById('sessionTable').innerHTML;//copy of blank table
document.getElementById("librarySelect").onload = start();//initialise start() method onload

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
        var cell4 = row.insertCell(4);
        var cell5 = row.insertCell(5);
        cell.className = 'c'[i];
        cell.innerHTML = sessionData[i].time;
        cell1.innerHTML = sessionData[i].name;
        cell2.innerHTML = sessionData[i].mentor;
        cell3.innerHTML = sessionData[i].problem;
        cell4.innerHTML = sessionData[i].phone;
        cell5.innerHTML = sessionData[i].notes;                   
    }  
}

//select sessions by library and date and Change library title
function updateSessionTable () {
    selectedLibrary = document.getElementById("librarySelect").value;
    selectedDate = document.getElementById("datePicker").value;
    document.getElementById('libraryTitle').innerHTML = ("Mentoring Sessions for "+selectedLibrary+" Library");

    var data = "library="+selectedLibrary+"&date="+selectedDate;
    var url = "php/updateSessions.php"
    ajaxRequest("POST", url, true, data, populateTable);
    document.getElementById('sessionTable').innerHTML = reset; //reset to blank table before repopulating
}

function start() {
    loadLibraries();
    getSessions();
}


