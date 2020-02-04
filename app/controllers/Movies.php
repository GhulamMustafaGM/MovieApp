<?php

// Movies class define
class Movies extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }

    $this->movieModel = $this->model('Movie');
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    // Users get movies 
    $movies = $this->movieModel->getMovies();

    $data = [
      'movies' => $movies
    ];

    $this->view('movies/index', $data);
  }

  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Sanitize post array method
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'movie_name' => trim($_POST['movie_name']),
        'date_release' => trim($_POST['date_release']),
        'comments' => trim($_POST['comments']),
        'user_id' => $_SESSION['user_id'],
        'movie_name_error' => '',
        'date_release_error' => '',
        'comments_error' => ''
      ];

      // Users validation data 
      if (empty($data['movie_name'])) {
        $data['movie_name_error'] = 'Please enter movie name';
      }

      if (empty($data['date_release'])) {
        $data['date_release_error'] = ' ';
      }
      if (empty($data['comments'])) {
        $data['comments_error'] = 'Please enter comments';
      }
      // Show errors
      if (empty($data['movie_name_error']) && empty($data['date_release_error']) && empty($data['comments_error'])) {

        // Validation check
        if ($this->movieModel->addMovie($data)) {
          flash('movie_message', 'Movie added successfully');
          redirect('movies');
        } else {
          die('Ooops! Something went wrong?');
        }
      } else {

        // Users load view with errors
        $this->view('movies/add', $data);
      }
    } else {
      $data = [
        'movie_name' => '',
        'date_release' => '',
        'comments' => ''
      ];

      $this->view('movies/add', $data);
    }
  }

  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Sanitize post method array 
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'movie_name' => trim($_POST['movie_name']),
        'date_release' => trim($_POST['date_release']),
        'comments' => trim($_POST['comments']),

        'user_id' => $_SESSION['user_id'],
        'movie_name_error' => '',
        'date_release_error' => '',
        'comments_error' => ''

      ];

      // User validatation data
      if (empty($data['movie_name'])) {
        $data['movie_name_error'] = 'Please enter movie name';
      }

      if (empty($data['date_release'])) {
        $data['date_release_error'] = 'Please enter date of release';
      }

      if (empty($data['comments'])) {
        $data['comments_error'] = 'Please enter comments text';
      }

      // Show errors
      if (empty($data['movie_name_error']) && empty($data['date_release_error']) && empty($data['comments_error'])) {

        // Validation check
        if ($this->movieModel->updateMovie($data)) {
          flash('movie_message', 'Movie updated successfully');
          redirect('movies');
        } else {
          die('Ooops! Something went wrong?');
        }
      } else {

        // Users load view with errors
        $this->view('movies/edit', $data);
      }
    } else {

      // Gain existing movie from model
      $movie = $this->movieModel->getMovieById($id);

      // Check for users
      if ($movie->user_id != $_SESSION['user_id']) {
        redirect('movies');
      }

      $data = [
        'id' => $id,
        'movie_name' => $movie->movie_name,
        'date_release' => $movie->date_release,
        'comments' => $movie->comments

      ];

      $this->view('movies/edit', $data);
    }
  }

  public function show($id)
  {
    $movie = $this->movieModel->getMovieById($id);
    $user = $this->userModel->getUserById($movie->user_id);

    $data = [
      'movie' => $movie,
      'user' => $user
    ];

    $this->view('movies/show', $data);
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Gain existing movie from model
      $movie = $this->movieModel->getMovieById($id);

      // Check for users
      if ($movie->user_id != $_SESSION['user_id']) {
        redirect('movies');
      }

      if ($this->movieModel->deleteMovie($id)) {
        flash('movie_message', 'Movie deleted successfully');
        redirect('movies');
      } else {
        die('Ooops! Something went wrong?');
      }
    } else {
      redirect('movies');
    }
  }
}
