$(function() {
	$("#page-wrap").wrapInner("<table cellspacing='30'><tr>");
	$(".post").wrap("<td><p></p></td>");
	$("html,body").mousewheel(function(event, delta) {
	this.scrollLeft -= (delta * 60);
	event.preventDefault();
	});
});
function nextdiv(){
	//document.getElementById("popover-text").style.backgroundColor="transparent";
	 document.getElementById("popover-text").style.display="none";
	 document.getElementById("left").innerHTML ="<div class='up' id='down' onclick='firstDiv()'><b style='cursor:pointer;font-size: 12px;min-width:50px;'>More info</b><span><img src='img/down.png' style='cursor:pointer;margin-left:7px;padding-left:0px;margin-top-10px;background-color: #fff;'></span></div>";
}
function firstDiv(){
	document.getElementById("popover-text").style.display = "block";
	document.getElementById("left").innerHTML ="<div class='down' id='up' onclick='nextdiv()'><b style='cursor:pointer;font-size: 12px;min-width:50px;'>More info</b><span><img src='img/up.png' style='cursor:pointer;margin-left:7px;padding-left:0px;margin-top-10px;background-color: #fff;'></span></div>";
}



	   