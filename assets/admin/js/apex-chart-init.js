

// apex-timeline-chart js 
var options = {
  chart: {
    type: "area",
    height: 320,
    foreColor: "#999",
    stacked: true,
    dropShadow: {
      enabled: true,
      enabledSeries: [0],
      top: -2,
      left: 2,
      blur: 5,
      opacity: 0.06
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#00E396', '#0090FF'],
  stroke: {
    curve: "smooth",
    width: 3
  },
  dataLabels: {
    enabled: false
  },
  series: [{
    name: 'Total Views',
    data: generateDayWiseTimeSeries(0, 18)
  }, {
    name: 'Unique Views',
    data: generateDayWiseTimeSeries(1, 18)
  }],
  markers: {
    size: 0,
    strokeColor: "#fff",
    strokeWidth: 3,
    strokeOpacity: 1,
    fillOpacity: 1,
    hover: {
      size: 6
    }
  },
  xaxis: {
    type: "datetime",
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    }
  },
  yaxis: {
    labels: {
      offsetX: 14,
      offsetY: -5
    },
    tooltip: {
      enabled: true
    }
  },
  grid: {
    padding: {
      left: 5,
      right: 5
    },
    xaxis: {
      lines: {
          show: false
      }
    },   
    yaxis: {
      lines: {
          show: false
      }
    }, 
  },
  tooltip: {
    x: {
      format: "dd MMM yyyy"
    },
  },
  legend: {
    position: 'top',
    horizontalAlign: 'left'
  },
  fill: {
    type: "solid",
    fillOpacity: 0.7
  }
};

var chart = new ApexCharts(document.querySelector("#apex-timeline-chart"), options);

chart.render();

function generateDayWiseTimeSeries(s, count) {
  var values = [[
    4,3,10,9,29,19,25,9,12,7,19,5,13,9,17,2,7,5
  ], [
    2,3,8,7,22,16,23,7,11,5,12,5,10,4,15,2,6,2
  ]];
  var i = 0;
  var series = [];
  var x = new Date("11 Nov 2012").getTime();
  while (i < count) {
    series.push([x, values[s][i]]);
    x += 86400000;
    i++;
  }
  return series;
}

// apex-bar-chart js 
var options = {
  series: [{
  name: 'Net Profit',
  data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
}, {
  name: 'Revenue',
  data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
}, {
  name: 'Free Cash Flow',
  data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
}],
  chart: {
  type: 'bar',
  height: 450,
  toolbar: {
    show: false
  }
},
plotOptions: {
  bar: {
    horizontal: false,
    columnWidth: '55%',
    endingShape: 'rounded'
  },
},
dataLabels: {
  enabled: false
},
stroke: {
  show: true,
  width: 2,
  colors: ['transparent']
},
xaxis: {
  categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
},
yaxis: {
  title: {
    text: '$ (thousands)'
  }
},
fill: {
  opacity: 1
},
tooltip: {
  y: {
    formatter: function (val) {
      return "$ " + val + " thousands"
    }
  }
}
};

var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
chart.render();

// apex-gradi-line-chart
var options = {
  series: [{
  name: 'Likes',
  data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
}],
  chart: {
  height: 450,
  type: 'line',
  toolbar: {
    show: false
  }
},
stroke: {
  width: 7,
  curve: 'smooth'
},
xaxis: {
  type: 'datetime',
  categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
},
fill: {
  type: 'gradient',
  gradient: {
    shade: 'dark',
    gradientToColors: [ '#FDD835'],
    shadeIntensity: 1,
    type: 'horizontal',
    opacityFrom: 1,
    opacityTo: 1,
    stops: [0, 100, 100, 100]
  },
},
markers: {
  size: 4,
  colors: ["#FFA41B"],
  strokeColors: "#fff",
  strokeWidth: 2,
  hover: {
    size: 7,
  }
},
yaxis: {
  min: -10,
  max: 40,
  title: {
    text: 'Engagement',
  },
}
};

var chart = new ApexCharts(document.querySelector("#apex-gradi-line-chart"), options);
chart.render();

// apex-pie-chart js
var options = {
  series: [44, 55, 41, 17, 15],
  chart: {
    height: 350,
    type: 'donut',
},
responsive: [{
  breakpoint: 480,
  options: {
    chart: {
      width: 200
    },
    legend: {
      position: 'bottom'
    }
  }
}]
};

var chart = new ApexCharts(document.querySelector("#apex-pie-chart"), options);
chart.render();

// apex-radar-chart js 
var options = {
  series: [44, 55, 67, 83],
  chart: {
  height: 350,
  type: 'radialBar',
},
plotOptions: {
  radialBar: {
    dataLabels: {
      name: {
        fontSize: '22px',
      },
      value: {
        fontSize: '16px',
      },
      total: {
        show: true,
        label: 'Total',
        formatter: function (w) {
          // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
          return 249
        }
      }
    }
  }
},
labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
};

var chart = new ApexCharts(document.querySelector("#apex-radar-chart"), options);
chart.render();


// apex-circle-chart js 
var options = {
  series: [76, 67, 61, 90],
  chart: {
  height: 350,
  type: 'radialBar',
},
plotOptions: {
  radialBar: {
    offsetY: 0,
    startAngle: 0,
    endAngle: 270,
    hollow: {
      margin: 5,
      size: '30%',
      background: 'transparent',
      image: undefined,
    },
    dataLabels: {
      name: {
        show: true,
      },
      value: {
        show: true,
      }
    }
  }
},
colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
labels: ['Vimeo', 'Messenger', 'Facebook', 'LinkedIn'],
legend: {
  show: true,
  floating: true,
  fontSize: '16px',
  position: 'left',
  offsetX: -25,
  offsetY: 15,
  labels: {
    useSeriesColors: true,
  },
  markers: {
    size: 0
  },
  formatter: function(seriesName, opts) {
    return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
  },
  itemMargin: {
    vertical: 3
  }
},
responsive: [{
  breakpoint: 480,
  options: {
    legend: {
        show: false
    }
  }
}]
};

var chart = new ApexCharts(document.querySelector("#apex-circle-chart"), options);
chart.render();


// apex-simple-circle-chart js 
var options = {
  series: [75],
  chart: {
    height: 235,
    type: 'radialBar',
  },
plotOptions: {
  radialBar: {
    hollow: {
      size: '75%',
    },
    track: {
      background: '#fff',
      strokeWidth: '100%',
      margin: 0, // margin is in pixels
      dropShadow: {
        enabled: true,
        top: -3,
        left: 0,
        blur: 4,
        opacity: 0.1
      }
    }
  },
},
fill: {
  colors: '#7367f0',
  type: 'solid'
},
labels: ['Cricket'],
};

var chart = new ApexCharts(document.querySelector("#apex-simple-circle-chart"), options);
chart.render();


// apex-radialBar-chart js 
var options = {
  series: [67],
  chart: {
  height: 200,
  type: 'radialBar',
  offsetY: -10
},
plotOptions: {
  radialBar: {
    startAngle: -135,
    endAngle: 135,
    dataLabels: {
      name: {
        fontSize: '16px',
        color: undefined,
        offsetY: 120
      },
      value: {
        offsetY: 76,
        fontSize: '22px',
        color: undefined,
        formatter: function (val) {
          return val + "%";
        }
      }
    }
  }
},
fill: {
  type: 'gradient',
  gradient: {
      shade: 'dark',
      shadeIntensity: 0.15,
      inverseColors: false,
      opacityFrom: 1,
      opacityTo: 1,
      stops: [0, 50, 65, 91]
  },
},
stroke: {
  dashArray: 4
},
labels: ['Median Ratio'],
};

var chart = new ApexCharts(document.querySelector("#apex-radialBar-chart"), options);
chart.render();


// apex-half-radialBar-chart js 
var options = {
  series: [76],
  chart: {
    height: 490,
    type: 'radialBar',
    offsetY: -20,
    sparkline: {
      enabled: true
    }
},
plotOptions: {
  radialBar: {
    startAngle: -90,
    endAngle: 90,
    track: {
      background: "#e7e7e7",
      strokeWidth: '97%',
      margin: 5, // margin is in pixels
      dropShadow: {
        enabled: true,
        top: 2,
        left: 0,
        color: '#999',
        opacity: 1,
        blur: 2
      }
    },
    dataLabels: {
      name: {
        show: false
      },
      value: {
        offsetY: -2,
        fontSize: '22px'
      }
    }
  }
},
grid: {
  padding: {
    top: -10
  }
},
fill: {
  type: 'gradient',
  gradient: {
    shade: 'light',
    shadeIntensity: 0.4,
    inverseColors: false,
    opacityFrom: 1,
    opacityTo: 1,
    stops: [0, 50, 53, 91]
  },
},
labels: ['Average Results'],
};

var chart = new ApexCharts(document.querySelector("#apex-half-radialBar-chart"), options);
chart.render();