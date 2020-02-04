<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/movies" class="btn btn-primary"><i class="fa fa-backward"></i> Back</a>
<br>
<br>

<h1><?php echo $data['movie']->movie_name; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
  Movie content added by <?php echo $data['user']->user_name; ?> on <?php echo $data['movie']->created_at; ?>
</div>

<h1><?php echo $data['movie']->movie_name; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
Date of movie released: <?php echo $data['movie']->date_release; ?>
</div>

<p><?php echo $data['movie']->comments; ?></p>

<?php if ($data['movie']->user_id == $_SESSION['user_id']) : ?>
  <hr>
  <a href="<?php echo URLROOT; ?>/movies/edit/<?php echo $data['movie']->id; ?>" class="btn btn-primary">Update movie content</a>

  <form class="pull-right" action="<?php echo URLROOT; ?>/movies/delete/<?php echo $data['movie']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>