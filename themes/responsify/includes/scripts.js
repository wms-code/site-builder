/* Slider Control */
$(".slides.default").simplecarousel({
	width: 960,
	height: 300,
	visible: 1,
	auto: 8000,
	next: $('.next'),
	prev: $('.previous'),
	pagination: true
});

$(".slides.responsive").simplecarousel({
	width: 720,
	height: 300,
	visible: 1,
	auto: 8000,
	next: $('.next'),
	prev: $('.previous'),
	pagination: true
});

/* List / Grid View Switch */
$("a.grid").click(function () {
	$("#list").css("display","none");
	$("#grid").css("display","block");
	$("li").has("a.grid").addClass("active");
	$("li").has("a.list").removeClass("active");
});

$("a.list").click(function () {
	$("#grid").css("display","none");
	$("#list").css("display","block");
	$("li").has("a.list").addClass("active");
	$("li").has("a.grid").removeClass("active");
});

/* Image Zoom */
$('body').nivoZoom({
	speed:300,
	zoomHoverOpacity:0.8,
	overlay:false,
	overlayColor:'#333',
	overlayOpacity:0.5
});