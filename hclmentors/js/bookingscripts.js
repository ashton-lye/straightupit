//scripts for booking page - ashton

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
    var selectedDay = document.getElementById("datePicker").valueAsDate.getDay();
    var selectedDate = document.getElementById("datePicker").value;
    var selectedLibrary = document.getElementById("librarySelect").value;

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
        alert("Sorry, there are no available times on this day. Please select another.");
    }
}
