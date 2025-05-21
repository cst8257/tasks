<?php
$dsn = 'sqlite:tasks.sqlite';

try {
  $db = new PDO($dsn);
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
