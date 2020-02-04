<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/movies" class="btn btn-primary"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
  <h2>Add movie content</h2>
  <p>Create movie content, date of release, and comments</p>
  <form action="<?php echo URLROOT; ?>/movies/add" method="post">

    <div class="form-group">
      <label for="movie_name">MovieName: <sup>*</sup></label>
      <input type="text" name="movie_name" class="form-control form-control-lg <?php echo (!empty($data['movie_name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['movie_name']; ?>">
      <span class="invalid-feedback"><?php echo $data['movie_name_error']; ?></span>
    </div>

    <div class="form-group">
      <label for="date_release">Date of movie released: <sup>*</sup></label>
      <input type="date" value="1950-01-01" name="date_release" class="form-control form-control-lg <?php echo (!empty($data['date_release'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date_release']; ?>">
      <span class="invalid-feedback"><?php echo $data['date_release_error']; ?></span>
    </div>

    <div class="form-group">
      <label for="comments">Comments: <sup>*</sup></label>
      <textarea name="comments" class="form-control form-control-lg <?php echo (!empty($data['comments_error'])) ? 'is-invalid' : ''; ?>"><?php echo $data['comments']; ?></textarea>
      <span class="invalid-feedback"><?php echo $data['comments_error']; ?></span>
    </div>

    <input type="submit" class="btn btn-success" value="Submit">
  </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>