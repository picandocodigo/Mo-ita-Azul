var chart1;
// globally available
$(document).ready(function() {

});
function loadChart(title, series, xvalues, yAxis_title) {
    chart1 = new Highcharts.Chart({
        chart : {
            renderTo : 'container',
            type : 'column'
        },
        title : {
            text : title
        },
        xAxis : {
            categories : xvalues
        },
        tooltip : {
            formatter : function() {
                return '<b>' + this.series.name + '</b><br/>'
                +  ' $ ' + this.y + '<br/>';
            }
        },

        yAxis : {
            allowDecimals : false,
            min : 0,
            title : {
                text : yAxis_title
            }
        },
        series : series
    });
}