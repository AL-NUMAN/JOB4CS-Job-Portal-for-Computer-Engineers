document.getElementsByClassName('tab_switcher')[0].click()
function openTab(evt, tabName) {
  // Declare all variables
  var i, portal, tab_switcher;

  // Get all elements with class="portal" and hide them
  portal = document.getElementsByClassName("portal");
  for (i = 0; i < portal.length; i++) {
    portal[i].style.display = "none";
  }

  // Get all elements with class="tab_switcher" and remove the class "active"
  tab_switcher = document.getElementsByClassName("tab_switcher");
  for (i = 0; i < tab_switcher.length; i++) {
    tab_switcher[i].className = tab_switcher[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab

  
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
  
}

	var modal = document.getElementById('id01');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
		
		document.getElementById("profileBtn").style.display = "none";
		document.getElementById("loginBtn").style.display = "block";
			document.getElementById("signup_button").style.display = "block";
	

		
