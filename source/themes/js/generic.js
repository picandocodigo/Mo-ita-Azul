$(document).ready(function() {
	$(".p-load-graph a").click(callGraph);
});
function callGraph() {
	activeTab(this);
	$.post(this.href, {}, loadGraph, "text");
	return false;
}
function loadGraph(data) {
	obj = eval('('+data+')');
	barGraph(obj.container, obj.title, obj.categoriesArr, obj.yAxisTitle, obj.seriesName, obj.seriesArr);
}
function activeTab(obj) {
	$(".d-load-graph.d-selected", $(obj).parent().parent()).removeClass("d-selected");
	$(obj).parent().addClass("d-selected");
}
function loadHorizontalGraph(data) {
	obj = eval('('+data+')');
	horizontalBarGraph(obj.container, obj.title, obj.categoriesArr, obj.yAxisTitle, obj.seriesArr);
}