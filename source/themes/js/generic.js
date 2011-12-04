$(document).ready(function() {
	$(".p-load-graph").click(callGraph);
});
function callGraph() {
	$.post(this.href, {}, loadGraph, "text");
	return false;
}
function loadGraph(data) {
	obj = eval('('+data+')');
	barGraph(obj.container, obj.title, obj.categoriesArr, obj.yAxisTitle, obj.seriesName, obj.seriesArr);
}