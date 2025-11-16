<?php

function param_number($value, $errorMessage = "Parameter tidak valid")
{
    if ($value === null || !ctype_digit($value)) {
        http_response_code(400);
        die($errorMessage);
    }
    return (int)$value;
}

function param_enum($value, $allowed, $errorMessage = "Parameter tidak valid")
{
    if (!in_array($value, $allowed)) {
        http_response_code(400);
        die($errorMessage);
    }
    return $value;
}

function validateCsrf($token){
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }

    return hash_equals($_SESSION['csrf_token'], $token);
}

