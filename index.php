<?php $pagetitle = "labs · Lovell Felix"; $crumbs = "Image uploader"; $url = "/"; $subCrumbs = ""; ?>
<?php include_once ('_inc/header.php'); ?>
<?php include_once ('_inc/breadcrumbs.php'); ?>		
<?php

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

	// Check for an uploaded file:
	if (isset($_FILES['upload'])) {
		
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
		
			// Move the file over.
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "uploads/{$_FILES['upload']['name']}")) {
				echo '<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Success!</strong> The file has been uploaded!
</div>';
			} // End of move... IF.
			
		} else { // Invalid type.
			echo '<div class="alert alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Please upload a JPEG or PNG image.
</div>';
		}

	} // End of isset($_FILES['upload']) IF.
	
	// Check for an error:
	
	if ($_FILES['upload']['error'] > 0) {
		echo '<br />';
	
		// Print a message based upon the error.
		switch ($_FILES['upload']['error']) {
			case 1:
				print '<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong> The file exceeds server upload_max_filesize.
</div>';
				break;
			case 2:
				print '<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong> The file exceeds the MAX_FILE_SIZE allowed.
</div>';
				break;
			case 3:
				print '<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong> The file was only partially uploaded..
</div>';
				break;
			case 4:
				print '<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong> No file was uploaded.
</div>';
				break;
			case 6:
				print '<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong> No temporary folder was available.
</div>';
				break;
			case 7:
				print '<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong> Unable to write to the disk.
</div>';
				break;
			case 8:
				print '<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong> File upload stopped.
</div>';
				break;
			default:
				print '<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong> A system error occurred.
</div>';
				break;
		} // End of switch.
		
		print '</strong></p>';
		
	} // End of error IF.
	
	// Delete the file if it still exists:
	if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
		unlink ($_FILES['upload']['tmp_name']);
	}
			
} // End of the submitted conditional.
?>
	<div class="row">
				<div class="span3">
				<?php include_once ('_inc/nav.php'); ?>
				</div>
				<div class="span9"><div class="bs-post">
<form enctype="multipart/form-data" action="index.php" method="post">

	<input type="hidden" name="MAX_FILE_SIZE" value="524288">
	<div class="form-actions">
<div class="alert alert-info">
  <strong>Ready?</strong> Select a JPEG or PNG image of 512KB or smaller to be uploaded.
</div>
	<legend></legend>
	
	<br /><div class="fileupload">
	<b></b><input type="file" class="btn btn-info" name="upload">
	
	<input type="hidden" name="submitted" value="TRUE" />
	</input><button type="submit" class="btn btn-large btn-success" value="Submit"><i class="icon-plus icon-white"></i>Add Image</button></div>
  <button type="submit" class="btn btn-large  btn-danger" value="Submit">Upload image</button>
</form>
</div>
//


					
					</div></div></div>



<?php include_once ('_inc/footer.php'); ?>