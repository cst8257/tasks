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
        if (filter_var($item[$field], FILTER_VALIDATE_INT) === false) {
          $errors[$field] = 'Priority must be a number';
        } elseif ($item[$field] < 0 || $item[$field] > 3) {
          $errors[$field] = 'Priority must be between 0 and 3';
        }
        break;
    }
  }


  return $errors;
}

/**
 * getItems
 * @param {bool} completed status
 * @return {array} items
 */
function getItems($completed)
{
  global $items;

  return array_filter($items, function ($item) use ($completed) {
    return $item['completed'] === $completed;
  });
}

/**
 * getItem
 * @param {string} item id
 * @return {array} item
 */
function getItem($id)
{
  global $items;

  return current(array_filter($items, function ($item) use ($id) {
    return $item['id'] == $id;
  }));
}

/**
 * addItems
 * @param {array} item
 * @return {int} id
 */
function addItem($item)
{
  global $items;
  $id = end($items)['id'] + 1;

  array_push($items, [
    'id' => end($items)['id'] + 1,
    'task' => $_POST['task'],
    'completed' => false,
    'priority' => 0
  ]);

  $_SESSION['items'] = $items;
  return $id;
}

/**
 * updateItem
 * @param {array} item
 * @return {int} item id
 */
function updateItem($item)
{
  global $items;

  $items = array_map(function ($i) use ($item) {
    if ($i['id'] == $item['id']) {
      return [
        'id' => $item['id'],
        'task' => $item['task'],
        'completed' => isset($item['completed']),
        'priority' => (int)$item['priority']
      ];
    }
    return $i;
  }, $items);

  $_SESSION['items'] = $items;
  return $item['id'];
}

/**
 * deleteItem
 * @param {int} item id
 * @return {bool} item deleted successfully
 */
function deleteItem($id)
{
  global $items;

  $index = array_key_first(array_filter($items, function ($item) use ($id) {
    return $item['id'] == $id;
  }));

  unset($items[$index]);

  $_SESSION['items'] = $items;

  return !isset($items[$index]);
}
