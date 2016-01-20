
/**
 * Function called every interval - Check for database update
 */
function pullingdb(){
    var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (lastmod == xhttp.responseText) {
				console.log("No update");
			}else{
				lastmod = xhttp.responseText;
				document.getElementById("update").innerHTML = "Last Update: " + lastmod;
				console.log("Update");
			}
		}
	}
}