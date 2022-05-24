"use strict";

/// get the country data from the plugin
var telInput = document.querySelector("#phone");

// initialize
var it = window.intlTelInput(telInput, {
initialCountry: 'tz',
autoPlaceholder: 'aggressive',
formatOnDisplay: false,
utilsScript: utilUrl,
geoIpLookup: function(callback) {
      $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "us";
        callback(countryCode);
      });
    }
});

var handleChange = function() {
  if(it.isValidNumber()) {
    var text = it.getNumber();
    telInput.value = text;
  }

};

// on keyup / change flag: reset
telInput.addEventListener('change', handleChange);
telInput.addEventListener('keyup', handleChange);
  