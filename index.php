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
            <div class="list-group-item d-flex justify-content-between">
              <a class="text-black text-decoration-none" href="item.php">Buy Milk</a>
              <div class="fw-bold text-danger text-end">
                <span>!</span>
              </div>
            </div>
          </div>

          <p class="mb-1 mt-3 fst-italic">Done</p>
          <div class="list-group">
            <div class="list-group-item d-flex justify-content-between">
              <a class="text-black text-decoration-none" href="item.php">Feed Cat</a>
              <div class="fw-bold text-danger text-end">
                <span>!</span>
                <span>!</span>
                <span>!</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>