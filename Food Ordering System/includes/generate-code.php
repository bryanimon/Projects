<?php

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
$code_length = 5;

$code = substr(str_shuffle($permitted_chars), 0, $code_length);

print json_encode($code);

?>