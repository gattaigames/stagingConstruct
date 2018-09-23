<?php

if(!file_exists('userimages/'))
{
	mkdir('userimages',0755,true);
}

	if(isset($_POST['CanvasPic'])){
		$img1 = $_POST['CanvasPic'];
	}
	else {
		$img1 = '';
	}

	if(isset($_POST['name'])){
		$name = $_POST['name'];
	}
	else {
		$name = '';
	}

define('UPLOAD_DIR','userimages/');

	if($img1){
		$img1 = str_replace('data:image/jpeg;base64,','', $img1);
		$img1 = str_replace(',','+', $img1);
		$data1 = base64_decode($img1);
		$file1 = UPLOAD_DIR. $name."_".uniqid().'jpeg';
		$success = file_put_contents($file1, $data1);
	}

print $success ? $file1: "Could not save the file";

?>