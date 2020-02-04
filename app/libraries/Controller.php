<?php

// Declare base controller, loads the models, and views 
class Controller
{
  // Declare load model
  public function model($model)
  {
    // Declare and require model file
    require_once '../app/models/' . $model . '.php';

    // Model declaration
    return new $model();
  }

  // Declare load view
  public function view($view, $data = [])
  {
    // View file declaration
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      // If view does not exist
      die('View does not exist');
    }
  }
}
