$(document).ready(function() {
	$(".p-load-graph a").click(callGraph);
	$(".p-tab").each(function() {
		if (!$(this).hasClass("p-tab-1"))
			$(this).addClass("d-invisible");
	});
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
function loadPieGraph(data) {
	obj = eval('('+data+')');
	showPieChart(obj.container, obj.title, obj.slices);
}
function switchTab(tab, obj) {
	$(".d-tab-menu div").each(function() {
		$(this).removeClass("d-selected");
	});
	$(obj).parent().addClass("d-selected");
	$(".p-tab", $(obj).parents(".p-tab-container")).each(function() {
		if (!$(this).hasClass("d-invisible"))
			$(this).addClass("d-invisible");
	});
	$(".p-tab-"+tab).removeClass("d-invisible");
	return false;
}