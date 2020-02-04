<?php
// Users class declare
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  // Users registeration function declaration
  public function register()
  {
    // Post method declaration 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Sanitize method declaration and post data 
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Users data declaration
      $data = [
        'user_name' => trim($_POST['user_name']),
        'user_email' => trim($_POST['user_email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'user_name_error' => '',
        'user_email_error' => '',
        'password_error' => '',
        'confirm_password_error' => ''
      ];

      // Check user email validation 
      if (empty($data['user_email'])) {
        $data['user_email_error'] = 'Pleae enter your email';
      } else {
        // Check if user email is already exist
        if ($this->userModel->findUserByEmail($data['user_email'])) {
          $data['user_email_error'] = 'Email is already taken by user';
        }
      }

      // Check name validation
      if (empty($data['user_name'])) {
        $data['user_name_error'] = 'Pleae enter your name';
      }

      // Check validation password
      if (empty($data['password'])) {
        $data['password_error'] = 'Pleae enter your password';
      } elseif (strlen($data['password']) < 8) {
        $data['password_error'] = 'Password must be at least 8 characters';
      }

      // Check confirm password validation 
      if (empty($data['confirm_password'])) {
        $data['confirm_password_error'] = 'Pleae confirm your password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_error'] = 'Ooops! Passwords do not match';
        }
      }

      // Show errors are empty
      if (empty($data['user_email_error']) && empty($data['user_name_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {


        // Users hash password declaration
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Users registeration method
        if ($this->userModel->register($data)) {
          flash('register_success', 'Congratulation! You are now registered and can login');
          redirect('users/login');
        } else {
          die('Ooops! Something went wrong');
        }
      } else {
        // Users load view with errors
        $this->view('users/register', $data);
      }
    } else {
      // Users data declaration 
      $data = [
        'user_name' => '',
        'user_email' => '',
        'password' => '',
        'confirm_password' => '',
        'user_name_error' => '',
        'user_email_error' => '',
        'password_error' => '',
        'confirm_password_error' => ''
      ];

      // Users load view
      $this->view('users/register', $data);
    }
  }

  public function login()
  {
    //  Post method declaration
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Sanitize post data declaration 
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Users data declaration
      $data = [
        'user_email' => trim($_POST['user_email']),
        'password' => trim($_POST['password']),
        'user_email_error' => '',
        'password_error' => '',
      ];

      // Users email validation declaration 
      if (empty($data['user_email'])) {
        $data['email_error'] = 'Pleae enter correct email';
      }

      // Users email validation declaration
      if (empty($data['password'])) {
        $data['password_error'] = 'Please enter correct password';
      }

      // Identify users email 
      if ($this->userModel->findUserByEmail($data['user_email'])) {
      } else {
        // If users not found 
        $data['user_email_error'] = 'Ooops! No user found!';
      }

      // Show errors are empty
      if (empty($data['user_email_error']) && empty($data['password_error'])) {

        // Users email and password with signin 
        $loggedInUser = $this->userModel->login($data['user_email'], $data['password']);

        if ($loggedInUser) {

          // Sessions declaration 
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_error'] = 'Ooops! Wrong Password';

          $this->view('users/login', $data);
        }
      } else {
        // Users load view with errors
        $this->view('users/login', $data);
      }
    } else {
      // Users data declaration
      $data = [
        'user_email' => '',
        'password' => '',
        'user_email_error' => '',
        'password_error' => '',
      ];

      // Users login load view
      $this->view('users/login', $data);
    }
  }

  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->user_email;
    $_SESSION['user_name'] = $user->user_name;
    redirect('movies');
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('users/login');
  }
}
