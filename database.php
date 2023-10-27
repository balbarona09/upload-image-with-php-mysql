<?php
$host = 'localhost';
$dbname = 'image_upload';
$user = 'root';
$password = 'admin';

$database = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);