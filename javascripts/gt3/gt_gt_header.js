gt3_gtHeader_attachActions();

window.gtLastOpened = '';

function gt3_gtHeader_attachActions() {

  var obj;

  if (obj = document.getElementById('gt-campustoggle')) {
    obj.addEventListener("click", function() { gt3_gtHeader_showHidePanel('tech') });
  }

  if (obj = document.getElementById('gt-campustoggle-p')) {
    obj.addEventListener("click", function() { gt3_gtHeader_showHidePanel('tech') });
  }

  if (obj = document.getElementById('gt-searchtoggle')) {
    obj.addEventListener("click", function() { 
      var search = document.getElementById('gt-search-field');

      if (window.innerWidth < 630) {
        search.style.display = 'none';
        gt3_gtHeader_showHidePanel('search');
        return;
      }

      if (search.value != 'Search This Site') { 
        document.getElementById('search-block-form').submit(); 

      } else {
        search.style.display = (search.style.display != 'inline' ? 'inline' : 'none');

      }
    });

    if (obj = document.getElementById('gt-searchlabel')) {
      obj.addEventListener("click", function() { 
        var search = document.getElementById('gt-search-field');

        if (window.innerWidth < 630) {
          search.style.display = 'none';
          gt3_gtHeader_showHidePanel('search');
          return;
        }

        search.style.display = (search.style.display != 'inline' ? 'inline' : 'none');
      });
    }

    if (obj = document.getElementById('gt-search-field')) {
      obj.addEventListener("focus", function() { 
        this.value = (this.value == 'Search This Site') ? '' : this.value;
      });

      obj.addEventListener("blur", function() {
        this.value = (this.value == '') ? 'Search This Site' : this.value;
      });
    }

    if (obj = document.getElementById('gt-search-field-tray')) {
      obj.addEventListener("focus", function() {
        this.value = (this.value == 'Search This Site') ? '' : this.value;
       });

      obj.addEventListener("blur", function() {
        this.value = (this.value == '') ? 'Search This Site' : this.value;
      });

    }

  }

}


function gt3_gtHeader_showHidePanel(panelID) {

  var techpanel = document.getElementById('gt-tech-links');
  var searchpanel = document.getElementById('gt-search-as-tray');

  if (techpanel) { techpanel.style.display = (panelID == 'tech' ? 'block' : 'none'); }
  if (searchpanel) { searchpanel.style.display = (panelID == 'search' ? 'block' : 'none'); }

  var gttray= document.getElementById('gt-header-tray');
  var gttrayopen = (gttray.style.height == '38px') || (gttray.style.height == 'auto');

  if (!gttrayopen && (panelID != gtLastOpened)) {
    gttray.style.height = (window.innerWidth > 966 ? '38px' : 'auto');

  } else if (gttrayopen && (panelID == gtLastOpened)) {
    gttray.style.height = '0';
    window.gtLastOpened = '';

    return;

  }

  window.gtLastOpened = panelID;

}
