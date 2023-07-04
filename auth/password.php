<?php
if (!function_exists('password_hash')) {
    function password_hash($password, $algorithm = PASSWORD_DEFAULT, $options = []) {
        return hash($algorithm, $password);
    }
}

if (!function_exists('password_verify')) {
    function password_verify($password, $hash) {
        return hash_equals($hash, hash(PASSWORD_DEFAULT, $password));
    }
}
?>
