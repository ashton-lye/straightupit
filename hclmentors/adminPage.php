<?php
include 'php/header.php';
include 'php/navbar.php';
?>

<div class="content">
    <link rel="stylesheet" href="css/adminPage.css">

    <div id="inputs">
        <h1>Manage Staff Accounts</h1>

        <div id="box1">
            <h3>#1 Choose account type</h3>
            <select id="accountType" placeholder="Select staff member" onchange="Javascript:()">
                <option value="" selected>Select Account</option>
                <option value="staff" >Staff Member</option>
                <option value="mentor" >Mentor</option>

            </select>
        </div>

        <div id="box2">
            <h3>#2 Select existing or add new account</h3>

            <select id="staffSelect" placeholder="Select staff member" onchange="Javascript:()">
                <option value="" selected>Select Account</option>
                <option value="new" >New Account</option>

                <!--remove later-->
                <option value="new" >bob1</option>
                <option value="new" >steve2</option>
                <option value="new" >matt3</option>
                <!--remove later-->
            </select>
        </div>

        <div id="box3">
            <h3>#3 Make your changes</h3>
            <p>Username</p>
            <input type="text" id="username" class="input1" placeholder="Username">
            <p>Password</p>
            <input type="text" id="password" class="input1" placeholder="Password">
            <p>Email</p>
            <input type="text" id="email" class="input1" placeholder="Email">
            <p>First Name</p>
            <input type="text" id="fname" class="input1" placeholder="First Name">
            <p>Last Name</p>
            <input type="text" id="lname" class="input1" placeholder="Last Name">
        </div>
    </div>
    <div id="confirmDiv">
        <p>#4 When finished click 'Add Account' or 'Confirm Updates' to finalise the changes.</p>
        <button id="addAccountBbutton" onclick="Javascript:()">Add Account</button>
        <button id="confirmChangesButton" onclick="Javascript:()">Confirm Changes</button>
    </div>
    <script src="js/scripts.js"></script>
    <script src="js/bookingscripts.js"></script>
</div>

<?php
include 'php/footer.php'
?>