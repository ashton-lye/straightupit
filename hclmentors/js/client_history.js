function getNameSession(name)
{

	var xhttp = new XMLHttpRequest();
	
	
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200)
		{
			var row = document.getElementById("contents").innerHTML = this.responseText;
		}	
	}
		
	query = "php/history_name.php?clientinput="+name;
	xhttp.open("GET", query , true);
	xhttp.send();
}