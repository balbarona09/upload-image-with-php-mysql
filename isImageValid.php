<?php
function isImageValid($filename) {
  $type = exif_imagetype($filename);
  
  switch($type) {
    case 1:
      return imagecreatefromgif($filename) ? '.gif' : false;
    case 2:
      return imagecreatefromjpeg($filename) ? '.jpeg' : false;
    case 3:
      return imagecreatefrompng($filename) ? '.png' : false;
    default:
      return false;
  }
}