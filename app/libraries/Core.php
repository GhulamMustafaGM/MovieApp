<?php

// Declare MovieBlog App core class, URL and loads core controller e.g. (/controller/method/params)
class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    // Declare method e.g. (print-r($this-.getUrl()))
    $url = $this->getUrl();

    // Check controllers for first value
    if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {

      // If exists, set as controller
      $this->currentController = ucwords($url[0]);

      // Declare unset 0 Index
      unset($url[0]);
    }

    // Declare the controller
    require_once '../app/controllers/' . $this->currentController . '.php';

    // Declare controller class
    $this->currentController = new $this->currentController;

    // Declare for second phase of url
    if (isset($url[1])) {

      // Declare to look if method exists in controller
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];

        // Declare unset 1 index
        unset($url[1]);
      }
    }

    // Declare params
    $this->params = $url ? array_values($url) : [];

    // Declare function (call a callback with array of params)
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
