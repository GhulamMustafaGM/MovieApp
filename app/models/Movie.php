<?php

// Declare Movie class
class Movie
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getMovies()
  {
    $this->db->query('SELECT *,
    movies.id as movieId,
      users.id as userId,
      movies.created_at as movieCreated,
      users.created_at as userCreated
      FROM movies
      INNER JOIN users
      ON movies.user_id = users.id
      ORDER BY movies.created_at DESC
      ');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addMovie($data)
  {
    $this->db->query('INSERT INTO movies (movie_name, date_release, user_id, comments) VALUES(:movie_name, :date_release, :user_id, :comments)');
    // Create bind values
    $this->db->bind(':movie_name', $data['movie_name']);
    $this->db->bind(':date_release', $data['date_release']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':comments', $data['comments']);

    // Declare and execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateMovie($data)
  {
    $this->db->query('UPDATE movies SET movie_name = :movie_name, date_release = :date_release, comments = :comments WHERE id = :id');
    // Create bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':movie_name', $data['movie_name']);
    $this->db->bind(':date_release', $data['date_release']);
    $this->db->bind(':comments', $data['comments']);


    // Create and execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getMovieById($id)
  {
    $this->db->query('SELECT * FROM movies WHERE id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function deleteMovie($id)
  {
    $this->db->query('DELETE FROM movies WHERE id = :id');
    // Create bind values
    $this->db->bind(':id', $id);

    // Create and execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
