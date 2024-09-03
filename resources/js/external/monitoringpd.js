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
          left: 2,
          right: 2,
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

// Dropdown fo PD

// Arc Chart

const arcoptions = {
    colors: ["#1A56DB", "#FDBA8C"],
    series: [
      {
        name: "Organic",
        color: "#1A56DB",
        data: [
          { x: "Mon", y: 231 },
          { x: "Tue", y: 122 },
          { x: "Wed", y: 63 },
          { x: "Thu", y: 421 },
          { x: "Fri", y: 122 },
          { x: "Sat", y: 323 },
          { x: "Sun", y: 111 },
        ],
      },
      {
        name: "Social media",
        color: "#FDBA8C",
        data: [
          { x: "Mon", y: 232 },
          { x: "Tue", y: 113 },
          { x: "Wed", y: 341 },
          { x: "Thu", y: 224 },
          { x: "Fri", y: 522 },
          { x: "Sat", y: 411 },
          { x: "Sun", y: 243 },
        ],
      },
    ],
    chart: {
      type: "bar",
      height: "320px",
      fontFamily: "Inter, sans-serif",
      toolbar: {
        show: false,
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "70%",
        borderRadiusApplication: "end",
        borderRadius: 8,
      },
    },
    tooltip: {
      shared: true,
      intersect: false,
      style: {
        fontFamily: "Inter, sans-serif",
      },
    },
    states: {
      hover: {
        filter: {
          type: "darken",
          value: 1,
        },
      },
    },
    stroke: {
      show: true,
      width: 0,
      colors: ["transparent"],
    },
    grid: {
      show: false,
      strokeDashArray: 4,
      padding: {
        left: 2,
        right: 2,
        top: -14
      },
    },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    xaxis: {
      floating: false,
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
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
    fill: {
      opacity: 1,
    },
  }
  
  if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("column-chart"), arcoptions);
    chart.render();
  }
  
