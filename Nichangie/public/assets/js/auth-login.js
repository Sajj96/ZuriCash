"use strict";

/// get the country data from the plugin
var telInput = document.querySelector("#phone");

// initialize
var it = window.intlTelInput(telInput, {
initialCountry: 'tz',
autoPlaceholder: 'aggressive',
nationalMode: true,
utilsScript: utilUrl,
geoIpLookup: function(callback) {
      $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "us";
        callback(countryCode);
      });
    },
  separateDialCode: true
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
  