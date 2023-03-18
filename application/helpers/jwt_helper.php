<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Fungsi untuk membuat token JWT
function jwt_encode($data, $secret_key)
{
    $issuedAt = time();
    $expirationTime = $issuedAt + 60 * 60 * 24; // Token berlaku selama 1 hari

    $payload = array(
        'iat' => $issuedAt,
        'exp' => $expirationTime,
        'sub' => $data
    );

    // $jwt = JWT::encode($payload, $secret_key, 'HS256');
    // $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));

    // print_r($jwt);
    // print_r($decoded);
    // exit();

    return JWT::encode($payload, $secret_key, 'HS256');
}

// Fungsi untuk memeriksa validitas token JWT
function jwt_decode($jwt, $secret_key)
{
    return JWT::decode($jwt, new Key($secret_key, 'HS256'));
}

// Fungsi untuk mengambil token dari header Authorization
function getTokenFromHeaders()
{
    $CI =& get_instance();
    $headers = $CI->session->userdata();
    if (isset($headers['token'])) {
        return trim($headers['token']);
    }
    return null;
}
