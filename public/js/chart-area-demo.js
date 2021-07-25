 Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
 Chart.defaults.global.defaultFontColor = '#292b2c';

 var ctx = document.getElementById("myAreaChart");
 var myLineChart = new Chart(ctx, {
   type: 'line',
   data: {
     labels: days,
     datasets: [{
       label: "日間PV",
       lineTension: 0.3,
       backgroundColor: "rgba(2,117,216,0.2)",
       borderColor: "rgba(2,117,216,1)",
       pointRadius: 5,
       pointBackgroundColor: "rgba(2,117,216,1)",
       pointBorderColor: "rgba(255,255,255,0.8)",
       pointHoverRadius: 5,
       pointHoverBackgroundColor: "rgba(2,117,216,1)",
       pointHitRadius: 50,
       pointBorderWidth: 2,
       data: pvs,
     }],
   },
   options: {
     scales: {
       xAxes: [{
         time: {
           unit: 'date'
         },
         gridLines: {
           display: false
         },
         ticks: {
           maxTicksLimit: 7
         }
       }],
       yAxes: [{
         ticks: {
           min: 0,
           max: max,
           maxTicksLimit: 5
         },
         gridLines: {
           color: "rgba(0, 0, 0, .125)",
         }
       }],
     },
     legend: {
       display: false
     }
   }
 });