 function showProfile() {
      document.getElementById("settingsBox").style.display = "none";
      document.getElementById("profileBox").style.display = "block";
      document.getElementById("securityBox").style.display = "none";
      document.getElementById("aboutBox").style.display = "none";
    }

    function showSecurity() {
      document.getElementById("settingsBox").style.display = "none";
      document.getElementById("securityBox").style.display = "block";
      document.getElementById("profileBox").style.display = "none";
      document.getElementById("aboutBox").style.display = "none";
    }

    function showAbout() {
      document.getElementById("settingsBox").style.display = "none";
      document.getElementById("aboutBox").style.display = "block";
      document.getElementById("profileBox").style.display = "none";
      document.getElementById("securityBox").style.display = "none";
    }

    function backToSettings() {
      document.getElementById("profileBox").style.display = "none";
      document.getElementById("securityBox").style.display = "none";
      document.getElementById("aboutBox").style.display = "none";
      document.getElementById("settingsBox").style.display = "grid";
    }