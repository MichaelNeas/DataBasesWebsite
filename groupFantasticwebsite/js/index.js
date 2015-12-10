function revealLogin() {
  document.getElementById("login").style.display = "none";

  document.getElementById("username").style.display = "block";
  document.getElementById("pwd").style.display = "block";
  document.getElementById("submit").style.display = "block";
  document.getElementById("alertLine").style.display = "none";
  document.getElementById("reg-line").style.display = "block";
}

function alertLine() {
  	document.getElementById("alertLine").style.display = "block";
}

function alertLine2() {
	document.getElementById("alertLine2").style.display = "block";
}