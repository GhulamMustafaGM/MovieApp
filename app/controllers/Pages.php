<?php

// Pages class declare
class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    if (isLoggedIn()) {
      redirect('movies');
    }

    $data = [
      'title' => 'Welcome to MovieAppDatabase',
      'description' => 'Users can create, read, update, delete (MovieAppDatabase) on network'
    ];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About MovieAppDatabase',
      'description' => 'MovieAppDatabase is movie content app where
      users can share movie name, date of movie released, comments, and movie content with other users on network.'
    ];

    $this->view('pages/about', $data);
  }
}
