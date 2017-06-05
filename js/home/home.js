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

var chartUsia;
$.getJSON("dashboard/getDataUsia", function(json) {

    $.each(json, function(i, point){
      point.y = point.data
    });
    chartUsia = new Highcharts.chart('usia', {
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
            text: '<b>USIA</b>',
            useHTML: true
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
            formatter: function() {
            return '<b>'+ this.point.name +'</b> Thn : '+ this.point.data + ' Person';
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
                  name: 'usia',
                  data: json
                }]
    });
});

var chartJenkel;
$.getJSON("dashboard/getDataJenkel", function(json) {

    $.each(json, function(i, point){
      point.y = point.data
    });
    chartJenkel = new Highcharts.chart('jenkel', {
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
            text: '<b>JENIS KELAMIN</b>',
            useHTML: true
        },
        tooltip: {
            // pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
            formatter: function() {
            return '<b>'+ this.point.name +'</b> : '+ this.point.data + ' Person';
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
                  name: 'jenkel',
                  data: json
                }]
    });
});
});
