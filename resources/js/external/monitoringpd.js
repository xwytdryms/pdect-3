// First line chart
const options = {
  chart: {
      height: "320px", // Set height to 80% of the original 400px
      width: "100%", // Keep original width
      type: "line",
      fontFamily: "Inter, sans-serif",
      dropShadow: {
          enabled: false,
      },
      toolbar: {
          show: false,
      },
  },
  tooltip: {
      enabled: true,
      x: {
          show: false,
      },
  },
  dataLabels: {
      enabled: false,
  },
  stroke: {
      width: 6,
  },
  grid: {
      show: true,
      strokeDashArray: 4,
      padding: {
          left: 16,
          right: 0,
          top: -26
      },
  },
  series: [
      {
          name: "DB Min",
          data: dbmin,
          color: "#1A56DB",
      },
      {
          name: "DBA",
          data: dba,
          color: "#7E3AF2",
      },
      {
          name: "DB Max",
          data: dbmax,
          color: "#BBE1FA",
      },
      {
        name: "Arc",
        data: arccount,
        color: "#F9E6CF",
    },
  ],
  legend: {
      show: false
  },
  stroke: {
      curve: 'smooth'
  },

  xaxis: {
      categories: timeArray,
      labels: {
          show: true,
          style: {
              fontFamily: "Inter, sans-serif",
              cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-300'
          }
      },
      axisBorder: {
          show: false,
      },
      axisTicks: {
          show: false,
      },
  },
  yaxis: {
      show: false,
  },
}

if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
  const chart = new ApexCharts(document.getElementById("line-chart"), options);
  chart.render();
}
window.addEventListener('resize', () => {
    chart.resize();
});


  
