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

        <form method="post" class="bg-light border border-1 p-4">
          <div class="form-group mb-3">
            <label class="form-label" for="task">Task</label>
            <input class="form-control" id="task" name="task" value="Buy Milk">
          </div>
          <div class="form-group mb-3">
            <input type="checkbox" class="form-check-input me-2" id="completed" name="completed">
            <label class="form-check-label" for="completed">Completed</label>
          </div>
          <div class="from-group mb-3">
            <label class="form-label" for="priority">Priority</label>
            <select class="form-select" id="priority" name="priority">
              <option value="0">None</option>
              <option value="1" selected>Low</option>
              <option value="2">Medium</option>
              <option value="3">High</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Update Item</button>
          <a class="btn btn-secondary" href="index.php">Cancel</a>
        </form>

      </div>
    </div>
  </main>
</body>

</html>