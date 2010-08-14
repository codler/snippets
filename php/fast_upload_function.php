<?php
/**
 * Upload image
 * @param string $name Name of the file you want
 * @param string $tmp_name Where the file was uploaded $_FILES['image']['tmp_name'];
 * @param string $error if any errors occurred
 * @param string $upload_path Path to save the file
 * @return string|boolean Filename or false
 * @version 1.0 - 2010-08-02
 */
function upload($name, $tmp_name, $error, $upload_path) {
	$valid = true;
	$path = pathinfo($name);
	$extension = $path['extension'];
	// check extension
	if (!in_array(strtolower($extension), array('png', 'gif', 'jpg', 'bmp'))) {
		$valid = false;
	}
	// check real image
	if (getimagesize($tmp_name) == false) {
		$valid = false;
	}
	
	
	$newname = $upload_path.basename($name);
	$i = 0;
	while (file_exists($newname)) {
		$newname = $upload_path.$i.basename($name);
		
		$i++;
	}
	
	
    if ($valid && $error == UPLOAD_ERR_OK && move_uploaded_file($tmp_name,$newname)) {
		return basename($newname);
	} else {
		return false;
	}
}
?>