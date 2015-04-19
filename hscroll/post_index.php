<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	
	<title>Horizontally Scrolling Site from CSS-Tricks</title>
	
	<link rel="stylesheet" href="hscrollstyle.css">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="jquery.mousewheel.js"></script>
	<script>
	$(function(){
		$("#page-wrap").wrapInner("<table cellspacing='30'><tr>");
		$(".post").wrap("<td></td>");
		$("body").mousewheel(function(event, delta) {
			this.scrollLeft -= (delta * 30);
			event.preventDefault();
		});   
	});
	</script>
</head>

<body>
	
	<h1>Horizontally Scrolling Site</h1>

	<div id="page-wrap">
		
		<div class="post">
			<h2>Post Title Example One</h2>
			<p>By <a href="http://css-tricks.com"><strong>CSS</strong>-Tricks</a></p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
			
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
		</div>
		
		<div class="post">
			<h2>Post Title Example Two</h2>
			<p>By <a href="http://css-tricks.com"><strong>CSS</strong>-Tricks</a></p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
		</div>
		
		<div class="post">
			<h2>Post Title Example Three</h2>
			<p>By <a href="http://css-tricks.com"><strong>CSS</strong>-Tricks</a></p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
			
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
		</div>
		
		<div class="post">
			<h2>Post Title Example Four</h2>
			<p>By <a href="http://css-tricks.com"><strong>CSS</strong>-Tricks</a></p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
		</div>
		
		<div class="post">
			<h2>Post Title Example Five</h2>
			<p>By <a href="http://css-tricks.com"><strong>CSS</strong>-Tricks</a></p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
		</div>
		
		<div class="post">
			<h2>Post Title Example Six</h2>
			<p>By <a href="http://css-tricks.com"><strong>CSS</strong>-Tricks</a></p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
			
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
			
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse aliquet arcu a ipsum. Nunc arcu est, pulvinar vitae, consectetuer ac, pellentesque interdum, augue. Fusce iaculis nulla et sapien. Aliquam erat volutpat. Etiam iaculis turpis nec libero. Nam adipiscing ullamcorper quam. Pellentesque erat. Sed hendrerit. Duis id nisl. Cras arcu mauris, mollis vel, convallis non, elementum a, tortor. Donec ac est eget elit consequat sollicitudin. In id odio quis tortor volutpat mollis. Nulla iaculis lobortis est. Pellentesque in elit vitae nulla tempus euismod. Nam non erat in lacus rutrum malesuada. Donec commodo purus sed quam posuere eleifend. Nam accumsan.</p>
		</div>
	
	</div>
	
</body>

</html>