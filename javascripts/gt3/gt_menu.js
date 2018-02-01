gtMainMenu_attachActions();

window.gtLastMainMenuTray = -1;

function gtMainMenu_attachActions() {

  var linkList = document.getElementsByClassName('gt-menu-top-link');

  for (var i = 0; i < linkList.length; i++) {
    var link = linkList[i];
    link.addEventListener("click", gtMainMenu_showHideSubMenu);

  }

  var obj = document.getElementById('gt-mobile-menu-activator');

  obj.addEventListener("click", gtMainMenu_showMainMenu);

}


function gtMainMenu_showHideSubMenu(e) {

  var myID = this.getAttribute('data-tray-id');

  if (window.gtLastMainMenuTray != -1) {
    document.getElementById('gt-menu-tray-' + window.gtLastMainMenuTray).style.display = '';
  }

  if (myID != window.gtLastMainMenuTray) {
    document.getElementById('gt-menu-tray-' + myID).style.display = 'block';
    window.gtLastMainMenuTray = myID;

  } else {
    window.gtLastMainMenuTray = -1;
  }

  e.preventDefault();
  e.stopPropagation();

  return false;

}


function gtMainMenu_showMainMenu() {

  var mobileToggle = document.getElementById('gt-mobile-menu-activator');
  var mainMenu = document.getElementById('gt-main-menu');
  /* var quickMenu = document.getElementById('gt-quick-menu'); */

  if (mainMenu.style.display != 'block') {
    mainMenu.style.display = 'block';
    /*if (quickMenu) {
      quickMenu.style.display = 'block';
    }*/

  } else { 
    mainMenu.style.display = '';
    /*if (quickMenu) {
      quickMenu.style.display = '';
    }*/
  }

  return false;

}
