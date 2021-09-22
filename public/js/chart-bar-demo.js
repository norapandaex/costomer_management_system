// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: months,
    datasets: [{
      label: "売り上げ",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: sales,
    },{
      label: "コスト",
      backgroundColor: "rgba(255,0,0,1)",
      borderColor: "rgba(255,0,0,1)",
      data: costs,
    },{
      label: "収支",
      backgroundColor: "rgba(18,137,22,1)",
      borderColor: "rgba(18,137,22,1)",
      data: diffs,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month',
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      },],
      yAxes: [{
        ticks: {
          min: min,
          max: max,
          maxTicksLimit: 10
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
