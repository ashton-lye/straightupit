<?php
include 'php/header.php';
include 'php/navbar.php';
?>

<div class="content">
    <link rel="stylesheet" href="css/booking.css">

    <div id="inputs">
        <h1>Book a Mentoring Session</h1>
        <div id="step1">
            <h3>Step 1: </h3>
            <p>Choose a Date</p>
            <input type="date" id="datePicker" onchange="Javascript:checkWeekend()">
        </div>
        <div id="step2">
            <h3>Step 2: </h3>
            <p>Choose a Library</p>
            <select id="librarySelect" placeholder="Select Library" onchange="Javascript:getTimes()">
                <option value="" selected>Select a Library</option>
            </select>
        </div>
        <div id="step3">
            <h3>Step 3: </h3>
            <p>Choose a Time</p>
            <select id="timeSelect">
                <option value="" selected>Select a Time</option>
            </select>
        </div>
        <div id="step4">
            <h3>Step 4: </h3>
            <p>Enter your Details</p>
            <input type="text" id="nameInput" placeholder="Name">
            <input type="text" id="numberInput" placeholder="Phone Number">
        </div>
        <div id="step5">
            <h3>Step 5: </h3>
            <p>Enter a Brief Description of What you would like Help with: (Optional)</p>
            <textarea id="problemText" rows="5" cols="50" placeholder="Enter Description Here"></textarea>
        </div>
    </div>
    <div id="confirmDiv">
        <p>Once all your details have been entered, click 'Confirm Details' to confirm your details.</p>
        <button id="submitbutton" onclick="Javascript:showConfirm()">Confirm Details</button>
    </div>
    

    <!--Confirmation Popup-->
    <div id="confirmBox" class="confirmBox">

        <div class="confirmBoxContent">
            <h2>Booking Confirmation</h2>
            <div id="buttonDiv">
                <p id="bookingDetails"></p>
                <p>If these details are correct, click 'Book Session' to book your mentoring session. Otherwise, click 'Cancel' to go back and edit the details.</p>
                <button id="bookButton" onclick="Javascript:bookSession()">Book Session</button>
                <button id="cancelButton" onclick="Javascript:closeConfirm()">Cancel</button>
            </div>
            <div id="bookedDiv">
                <p>Your Session has been Booked! You can now close this page.</p>
            </div>
        </div>
        
    </div>
    <script src="js/scripts.js"></script>
    <script src="js/bookingscripts.js"></script>
</div>

<?php
include 'php/footer.php'
?>