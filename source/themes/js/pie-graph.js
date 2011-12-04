function showPieChart(container, title, slices) {
	chart = new Highcharts.Chart({
	      chart: {
	         renderTo: container,
	         plotBackgroundColor: null,
	         plotBorderWidth: null,
	         plotShadow: false
	      },
	      title: {
	         text: title
	      },
	      tooltip: {
	         formatter: function() {
	            return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage*100)/100 +' %';
	         }
	      },
	      plotOptions: {
	         pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	               enabled: true,
	               color: '#000000',
	               connectorColor: '#000000',
	               formatter: function() {
	                  return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage*100)/100 +' %';
	               }
	            }
	         }
	      },
	       series: [{
	         type: 'pie',
	         name: title,
	         data: slices
	      }]
	   });
}