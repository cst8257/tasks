<?php
require "data.php";
require "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  switch ($_POST['action']) {
    case 'update':
      $errors = [];
      $item = sanitize($_POST);
      $errors = validate($item);

      if (count($errors) === 0) {
        updateItem($item);

        header("Location: index.php");
        exit();
      }
      break;
    case 'delete':
      if (deleteItem($_POST['id'])) {
        header("Location: index.php");
        exit();
      }
      break;
  }
}

if (isset($_GET['id'])) {
  $item = getItem($_GET['id']);

  if (!$item) {
    header("Location: index.php");
  }
} else {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tasks</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
  <main class="container">
    <div class="row">
      <div class="col-6 offset-3">
        <h1 class="display-4 text-center mb-3 p-5">Item</h1>

        <?php if (isset($errors) && count($errors)) : ?>
          <div class="alert alert-danger mb-3">
            <ul class="mb-0">
              <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <form method="post" class="bg-light border border-1 p-4">
          <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
          <input type="hidden" name="action" value="update">
          <div class="form-group mb-3">
            <label class="form-label" for="task">Task</label>
            <input class="form-control" id="task" name="task" value="<?php echo $item['task']; ?>">
          </div>
          <div class="form-group mb-3">
            <input type="checkbox" class="form-check-input me-2" id="completed" name="completed" <?php if (isset($item['completed']) && $item['completed']) : ?>checked<?php endif; ?>>
            <label class="form-check-label" for="completed">Completed</label>
          </div>
          <div class="from-group mb-3">
            <label class="form-label" for="priority">Priority</label>
            <select class="form-select" id="priority" name="priority">
              <?php foreach ($priorities as $val => $priority) : ?>
                <option value="<?php echo $val; ?>" <?php if ($item['priority'] == $val): ?>selected<?php endif; ?>><?php echo $priority; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Update Item</button>
          <a class="btn btn-secondary" href="index.php">Cancel</a>
        </form>

        <form method="post" class="d-flex justify-content-center mt-3">
          <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
          <input type="hidden" name="action" value="delete">
          <button type="submit" class="btn btn-danger">Delete Item</button>
        </form>
      </div>
    </div>
  </main>
</body>

</html>