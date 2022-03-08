"use strict";

// get the country data from the plugin
var countryData = window.intlTelInputGlobals.getCountryData(),
  telInput = document.querySelector("#phone"),
  addressDropdown = document.querySelector("#address-country"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");


// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialize
var it = window.intlTelInput(telInput, {
	initialCountry: 'tz',
	autoPlaceholder: 'aggressive',
	utilsScript: utilUrl,
	geoIpLookup: function(callback) {
        $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "us";
          callback(countryCode);
        });
      },
    separateDialCode: true
});

  var reset = function() {
    telInput.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
  };
  
  // on blur: validate
  telInput.addEventListener('blur', function() {
    reset();
    if (telInput.value.trim()) {
      if (it.isValidNumber()) {
        validMsg.classList.remove("hide");
      } else {
        telInput.classList.add("error");
        var errorCode = it.getValidationError();
        errorMsg.innerHTML = errorMap[errorCode];
        errorMsg.classList.remove("hide");
      }
    }
  });
  
  // on keyup / change flag: reset
  telInput.addEventListener('change', reset);
  telInput.addEventListener('keyup', reset);
  