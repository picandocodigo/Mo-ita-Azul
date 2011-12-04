function barGraph(container, title, categoriesArr, yAxisTitle, seriesName, seriesArr) {
	chart = new Highcharts.Chart({
	      chart: {
	         renderTo: container,
	         defaultSeriesType: 'column',
	         margin: [ 50, 50, 100, 80]
	      },
	      title: {
	         text: title
	      },
	      xAxis: {
	         categories: categoriesArr,
	         labels: {
	            rotation: -45,
	            align: 'right',
	            style: {
	                font: 'normal 13px Verdana, sans-serif'
	            }
	         }
	      },
	      yAxis: {
	         min: 0,
	         title: {
	            text: yAxisTitle
	         }
	      },
	      legend: {
	         enabled: false
	      },
          series: [{
	         name: seriesName,
	         data: seriesArr,
	         dataLabels: {
	            enabled: true,
	            rotation: -90,
	            color: '#FFFFFF',
	            align: 'right',
	            x: -3,
	            y: 10,
	            formatter: function() {
	               return this.y;
	            },
	            style: {
	               font: 'normal 13px Verdana, sans-serif'
	            }
	         }         
	      }]
	   });
}