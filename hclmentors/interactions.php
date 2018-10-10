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
            <th>Time</th>
            <th>Client Name</th>
            <th>Mentor</th>
            <th>Problem</th>
            <th>Phone</th>
            <th>Notes</th>
    </table>
</div>


<textarea label="Session Notes:" rows="4" cols="50">
Notes
</textarea>

<script src="../js/scripts.js"></script>
<script src="../js/interactionscript.js"></script>

<?php
include 'php/footer.php'
?>