<?php

class Authorization
{
  public function getAuthorization()
  {
    $header = getallheaders();

    if (isset($header['Authorization'])) {

      $authorization = $header['Authorization'];

      if (strpos($authorization, 'Bearer') === 0) {

        $token = substr($authorization, 7);

        if (!empty($token)) {
          return $token;

        } else {
          return false;
        }
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}