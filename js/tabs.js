function openTab(evt, tabName) {
    var i, loginUpper, loginUpperTabLinks;
    loginUpper = document.getElementsByClassName("login_upper");
    for (i = 0; i < loginUpper.length; i++) {
      loginUpper[i].style.display = "none";
    }
    loginUpperTabLinks = document.getElementsByClassName("login_upper_tabs_links");
    for (i = 0; i < loginUpperTabLinks.length; i++) {
      loginUpperTabLinks[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
    localStorage.setItem('activeTab', tabName);
  }
  

  var activeTab = localStorage.getItem('activeTab');
  if (activeTab) {
    openTab(null, activeTab);
  } else {
    document.getElementById("defaultOpen").click();
  }
  