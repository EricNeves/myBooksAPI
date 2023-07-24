<?php

class Requests
{
  public function getMethod()
  {
    return $_SERVER['REQUEST_METHOD'];
  }

  public function parseBodyInput()
  {
    $method = $this->getMethod();

    switch ($method) {
      case 'GET':
        $data = $_GET;
        break;
      case 'POST':
        $json = json_decode(file_get_contents("php://input"), true);
        is_null($json) ? $data = $_POST : $data = $json;
        break;
      case 'PUT':
      case 'DELETE':
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);
    }

    return $data;
  }
}