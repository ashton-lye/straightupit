//JavaScript for the login page
//To be completed by Ashton

var usernameInput = document.getElementById("username");
var passwordInput = document.getElementById("password");

function login(accountType) {
    var username = usernameInput.value;
    var password = passwordInput.value;
    console.log(username, password, accountType);
    var url = "php/login.php";
    var data = "username="+username+"&password="+password+"&accountType="+accountType;
    ajaxRequest("POST", url, true, data, checkLogin);  
}

function checkLogin(response) {
    if (response != "") {
        usernameInput.value = "";
        passwordInput.value = "";
        alert("Login Successful!");
        loggedInUser = response;
    }
    else {
        alert("Login Unsuccessful - Please Check Your Details");
    }   
}