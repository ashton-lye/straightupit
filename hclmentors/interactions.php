<!--Mentor interaction page Johnny to complete-->
<?php
include 'php/header.php';
include 'php/navbar.php';
?>

<div class="mentorInteractions">
<link rel="stylesheet" type="text/css" href="css/viewsessions.css"/>

<h1>
Mentor Interactions
</h1>
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

<div id="updateNotes">
  <textarea id="notes" label="Session Notes:" rows="4" cols="50">
  Enter notes about session here
  </textarea>
  <button type="button" id="confirmUpdate" onclick="Javascript:onclickRow()">Update</button>
</div>

<script src="js/scripts.js"></script>
<script src="js/interactions.js"></script>

<?php
include 'php/footer.php'
?>