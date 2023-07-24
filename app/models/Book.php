<?php

class Book extends Database
{

  private $pdo;

  public function __construct()
  {
    $this->pdo = $this->getConnection();
  }

  public function list($id)
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM books WHERE user_id = ? ORDER BY id DESC");
      $stm->execute([$id]);
      if($stm->rowCount() > 0) {
        return $stm->fetchAll(PDO::FETCH_ASSOC);
      } else {
        return [];
      }
    } catch (PDOException $err) {
      return false;
    }
  }

  public function create($data)
  {
    try {
      $stm = $this->pdo->prepare("INSERT INTO books (title, year_created, user_id) VALUES (?, ?, ?)");
      $stm->execute([$data[0], (int) $data[1], $data[2]]);

      return true;
    } catch (PDOException $err) {
      return false;
    }
  }

  public function listById($data)
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM books WHERE id = ? AND user_id = ?");
      $stm->execute([$data[0], $data[1]]);
      
      if($stm->rowCount() > 0){
        return $stm->fetch(PDO::FETCH_ASSOC);
      } else {
        return false;
      }
    } catch (PDOException $err) {
      return false;
    }
  }

  public function update($data) 
  {
    try {
      $stm = $this->pdo->prepare("UPDATE books SET title = ?, year_created = ? WHERE id = ? AND user_id = ?");
      $stm->execute([$data[0], $data[1], $data[2], $data[3]]);
      
      if ($stm->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $err) {
      return false;
    }
  }

  public function remove($data) 
  {
    try {
      $stm = $this->pdo->prepare("DELETE FROM books WHERE id = ? AND user_id = ?");
      $stm->execute([$data[0], $data[1]]);
      
      if ($stm->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $err) {
      return false;
    }
  }
}