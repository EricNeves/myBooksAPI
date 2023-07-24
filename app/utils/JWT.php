<?php

class JWT
{
  private $secret_key = SECRET_KEY;

  public function generateJWT($data)
  {
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $payload = json_encode($data);

    $header_encoded = $this->base64url_encode($header);
    $payload_encoded = $this->base64url_encode($payload);

    $signature = $this->signature($header_encoded, $payload_encoded);

    $jwt = "$header_encoded.$payload_encoded.$signature";

    return $jwt;
  }

  public function validateJWT($token) 
  {
    $token = explode('.', $token);

    if (count($token) < 3) {
      return false;
    } 

    $signature = $this->signature($token[0], $token[1]);

    if ($signature !== $token[2]) {
      return false;
    }

    return json_decode($this->base64url_decode($token[1]));
  }

  private function signature($header, $payload)
  {
    $signature = hash_hmac("SHA256", "$header.$payload", $this->secret_key, true);
    return $this->base64url_encode($signature);
  }

  private function base64url_encode($data)
  {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
  }

  private function base64url_decode($data)
  {
    $padding = strlen($data) % 4;

    if ($padding !== 0) {
      $data .= str_repeat('=', 4 - $padding);
    }

    $data = strtr($data, '-_', '+/');

    return base64_decode($data);
  }
}