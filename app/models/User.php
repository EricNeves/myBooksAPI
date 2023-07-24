<?php

class User extends Database
{
  
  private $pdo;

  public function __construct()
  {
    $this->pdo = $this->getConnection();
  }

  public function list($id)
  {
    try {
      $stm = $this->pdo->prepare("SELECT id, name, email FROM users WHERE id = ?");
      $stm->execute([$id]);

      if($stm->rowCount() > 0) {
        return $stm->fetch(PDO::FETCH_ASSOC);
      } else{
        return false;
      }
    } catch(PDOException $err) {
      return false;
    }
  }

  public function create($data)
  {
    try {
      $stm = $this->pdo->prepare("INSERT INTO users (name, email, passwd) VALUES (?, ?, ?)");
      $stm->execute([$data[0], $data[1], password_hash($data[2], PASSWORD_DEFAULT)]);

      return true;
    } catch(PDOException $err) {
      return false;
    }
  }

  public function signIn($data) 
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
      $stm->execute([$data[0]]);

      if ($stm->rowCount() > 0) {
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if (password_verify($data[1], $user['passwd'])) {
          return $user['id'];
        } else {
          return false;
        }
      } else {
        return false;
      }
    } catch (PDOException $err) {
      return false;
    }
  }

  public function emailAlreadyExists($email)
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
      $stm->execute([$email]);

      if($stm->rowCount() > 0) {
        return true;
      } else{
        return false;
      }
    } catch(PDOException $err) {
      return false;
    }
  }

  public function update($data)
  {
    try {
      $stm = $this->pdo->prepare("UPDATE users SET name = ?, passwd = ? WHERE id = ?");
      $stm->execute([$data[0], password_hash($data[1], PASSWORD_DEFAULT), $data[2]]);
      
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