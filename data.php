<?php
$dsn = 'mysql:host=localhost;dbname=tasks';
$username = 'root';
$password = '';

try {
  $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
  echo $e->getMessage();
  exit();
}

$priorities = [
  'None',
  'Low',
  'Medium',
  'High'
];
