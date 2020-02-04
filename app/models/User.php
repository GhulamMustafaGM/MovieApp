<?php

// Declare user class 
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Declare user regsiter function
  public function register($data)
  {
    $this->db->query('INSERT INTO users (user_name, user_email, password) VALUES(:user_name, :user_email, :password)');

    // Create bind values
    $this->db->bind(':user_name', $data['user_name']);
    $this->db->bind(':user_email', $data['user_email']);
    $this->db->bind(':password', $data['password']);

    // Create and execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Create user login function
  public function login($user_email, $password)
  {
    $this->db->query('SELECT * FROM users WHERE user_email = :user_email');
    $this->db->bind(':user_email', $user_email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Identify user by email 
  public function findUserByEmail($user_email)
  {
    $this->db->query('SELECT * FROM users WHERE user_email = :user_email');

    // Create bind value
    $this->db->bind(':user_email', $user_email);

    $row = $this->db->single();

    // Create and check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Identify User by ID
  public function getUserById($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');

    // Create bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
}
