"use strict";

$(function () {
    chart1();
});



function chart1() {
    let curr = new Date;
    let week = [];
    let withdraw = [0,0,0,0,0,0,0];
    let earning = [0,0,0,0,0,0,0];
    let monWithdraw = 0, monEarnings = 0;
    let tueWithdraw = 0, tueEarnings = 0;
    let wedWithdraw = 0, wedEarnings = 0;
    let thurWithdraw = 0, thurEarnings = 0;
    let friWithdraw = 0, friEarnings = 0;
    let satWithdraw = 0, satEarnings = 0;
    let sunWithdraw = 0, sunEarnings = 0;
    let sumEarning = 0;
    let sumWithdraw = 0;

    for(let i = 1; i <= 7; i++) {
      let first = curr.getUTCDate() - curr.getUTCDay() + i;
      let day = new Date(curr.setUTCDate(first)).toISOString().slice(0, 10);
      week.push(day);
    }

    transactions.forEach(x => {
      const date  = new Date(x.created_at);
      const currentDayOfMonth = ('0' + date.getUTCDate()).slice(-2);
      const currentMonth = ('0' + (date.getUTCMonth()+1)).slice(-2); 
      const currentYear = date.getUTCFullYear();

      const dateString = currentYear + "-" + (currentMonth) + "-" + currentDayOfMonth;
      
      if(dateString === week[0]) {
        if(x.currency == "KES") {
            monWithdraw = monWithdraw + x.amount / 0.05 ;
            monEarnings = monEarnings + x.fee / 0.05 ;
        }
        if(x.currency == "UGX") {
            monWithdraw = monWithdraw + x.amount / 1.6 ;
            monEarnings = monEarnings + x.fee / 1.6 ;
        }
        if(x.currency == "RWF") {
            monWithdraw = monWithdraw + x.amount / 0.44 ;
            monEarnings = monEarnings + x.fee / 0.44 ;
        }
        if(x.currency == "USD") {
            monWithdraw = monWithdraw + x.amount / 0.0004 ;
            monEarnings = monEarnings + x.fee / 0.0004 ;
        }
        if(x.currency == "TZS") {
            monWithdraw = monWithdraw + x.amount ;
            monEarnings = monEarnings + x.fee ;
        }

        withdraw[0] = monWithdraw;
        earning[0] = monEarnings;
      }

      if(dateString === week[1]) {
        if(x.currency == "KES") {
            tueWithdraw = tueWithdraw + x.amount / 0.05 ;
            tueEarnings = tueEarnings + x.fee / 0.05 ;
        }
        if(x.currency == "UGX") {
            tueWithdraw = tueWithdraw + x.amount / 1.6 ;
            tueEarnings = tueEarnings + x.fee / 1.6 ;
        }
        if(x.currency == "RWF") {
            tueWithdraw = tueWithdraw + x.amount / 0.44 ;
            tueEarnings = tueEarnings + x.fee / 0.44 ;
        }
        if(x.currency == "USD") {
            tueWithdraw = tueWithdraw + x.amount / 0.0004 ;
            tueEarnings = tueEarnings + x.fee / 0.0004 ;
        }
        if(x.currency == "TZS") {
            tueWithdraw = tueWithdraw + x.amount ;
            tueEarnings = tueEarnings + x.fee ;
        }

        withdraw[1] = tueWithdraw;
        earning[1] = tueEarnings;
      }

      if(dateString === week[2]) {
        if(x.currency == "KES") {
            wedWithdraw = wedWithdraw + x.amount / 0.05 ;
            wedEarnings = wedEarnings + x.fee / 0.05 ;
        }
        if(x.currency == "UGX") {
            wedWithdraw = wedWithdraw + x.amount / 1.6 ;
            wedEarnings = wedEarnings + x.fee / 1.6 ;
        }
        if(x.currency == "RWF") {
            wedWithdraw = wedWithdraw + x.amount / 0.44 ;
            wedEarnings = wedEarnings + x.fee / 0.44 ;
        }
        if(x.currency == "USD") {
            wedWithdraw = wedWithdraw + x.amount / 0.0004 ;
            wedEarnings = wedEarnings + x.fee / 0.0004 ;
        }
        if(x.currency == "TZS") {
            wedWithdraw = wedWithdraw + x.amount ;
            wedEarnings = wedEarnings + x.fee ;
        }

        withdraw[2] = wedWithdraw;
        earning[2] = wedEarnings;
      }

      if(dateString === week[3]) {
        if(x.currency == "KES") {
            thurWithdraw = thurWithdraw + x.amount / 0.05 ;
            thurEarnings = thurEarnings + x.fee / 0.05 ;
        }
        if(x.currency == "UGX") {
            thurWithdraw = thurWithdraw + x.amount / 1.6 ;
            thurEarnings = thurEarnings + x.fee / 1.6 ;
        }
        if(x.currency == "RWF") {
            thurWithdraw = thurWithdraw + x.amount / 0.44 ;
            thurEarnings = thurEarnings + x.fee / 0.44 ;
        }
        if(x.currency == "USD") {
            thurWithdraw = thurWithdraw + x.amount / 0.0004 ;
            thurEarnings = thurEarnings + x.fee / 0.0004 ;
        }
        if(x.currency == "TZS") {
            thurWithdraw = thurWithdraw + x.amount ;
            thurEarnings = thurEarnings + x.fee ;
        }

        withdraw[3] = thurWithdraw;
        earning[3] = thurEarnings;
      }

      if(dateString === week[4]) {
        if(x.currency == "KES") {
            friWithdraw = friWithdraw + x.amount / 0.05 ;
            friEarnings = friEarnings + x.fee / 0.05 ;
        }
        if(x.currency == "UGX") {
            friWithdraw = friWithdraw + x.amount / 1.6 ;
            friEarnings = friEarnings + x.fee / 1.6 ;
        }
        if(x.currency == "RWF") {
            friWithdraw = friWithdraw + x.amount / 0.44 ;
            friEarnings = friEarnings + x.fee / 0.44 ;
        }
        if(x.currency == "USD") {
            friWithdraw = friWithdraw + x.amount / 0.0004 ;
            friEarnings = friEarnings + x.fee / 0.0004 ;
        }
        if(x.currency == "TZS") {
            friWithdraw = friWithdraw + x.amount ;
            friEarnings = friEarnings + x.fee ;
        }

        withdraw[4] = friWithdraw;
        earning[4] = friEarnings;
      }

      if(dateString === week[5]) {
        if(x.currency == "KES") {
            satWithdraw = satWithdraw + x.amount / 0.05 ;
            satEarnings = satEarnings + x.fee / 0.05 ;
        }
        if(x.currency == "UGX") {
            satWithdraw = satWithdraw + x.amount / 1.6 ;
            satEarnings = satEarnings + x.fee / 1.6 ;
        }
        if(x.currency == "RWF") {
            satWithdraw = satWithdraw + x.amount / 0.44 ;
            satEarnings = satEarnings + x.fee / 0.44 ;
        }
        if(x.currency == "USD") {
            satWithdraw = satWithdraw + x.amount / 0.0004 ;
            satEarnings = satEarnings + x.fee / 0.0004 ;
        }
        if(x.currency == "TZS") {
            satWithdraw = satWithdraw + x.amount ;
            satEarnings = satEarnings + x.fee ;
        }

        withdraw[5] = satWithdraw;
        earning[5] = satEarnings;
      }

      if(dateString === week[6]) {
        if(x.currency == "KES") {
            sunWithdraw = sunWithdraw + x.amount / 0.05 ;
            sunEarnings = sunEarnings + x.fee / 0.05 ;
        }
        if(x.currency == "UGX") {
            sunWithdraw = sunWithdraw + x.amount / 1.6 ;
            sunEarnings = sunEarnings + x.fee / 1.6 ;
        }
        if(x.currency == "RWF") {
            sunWithdraw = sunWithdraw + x.amount / 0.44 ;
            sunEarnings = sunEarnings + x.fee / 0.44 ;
        }
        if(x.currency == "USD") {
            sunWithdraw = sunWithdraw + x.amount / 0.0004 ;
            sunEarnings = sunEarnings + x.fee / 0.0004 ;
        }
        if(x.currency == "TZS") {
            sunWithdraw = sunWithdraw + x.amount ;
            sunEarnings = sunEarnings + x.fee ;
        }

        withdraw[6] = sunWithdraw;
        earning[6] = sunEarnings;
      }
    });

    var options = {
        chart: {
            height: 230,
            type: "line",
            shadow: {
                enabled: true,
                color: "#000",
                top: 18,
                left: 7,
                blur: 10,
                opacity: 1
            },
            toolbar: {
                show: false
            }
        },
        colors: ["#3dc7be", "#ffa117"],
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: "smooth"
        },
        series: [{
            name: "Earning",
            data: earning
        },
        {
            name: "Withdraw",
            data: withdraw
        }
        ],
        grid: {
            borderColor: "#e7e7e7",
            row: {
                colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                opacity: 0.0
            }
        },
        markers: {
            size: 6
        },
        xaxis: {
            categories: ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"],

            labels: {
                style: {
                    colors: "#9aa0ac"
                }
            }
        },
        yaxis: {
            title: {
                text: "Income"
            },
            labels: {
                style: {
                    color: "#9aa0ac"
                }
            },
            min: 0,
            max: 1000000
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: true,
            offsetY: -25,
            offsetX: -5
        }
    };

    for(let e = 0; e < earning.length; e++) {
        sumEarning += earning[e];
    }

    for(let w = 0; w < withdraw.length; w++) {
        sumWithdraw += withdraw[w];
    }

    document.getElementById("earning").innerText = new Intl.NumberFormat().format(sumEarning);
    document.getElementById("withdraw").innerText = new Intl.NumberFormat().format(sumWithdraw);
    var chart = new ApexCharts(document.querySelector("#chart1"), options);

    chart.render();
}