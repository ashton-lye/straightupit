//scripts for booking page - ashton

//declare client detail vars
var selectedDate;
var selectedDay;
var selectedLibrary;
var selectedTime;
var clientName;
var clientNumber;
var clientProblem;

document.getElementById("librarySelect").onload = loadLibraries();

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

//function to get database data to check what times are available for selected day and library
function getTimes() {
    selectedDay = document.getElementById("datePicker").valueAsDate.getDay();
    selectedDate = document.getElementById("datePicker").value;
    selectedLibrary = document.getElementById("librarySelect").value;

    //converting into text day rather than number
    switch (selectedDay) {
        case 0: 
            break;
        case 1:
            selectedDay = "mon";
            break;
        case 2:
            selectedDay = "tues";
            break;
        case 3:
            selectedDay = "wed";
            break;
        case 4:
            selectedDay = "thurs";
            break;
        case 5:
            selectedDay = "fri";
            break;
        case 6:
            break;
    }

    var url = "php/checkAvailable.php";
    var data = "day="+selectedDay+"&date="+selectedDate+"&library="+selectedLibrary;
    ajaxRequest("POST", url, true, data, showTimes);
    console.log(selectedLibrary, selectedDay, selectedDate);
}

//adding available times to time selector drop down
function showTimes(response) {
    var shiftArray = JSON.parse(response);
    var timeSelect = document.getElementById("timeSelect");
    var timesAvailable = false;

    timeSelect.innerHTML = "<option value='' selected>Select a Time</option>";

    //chur daniel for the extra brainpower in this part
    //removing duplicate values from array (remaining array items = available times)
    for (var i = 0; i < shiftArray.length; i++) {
        var currentVal = shiftArray[i].time;
        var canAdd = true;
        for (var j = 0; j < shiftArray.length; j++) {
            if (currentVal == shiftArray[j].time && j != i) {
                canAdd = false;
                break;
            }
        }
        //if the time is available, display it in the list
        if (canAdd == true) {
            timesAvailable = true;
            timeSelect.innerHTML += "<option value="+currentVal+">"+currentVal+":00</option>";
        }
    } 
    if (timesAvailable == false) {
        alert("Sorry, there are no available times on this day. Please select another.\n\nPlease Note: Sessions are unavailale on the Weekends.");
    }
}

//function to display confirmation box with session details repeated back to the client
function showConfirm() {
    var confirmBox = document.getElementById("confirmBox");
    var details = document.getElementById("bookingDetails");
    selectedTime = document.getElementById("timeSelect").value;
    clientName = document.getElementById("nameInput").value;
    clientNumber = document.getElementById("numberInput").value;
    clientNumber = clientNumber.replace(/\s+/g, '');
    var isnum = /^\d+$/.test(clientNumber);
    if (selectedDate != "" && selectedLibrary != "" && selectedTime != "" && clientName != "" && clientNumber != "" && clientNumber.length <= 10 && isnum) {
        confirmBox.style.display = "block";
        details.innerHTML = "You are booking a mentoring session on "+selectedDate+" at "+selectedTime+":00, at the "+selectedLibrary+" library.<br><br>Your contact details are: <br>Name: "+clientName+"<br>Phone Number: "+clientNumber; 
    
    } else {
        alert("Please ensure all details have been entered correctly before confirming.");
    }
    
}

//close confirmation box
function closeConfirm() {
    var confirmBox = document.getElementById("confirmBox");
    confirmBox.style.display = "none";
}

//TODO
//function to tidy up inputs (.toLower, remove whitespace etc) and then insert into database
function bookSession() {
    clientName = clientName.toLowerCase();
    clientProblem = document.getElementById("problemText").value;

    var url = "php/bookSession.php";
    var data = "day="+selectedDay+"&date="+selectedDate+"&time="+selectedTime+"&library="+selectedLibrary+"&clientName="+clientName+"&clientNumber="+clientNumber+"&problem="+clientProblem;

    console.log(data);
    ajaxRequest("POST", url, true, data, bookingCheck);
}

function bookingCheck(response) {
    alert(response);
}
