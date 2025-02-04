<?php
require "data.php";
require "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $item = sanitize([
    'id' => end($items)['id'] + 1,
    'task' => $_POST['task'],
    'completed' => false,
    'priority' => 0
  ]);
  $errors = validate($item);

  if (count($errors) === 0) {
    array_push($items, $item);

    $_SESSION['items'] = $items;
  }
}

$todo = array_filter($items, function ($item) {
  return !$item['completed'];
});

$done = array_filter($items, function ($item) {
  return $item['completed'];
});
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
        <h1 class="display-4 text-center mb-3 p-5">Tasks</h1>

        <form method="post" class="input-group mb-3">
          <input class="form-control" name="task" placeholder="New task...">
        </form>
        <div class="bg-light border border-1 p-4">
          <p class="mb-1 fst-italic">To Do</p>
          <div class="list-group">
            <?php foreach ($todo as $item) : ?>
              <?php require "list-item.php"; ?>
            <?php endforeach; ?>
          </div>

          <p class="mb-1 mt-3 fst-italic">Done</p>
          <div class="list-group">
            <?php foreach ($done as $item) : ?>
              <?php require "list-item.php"; ?>
            <?php endforeach; ?>
          </div>
        </div>

        <?php if (isset($errors) && count($errors)) : ?>
          <div class="alert alert-danger mt-3">
            <ul class="mb-0">
              <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </main>
</body>

</html>