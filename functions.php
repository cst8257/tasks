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
  global $db;

  $sql = "SELECT * FROM items WHERE completed = :completed";
  $stmt = $db->prepare($sql);
  $stmt->execute([":completed" => $completed]);

  return $stmt->fetchAll();
}

/**
 * getItem
 * @param {string} item id
 * @return {array} item
 */
function getItem($id)
{
  global $db;
  $sql = "SELECT * FROM items WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->execute([':id' => $id]);

  return $stmt->fetch();
}

/**
 * addItems
 * @param {array} item
 * @return {int} id
 */
function addItem($item)
{
  global $db;

  $sql = "INSERT INTO items (task, completed, priority) VALUES (:task, :completed, :priority)";
  $stmt = $db->prepare($sql);
  $stmt->execute([
    ':task' => $item['task'],
    ':completed' => isset($item['completed']) ? 1 : 0,
    ':priority' => $item['priority']
  ]);

  return $db->lastInsertId();
}

/**
 * updateItem
 * @param {array} item
 * @return {int} item id
 */
function updateItem($item)
{

  global $db;

  $sql = "UPDATE items SET task = :task, completed = :completed, priority = :priority WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->execute([
    ':task' => $item['task'],
    ':completed' => isset($item['completed']) ? 1 : 0,
    ':priority' => $item['priority'],
    ':id' => $item['id']
  ]);

  return $item['id'];
}

/**
 * deleteItem
 * @param {int} item id
 * @return {bool} item deleted successfully
 */
function deleteItem($id)
{
  global $db;

  $sql = "DELETE FROM items WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->execute([':id' => $id]);

  return $stmt->rowCount() === 1;
}
