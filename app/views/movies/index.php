<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('movie_message'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Movies content</h1>
  </div>
  <div class="col-md-6">
    <a href="<?php echo URLROOT; ?>/movies/add" class="btn btn-primary pull-right">
      <i class="fa fa-pencil"></i> Add Movie content
    </a>
  </div>
</div>
<?php foreach ($data['movies'] as $movie) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $movie->movie_name; ?></h4>
    <div class="bg-light p-2 mb-3">
      Movie content added by: <?php echo $movie->user_name; ?> on <?php echo $movie->movieCreated; ?>
    </div>

    <div class="bg-light p-2 mb-3">
      Date of movie released: <?php echo $movie->date_release; ?>
    </div>

    <p class="card-text"><?php echo $movie->comments; ?></p>
    <a href="<?php echo URLROOT; ?>/movies/show/<?php echo $movie->movieId; ?>" class="btn btn-info">Update or Delete? Movie content or Comments</a>
  </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>