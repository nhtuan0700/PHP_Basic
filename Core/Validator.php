<?php

namespace Core;

class Validator
{
    public static function string($str, $min = 1, $max = INF)
    {
        return strlen(trim($str)) > 0 && strlen(trim($str)) >= $min && strlen(trim($str)) <= $max;
    }

    public static function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
