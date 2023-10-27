<?php
require_once 'isImageValid.php';
require_once 'database.php';
$message = '';
if(!empty($_POST['upload'])) {
  uploadImage();
}

function uploadImage() {
  global $message, $database;
  
  //validate the image
  $imageExtension = validateImage();
  if(!$imageExtension) {
    return;
  }
  
  //create a unique filename.
  do {
    $filename = uniqid('',true) . $imageExtension;
    $filepath = "images/{$filename}";
    clearstatcache();
  } while(file_exists($filepath));

  //upload the file.
  if(!move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
    $message = "<div class='alert alert-danger'>Upload error. Please try again!</div>";
    return;
  }
  
  //insert the filename in database.
  $statement = $database->prepare("INSERT INTO image (original_filename, current_filename)
  VALUES (:original_filename, :current_filename)");
  $statement->bindParam(':original_filename', $_FILES['image']['name']);
  $statement->bindParam(':current_filename', $filename);
  if(!$statement->execute()) {
    $message = "<div class='alert alert-danger'>Upload error. Please try again!</div>";
  }
  
  $message = "<div class='alert alert-success'>Image Successfully uploaded.</div>";
}

function validateImage() {
  global $message;
  
  if(!is_uploaded_file($_FILES['image']['tmp_name'])) {
    $message = "<div class='alert alert-danger'>Please upload an image</div>";
    return false;
  }
  $imageExtension = isImageValid($_FILES['image']['tmp_name']);
  if(!$imageExtension) {
    $message = "<div class='alert alert-danger'>Upload only a .jpeg, .png, or .gif file</div>";
    return false;
  }
  if(filesize($_FILES['image']['tmp_name']) > 2097152) {
    $message = "<div class='alert alert-danger'>File size must not exceed 2MB.</div>";
    return false;
  }
  
  return $imageExtension;
}