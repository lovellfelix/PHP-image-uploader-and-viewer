<?php $pagetitle = "labs · Lovell Felix"; $crumbs = "Image uploader"; $url = "/"; $subCrumbs = "View Images"; ?>
<?php include_once ('_inc/header.php'); ?>
<?php include_once ('_inc/breadcrumbs.php'); ?>
	<script>
	<!-- // Hide from old browsers.
	
	// Make a pop-up window function:
	function create_window (image, width, height) {
	
		// Add some pixels to the width and height:
		width = width + 10;
		height = height + 10;
		
		// If the window is already open, 
		// resize it to the new dimensions:
		if (window.popup && !window.popup.closed) {
			window.popup.resizeTo(width, height);
		} 
		
		// Set the window properties:
		var specs = "location=no, scrollbars=no, menubars=no, toolbars=no, resizable=yes, left=0, top=0, width=" + width + ", height=" + height;
		
		// Set the URL:
		var url = "show_image.php?image=" + image;
		
		// Create the pop-up window:
		popup = window.open(url, "ImageWindow", specs);
		popup.focus();
		
	} // End of function.
	//--></script>
	<div class="row">
				<div class="span3">
				<?php include_once ('_inc/nav.php'); ?>
				</div>
				<div class="span9"><div class="bs-post">
				<div class="alert alert-success">
  <strong>UPLOADS! </strong> List of image(s) uploaded successfully.
</div>
<p></p>
<table align="center" cellspacing="5" cellpadding="5" border="1">
	<tr>
		<td align="center"><b>Thumbnail</b></td>
		<td align="center"><b>Image Name</b></td>
		<td align="center"><b>Image Size</b></td>
	</tr>
<?php 
// lists the images in the uploads directory.

$dir = 'uploads'; // Define the directory to view.

$files = scandir($dir); // Read all the images into an array.

// Display each image caption as a link to the JavaScript function:
foreach ($files as $image) { 

	if (substr($image, 0, 1) != '.') { // Ignore anything starting with a period.
	
		// Get the image's size in pixels:
		$image_size = getimagesize ("$dir/$image");
		
		// Calculate the image's size in kilobytes:
		$file_size = round ( (filesize ("$dir/$image")) / 1024) . "kb";
		
		// Make the image's name URL-safe:
		$image = urlencode($image);
		
		// Print the information:
		echo "\t<tr>
		\t\t<td><img src=\"$dir/$image\" height=\"175px\" width=\"175px\"></td>
\t\t<td><a href=\"javascript:create_window('$image',$image_size[0],$image_size[1])\">$image</a></td>
\t\t<td>$file_size</td>
\t</tr>\n";
	
	} // End of the IF.
    
} // End of the foreach loop.
?>
</table>
//
</div></div></div>
<?php include_once ('_inc/footer.php'); ?>
