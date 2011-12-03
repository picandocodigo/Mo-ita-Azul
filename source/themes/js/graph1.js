var chart1; // globally available
$(document).ready(function() {
      
   });
   
function loadChart(title, series){
	chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'bar'
         },
         title: {
            text: title
         },
         xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
         },
         yAxis: {
            title: {
               text: 'Fruit eaten'
            }
         },
         series: series
      });
}
