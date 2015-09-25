(function () {
    var TZ_INFO;
    // to get its own URL
    var prefURL = '';
    var scripts = document.getElementsByTagName('script');
    for (i = 0; i < scripts.length; i++) {
        var pos = scripts[i].src.search("/plugins/timezones/js/tz.js") ;
        if ( pos >= 0 ) {
            prefURL = scripts[i].src.substr(0, pos);
        }
    }

    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", prefURL + "/plugins/timezones/ajax/tz.php", true);
    xmlhttp.onreadystatechange = function (aEvt) {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 200) {
                TZ_INFO = JSON.parse(xmlhttp.responseText);
                var time_zone_name = TZ_INFO['tz'];
                prefURL += '/front/preference.php';
                //window.addEventListener('load', function () {
                    // search for div with id=c_preference
                    // to add a new <li> at end of <ul>
                    try {
                        var eltUL = document.getElementById('c_preference').firstChild;
                        if (eltUL) {
                            eltUL.innerHTML += "<li><a title='Time zone: " + time_zone_name + "' href='" + prefURL + "'>" + time_zone_name + "</a></li>";
                            }
                    } catch( ex ) {
                    }

                //});
            }
            else { /*debugger; */ 
            }
        }
    };
    xmlhttp.send(null);
          
})();


