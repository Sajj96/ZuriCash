'use strict';
$(function () {

    //Advanced form with validation
    var form = $('#wizard_with_validation').show();

    form.validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
        rules: {
            'confirm': {
                equalTo: '#password'
            }
        }
    });

    $('#amount').on('blur keyup', () => {
        var amount = $('#amount').val(),
            deposit = 0,
            fee = 0;
        amount = parseFloat(amount.replace(/,/g, ''));

        if(userCountry === 'tz') {
            if (amount >= 15000 && amount <= 50000) {
                fee = 1000;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" TZS");
            } else if (amount >= 51000 && amount <= 100000) {
                fee = 2000;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" TZS");
            } else if (amount >= 101000 && amount <= 500000) {
                fee = 5000;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" TZS");
            } else if (amount >= 501000 && amount <= 1000000) {
                fee = 10000;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" TZS");
            } else if(amount >= 1010000){
                fee = 15000;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: TZS " + fee);
            } else {
                $('#deposit').val("");
                $('#fee').val("");
                $('#fee_info').text("");
            }
        } else if(userCountry === 'ke') {
            if (amount >= (15000 * 0.05) && amount <= (50000 * 0.05)) {
                fee = 1000 * 0.05;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" KES");
            } else if (amount >= (51000 * 0.05) && amount <= (100000 * 0.05)) {
                fee = 2000 * 0.05;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" KES");
            } else if (amount >= (101000 * 0.05) && amount <= (500000 * 0.05)) {
                fee = 5000 * 0.05;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" KES");
            } else if (amount >= (501000 * 0.05) && amount <= (1000000 * 0.05)) {
                fee = 10000 * 0.05;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" KES");
            } else if(amount >= (1010000 * 0.05)){
                fee = 15000 * 0.05;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" KES");
            } else {
                $('#deposit').val("");
                $('#fee').val("");
                $('#fee_info').text("");
            }
        } else if(userCountry === 'ug') {
            if (amount >= (15000 * 1.6) && amount <= (50000 * 1.6)) {
                fee = 1000 * 1.6;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" UGX");
            } else if (amount >= (51000 * 1.6) && amount <= (100000 * 1.6)) {
                fee = 2000 * 1.6;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" UGX");
            } else if (amount >= (101000 * 1.6) && amount <= (500000 * 1.6)) {
                fee = 5000 * 1.6;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" UGX");
            } else if (amount >= (501000 * 1.6) && amount <= (1000000 * 1.6)) {
                fee = 10000 * 1.6;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" UGX");
            } else if(amount >= (1010000 * 1.6)){
                fee = 15000 * 1.6;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" UGX");
            } else {
                $('#deposit').val("");
                $('#fee').val("");
                $('#fee_info').text("");
            }
        } else if(userCountry === 'rw') {
            if (amount >= (15000 * 0.44) && amount <= (50000 * 0.44)) {
                fee = 1000 * 0.44;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" RWF");
            } else if (amount >= (51000 * 0.44) && amount <= (100000 * 0.44)) {
                fee = 2000 * 0.44;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" RWF");
            } else if (amount >= (101000 * 0.44) && amount <= (500000 * 0.44)) {
                fee = 5000 * 0.44;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" RWF");
            } else if (amount >= (501000 * 0.44) && amount <= (1000000 * 0.44)) {
                fee = 10000 * 0.44;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" RWF");
            } else if(amount >= (1010000 * 0.44)){
                fee = 15000 * 0.44;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" RWF");
            } else {
                $('#deposit').val("");
                $('#fee').val("");
                $('#fee_info').text("");
            }
        } else {
            if (amount >= (15000 * 0.0004) && amount <= (50000 * 0.0004)) {
                fee = 1000 * 0.0004;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" USD");
            } else if (amount >= (51000 * 0.0004) && amount <= (100000 * 0.0004)) {
                fee = 2000 * 0.0004;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" USD");
            } else if (amount >= (101000 * 0.0004) && amount <= (500000 * 0.0004)) {
                fee = 5000 * 0.0004;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" USD");
            } else if (amount >= (501000 * 0.0004) && amount <= (1000000 * 0.0004)) {
                fee = 10000 * 0.0004;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" USD");
            } else if(amount >= (1010000 * 0.0004)){
                fee = 15000 * 0.0004;
                deposit = amount - fee;
                $('#deposit').val(deposit.toFixed(2).toLocaleString('en-US'));
                $('#fee').val(fee.toFixed(2).toLocaleString('en-US'));
                $('#fee_info').text("Fee: " + fee.toFixed(2).toLocaleString('en-US') +" USD");
            } else {
                $('#deposit').val("");
                $('#fee').val("");
                $('#fee_info').text("");
            }
        }
    });

    $('#balance').on('change', function(){
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if(valueSelected == "trivia") {
            $('#balance-amount').text(parseFloat(trivia).toFixed(2).toLocaleString('en-US') + " " + currency);
        } else if(valueSelected == "video") {
            $('#balance-amount').text(parseFloat(video).toFixed(2).toLocaleString('en-US') + " " + currency);
        } else if(valueSelected == "whatsapp"){
            $('#balance-amount').text(parseFloat(whatsapp).toFixed(2).toLocaleString('en-US') + " " + currency);
        } else if(valueSelected == "ads"){
            $('#balance-amount').text(parseFloat(ads).toFixed(2).toLocaleString('en-US') + " " + currency);
        } else {
            $('#balance-amount').text(parseFloat(balance).toFixed(2).toLocaleString('en-US') + " " + currency);
        }
    });
});