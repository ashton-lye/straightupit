<?php
include 'php/header.php';
include 'php/navbar.php';
?>

<div id="viewSession">

<head>
    <title>HCL Computer Mentor Programme</title>
    <link rel="stylesheet" href="css/viewsessions.css">
</head>
    <h1>Todays Mentoring sessions</h1>
    
<div id = "dateLibrary">
    <p onload="Javascript:start()">Choose a Date:</p>
    <input type="date" id="datePicker">

    <p>Choose a Library:</p>
    <select id="librarySelect" placeholder="Select Library" onchange="Javascript:updateSessionTable()">    
        <option value="" selected>Select a Library</option>
    </select>
</div>

<h2 id="libraryTitle">Mentoring sessions for Central Library</h2>
    <p></p>
<div id="sessionTable">
    <table id="sessions">
            <th>Time</th>
            <th>Client Name</th>
            <th>Mentor</th>
            <th>Problem</th>
    </table>
</div>


<script src="js/scripts.js"></script>
<script src="js/interactionscript.js"></script>

</div>

<?php
include 'php/footer.php'
?>