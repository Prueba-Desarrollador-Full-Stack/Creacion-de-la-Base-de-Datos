<?php
  class JwtAuth {
    private $secretKey;

    public function __construct($secretKey) {
        $this->secretKey = $secretKey;
    }

    public function encode(array $payload, $expirationTime) {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];
        $payload['exp'] = $expirationTime;
        $jwt = base64_encode(json_encode($header)) . '.' . base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', $jwt, $this->secretKey, true);
        return $jwt . '.' . base64_encode($signature);
    }

    public function decode($jwt) {
        list($headerEncoded, $payloadEncoded, $signatureEncoded) = explode('.', $jwt);
        $header = json_decode(base64_decode($headerEncoded), true);
        $payload = json_decode(base64_decode($payloadEncoded), true);
        $signature = base64_decode($signatureEncoded);
        $expectedSignature = hash_hmac('sha256', $headerEncoded . '.' . $payloadEncoded, $this->secretKey, true);
        if (hash_equals($expectedSignature, $signature)) {
            return $payload;
        } else {
            return false;
        }
    }
  }
?>