<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/movies" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light md-5">
  <h2>Update movie content</h2>
  <p>Update movie with this form</p>
  <form action="<?php echo URLROOT; ?>/movies/edit/<?php echo $data['id']; ?>" method="post">
    <div class="form-group">
      <label for="movie_name">MovieName: <sup>*</sup></label>
      <input type="text" name="movie_name" class="form-control form-control-lg <?php echo (!empty($data['movie_name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['movie_name']; ?>">
      <span class="invalid-feedback"><?php echo $data['movie_name_error']; ?></span>
    </div>

    <div class="form-group">
      <label for="date_release">Date of released: <sup>*</sup></label>
      <input type="date" name="date_release" class="form-control form-control-lg <?php echo (!empty($data['date_release_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date_release']; ?>">
      <span class="invalid-feedback"><?php echo $data['date_release_error']; ?></span>
    </div>

    <div class="form-group">
      <label for="body">Comments: <sup>*</sup></label>
      <textarea name="comments" class="form-control form-control-lg <?php echo (!empty($data['comments_error'])) ? 'is-invalid' : ''; ?>"><?php echo $data['comments']; ?></textarea>
      <span class="invalid-feedback"><?php echo $data['comments_error']; ?></span>
    </div>
    <input type="submit" class="btn btn-success" value="Submit">
  </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>