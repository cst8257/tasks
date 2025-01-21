<div class="list-group-item d-flex justify-content-between">
  <a class="text-black text-decoration-none" href="item.php?id=<?php echo $item['id']; ?>"><?php echo $item['task']; ?></a>
  <div class="fw-bold text-danger text-end">
    <?php for ($i = 0; $i < $item['priority']; $i++) : ?>
      <span>!</span>
    <?php endfor; ?>
  </div>
</div>