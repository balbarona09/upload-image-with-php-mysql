<?php
$host = 'localhost';
$dbname = 'image_upload';
$user = 'root';
$password = '';

$database = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);