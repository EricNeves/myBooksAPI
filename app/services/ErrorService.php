<?php 

class ErrorService
{
  public function index()
  {
    http_response_code(404);
    echo json_encode(["error" => "Sorry, endpoint not found"]);
  }
}