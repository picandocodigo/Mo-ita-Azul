function horizontalBarGraph(container, title, categoriesArr, yAxisTitle, seriesArr) {
	none = new Highcharts.Chart({
      chart: {
         renderTo: container,
         defaultSeriesType: 'bar'
      },
      title: {
         text: title
      },
      xAxis: {
         categories: categoriesArr,
         title: {
            text: null
         }
      },
      yAxis: {
         min: 0,
         title: {
            text: yAxisTitle,
            align: 'high'
         }
      },
      tooltip: {
         formatter: function() {
            return ''+
                this.series.name +': '+ this.y +' $UY';
         }
      },
      plotOptions: {
         bar: {
            dataLabels: {
               enabled: true
            }
         }
      },
      legend: {
         layout: 'vertical',
         align: 'right',
         verticalAlign: 'top',
         x: -100,
         y: 100,
         floating: true,
         borderWidth: 1,
         backgroundColor: '#FFFFFF',
         shadow: true
      },
      credits: {
         enabled: false
      },
      series: seriesArr
   });
}