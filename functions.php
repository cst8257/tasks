<?php

function sanitize($data)
{
  foreach ($data as $key => $value) {
    switch ($key) {
      case 'priority':
        $data[$key] = (int)$data[$key];
        break;
      case 'completed':
        $data[$key] = isset($data[$key]);
        break;
      default:
        $data[$key] = htmlspecialchars(stripslashes(trim($value)));
    }
  }

  return $data;
}

// task is required | must be at least 3 characters
// priority | must be an int
function validate($item)
{
  $fields = ['task', 'priority'];
  $errors = [];

  foreach ($fields as $field) {
    switch ($field) {
      case 'task':
        if (empty($item[$field])) {
          $errors[$field] = 'Task is required';
        } elseif (strlen($item[$field]) < 3) {
          $errors[$field] = 'Task must be at least 3 characters';
        }
        break;
      case 'priority':
        if (filter_var(intval($item[$field]), FILTER_VALIDATE_INT) === false) {
          $errors[$field] = 'Priority must be a number';
        } elseif ($item[$field] < 0 || $item[$field] > 3) {
          $errors[$field] = 'Priority must be between 0 and 3';
        }
        break;
    }
  }


  return $errors;
}
