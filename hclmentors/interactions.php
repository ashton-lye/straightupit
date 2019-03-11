<?php
include 'php/header.php';
include 'php/navbar.php';
?>

<!--Mentor interaction page, worked on by Johnny Kingi. Incomplete.-->

<div class="mentorInteractions">
<link rel="stylesheet" type="text/css" href="css/viewsessions.css"/>

<h1>
Today's Mentor Interactions
</h1>
<br>
<h3>Select Session ID then Add or Update notes to that session by clicking the Update button below</h3>
<br>

<div id="sessionTable">
    <table id="sessions">
            <th>Session ID</th>
            <th>Client Name</th>
            <th>Problem</th>
            <th>Notes</th>            
    </table>
</div>

<br>

<h2 id="sessionID_title">Selected SessionID: &nbsp&nbsp&nbspNone</h2>
<div id="sNotes">
  <br>
  <textarea id="notes" label="Session Notes:" rows="4" cols="50">
  Click Session ID Above to select interaction notes to modify or update...
  </textarea>
  <button type="button" id="confirmUpdate" onclick="Javascript:updateSessionNotes()">Update</button>
</div>

<script src="js/scripts.js"></script>
<script src="js/interactions.js"></script>

<?php
include 'php/footer.php'
?>