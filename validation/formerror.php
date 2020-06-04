<?php if(count($errorl) > 0) : ?>

<div class="msg error">
  <?php foreach($errorl as $error): ?>
  <li><?php echo $error; ?></li>
  <?php endforeach; ?>
</div>
  <?php endif; ?>
