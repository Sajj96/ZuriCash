"use strict";

$(function() {
    $(document).on('click','.advert', function(){
        var ads_id = $(this).data("id");
        var user_id = $(".section").attr("data-user");
        $.ajax({
            url: url3,
            method: "GET",
            data: {
                ads_id: ads_id,
                user_id: user_id
            },
            success: function (count) {
              var rows = count;
              if(rows > 0) {
                $("#exampleModal2").modal("show");
              } else {
                  $.ajax({
                        url: url2,
                        method: "POST",
                        data: {
                            _token: document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                            ads_id: ads_id,
                            user_id: user_id
                        },
                        success: function (resp) {
                            if(rows == 0) {
                                  $.ajax({
                                    url: url1,
                                    method: "POST",
                                    data: {
                                        _token: document
                                            .querySelector('meta[name="csrf-token"]')
                                            .getAttribute("content"),
                                        user_id: user_id,
                                        type: "ads",
                                        amount: 50
                                    },
                                    success: function (response) {
                                      $("#exampleModal").modal("show");
                                      console.log(response);
                                    },
                                });
                            }
                        },
                    });
              }
            }
        });
    });

    $("#exampleModal").on("hidden.bs.modal", function (e) {
        e.preventDefault();
       window.location.href = url4;
       // location.reload();
   });
   
   $("#exampleModal2").on("hidden.bs.modal", function (e) {
        e.preventDefault();
       window.location.href = url4;
       // location.reload();
   });
});