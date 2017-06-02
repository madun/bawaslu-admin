$(function () {
function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
var chartKotaKab;
$.getJSON('dashboard/getDataKotaKab', function(json) {
  // var dataObj = JSON.parse(json);
    // console.log(Number(dataObj.data[0]));
  $.each(json, function(i, point){
    point.y = point.data
  });

  chartKotaKab = new Highcharts.chart('kotakab', {
    chart: {
        type: 'column'
    },
    credits: {
       enabled: false
    },
    title: {
        text: '<b>KOTA / KAB.</b>'
    },
    // subtitle: {
    //     text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
    // },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: ''
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y} Prs'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Person<br/>'
    },

    series: [{
              name: 'Kota / Kab',
              colorByPoint: true,
              data: json
          }]
  });

});

var chartPendidikan;
$.getJSON("dashboard/getDataPendidikan", function(json) {
      // var dataObj = JSON.parse(json);
        // console.log(Number(dataObj.data[0]));
    $.each(json, function(i, point){
      point.y = point.data
    });
    chartPendidikan = new Highcharts.chart('pendidikan', {
      credits: {
            enabled: false
        },
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            },
            backgroundColor: ''
        },
        title: {
            text: '<b>PENDIDIKAN</b>',
            useHTML: true
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
            formatter: function() {
            return '<b>'+ this.point.name +'</b>: '+ this.point.data + ' Person';
            },
        },
        plotOptions: {
            pie: {
                animation: {
                    duration: 2000,
                    easing: 'easeOutBounce'
                },
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    // enabled: true,
                    // format: '{point.percentage:.2f}%',
                    // distance: -40
                    color: '#000',
                    connectorColor: '#000',
                    formatter: function() {
                    return this.point.data + ' Prs';
                    },
                    distance: -40
                },
                showInLegend: true
            }
        },
        legend: {
            itemStyle:{'color':'#000'}
        },
        series: [{
                  type: 'pie',
                  name: 'Pendidikan',
                  data: json
                }]
    });
});


Highcharts.chart('usia', {
chart: {
    type: 'column'
},
credits: {
   enabled: false
},
title: {
    text: '<b>USIA</b>'
},
// subtitle: {
//     text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
// },
xAxis: {
    type: 'category'
},
yAxis: {
    title: {
        text: ''
    }

},
legend: {
    enabled: false
},
plotOptions: {
    series: {
        borderWidth: 0,
        dataLabels: {
            enabled: true,
            format: '{point.y:.1f}%'
        }
    }
},

tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
},

series: [{
    name: 'Brands',
    colorByPoint: true,
    data: [{
        name: 'Ciamis',
        y: 56.33,
        drilldown: 'Ciamis'
    }, {
        name: 'Cirebon',
        y: 24.03,
        drilldown: 'Cirebon'
    }, {
        name: 'Tasikmalaya',
        y: 10.38,
        drilldown: 'Tasikmalaya'
    }, {
        name: 'Garut',
        y: 4.77,
        drilldown: 'Garut'
    }, {
        name: 'Bogor',
        y: 0.91,
        drilldown: 'Bogor'
    }, {
        name: 'dsb',
        y: 30.0,
        drilldown: null
    }]
}],
drilldown: {
    series: [{
        name: 'Microsoft Internet Explorer',
        id: 'Microsoft Internet Explorer',
        data: [
            [
                'v11.0',
                24.13
            ],
            [
                'v8.0',
                17.2
            ],
            [
                'v9.0',
                8.11
            ],
            [
                'v10.0',
                5.33
            ],
            [
                'v6.0',
                1.06
            ],
            [
                'v7.0',
                0.5
            ]
        ]
    }, {
        name: 'Chrome',
        id: 'Chrome',
        data: [
            [
                'v40.0',
                5
            ],
            [
                'v41.0',
                4.32
            ],
            [
                'v42.0',
                3.68
            ],
            [
                'v39.0',
                2.96
            ],
            [
                'v36.0',
                2.53
            ],
            [
                'v43.0',
                1.45
            ],
            [
                'v31.0',
                1.24
            ],
            [
                'v35.0',
                0.85
            ],
            [
                'v38.0',
                0.6
            ],
            [
                'v32.0',
                0.55
            ],
            [
                'v37.0',
                0.38
            ],
            [
                'v33.0',
                0.19
            ],
            [
                'v34.0',
                0.14
            ],
            [
                'v30.0',
                0.14
            ]
        ]
    }, {
        name: 'Firefox',
        id: 'Firefox',
        data: [
            [
                'v35',
                2.76
            ],
            [
                'v36',
                2.32
            ],
            [
                'v37',
                2.31
            ],
            [
                'v34',
                1.27
            ],
            [
                'v38',
                1.02
            ],
            [
                'v31',
                0.33
            ],
            [
                'v33',
                0.22
            ],
            [
                'v32',
                0.15
            ]
        ]
    }, {
        name: 'Safari',
        id: 'Safari',
        data: [
            [
                'v8.0',
                2.56
            ],
            [
                'v7.1',
                0.77
            ],
            [
                'v5.1',
                0.42
            ],
            [
                'v5.0',
                0.3
            ],
            [
                'v6.1',
                0.29
            ],
            [
                'v7.0',
                0.26
            ],
            [
                'v6.2',
                0.17
            ]
        ]
    }, {
        name: 'Opera',
        id: 'Opera',
        data: [
            [
                'v12.x',
                0.34
            ],
            [
                'v28',
                0.24
            ],
            [
                'v27',
                0.17
            ],
            [
                'v29',
                0.16
            ]
        ]
    }]
}
});

Highcharts.chart('jenkel', {
chart: {
    type: 'column'
},
credits: {
   enabled: false
},
title: {
    text: '<b>JENIS KELAMIN</b>'
},
// subtitle: {
//     text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
// },
xAxis: {
    type: 'category'
},
yAxis: {
    title: {
        text: ''
    }

},
legend: {
    enabled: false
},
plotOptions: {
    series: {
        borderWidth: 0,
        dataLabels: {
            enabled: true,
            format: '{point.y:.1f}%'
        }
    }
},

tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
},

series: [{
    name: 'Brands',
    colorByPoint: true,
    data: [{
        name: 'Ciamis',
        y: 56.33,
        drilldown: 'Ciamis'
    }, {
        name: 'Cirebon',
        y: 24.03,
        drilldown: 'Cirebon'
    }, {
        name: 'Tasikmalaya',
        y: 10.38,
        drilldown: 'Tasikmalaya'
    }, {
        name: 'Garut',
        y: 4.77,
        drilldown: 'Garut'
    }, {
        name: 'Bogor',
        y: 0.91,
        drilldown: 'Bogor'
    }, {
        name: 'dsb',
        y: 30.0,
        drilldown: null
    }]
}],
drilldown: {
    series: [{
        name: 'Microsoft Internet Explorer',
        id: 'Microsoft Internet Explorer',
        data: [
            [
                'v11.0',
                24.13
            ],
            [
                'v8.0',
                17.2
            ],
            [
                'v9.0',
                8.11
            ],
            [
                'v10.0',
                5.33
            ],
            [
                'v6.0',
                1.06
            ],
            [
                'v7.0',
                0.5
            ]
        ]
    }, {
        name: 'Chrome',
        id: 'Chrome',
        data: [
            [
                'v40.0',
                5
            ],
            [
                'v41.0',
                4.32
            ],
            [
                'v42.0',
                3.68
            ],
            [
                'v39.0',
                2.96
            ],
            [
                'v36.0',
                2.53
            ],
            [
                'v43.0',
                1.45
            ],
            [
                'v31.0',
                1.24
            ],
            [
                'v35.0',
                0.85
            ],
            [
                'v38.0',
                0.6
            ],
            [
                'v32.0',
                0.55
            ],
            [
                'v37.0',
                0.38
            ],
            [
                'v33.0',
                0.19
            ],
            [
                'v34.0',
                0.14
            ],
            [
                'v30.0',
                0.14
            ]
        ]
    }, {
        name: 'Firefox',
        id: 'Firefox',
        data: [
            [
                'v35',
                2.76
            ],
            [
                'v36',
                2.32
            ],
            [
                'v37',
                2.31
            ],
            [
                'v34',
                1.27
            ],
            [
                'v38',
                1.02
            ],
            [
                'v31',
                0.33
            ],
            [
                'v33',
                0.22
            ],
            [
                'v32',
                0.15
            ]
        ]
    }, {
        name: 'Safari',
        id: 'Safari',
        data: [
            [
                'v8.0',
                2.56
            ],
            [
                'v7.1',
                0.77
            ],
            [
                'v5.1',
                0.42
            ],
            [
                'v5.0',
                0.3
            ],
            [
                'v6.1',
                0.29
            ],
            [
                'v7.0',
                0.26
            ],
            [
                'v6.2',
                0.17
            ]
        ]
    }, {
        name: 'Opera',
        id: 'Opera',
        data: [
            [
                'v12.x',
                0.34
            ],
            [
                'v28',
                0.24
            ],
            [
                'v27',
                0.17
            ],
            [
                'v29',
                0.16
            ]
        ]
    }]
}
});
});
