<?php

if (!function_exists("checkPasswords")) {
    function checkPasswords($password, $repassword)
    {
        if ($password == $repassword) {
            return true;
        } else {
            return false;
        }
    }
}
