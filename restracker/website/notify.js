//Checks the database by sending a request to a PHP file
//on the server.
function checkDB() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	query = "SELECT name, quantity, minimum FROM Inventory";
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log("checking for low ingredients...")
			var r = this.responseText;
			var oldCookie = document.cookie.split(";")[0];
			var newCookie = createCookie(r);
			if (oldCookie != newCookie) {
				var i = r.split("/").length - 1;
				document.cookie = newCookie;
				notify(i + " items");
			} else {
				return;
			}
			console.log(oldCookie);
			console.log(newCookie);
		}
	};
	xmlhttp.open("GET", "checkdb.php?q="+query,true);
	xmlhttp.send();
}

//generates a notification.
function notify(item) {
    // body
    var b = "You're running low on " + item;

    new Notification("Low Food Warning", {body : b}).show;
}

//Creates and returns a cookie string using the returned
//string from checkdb.php
function createCookie(str) {
	var cookie = escape("lowon") + "=" + escape(str);
	//document.cookie = cookie;
	return cookie;
}

function readCookie(str) {
	
}

checkDB();

setInterval(checkDB, 30000);