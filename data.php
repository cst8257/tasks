<?php
session_start();

$items = [
  [
    'id' => 1,
    'task' => 'Buy Milk',
    'completed' => false,
    'priority' => 1
  ],
  [
    'id' => 2,
    'task' => 'Feed Cat',
    'completed' => true,
    'priority' => 3
  ],
  [
    'id' => 3,
    'task' => 'Clean Room',
    'completed' => false,
    'priority' => 0
  ]
];

if (isset($_SESSION['items'])) {
  $items = $_SESSION['items'];
} else {
  $_SESSION['items'] = $items;
}

$priorities = [
  'None',
  'Low',
  'Medium',
  'High'
];
