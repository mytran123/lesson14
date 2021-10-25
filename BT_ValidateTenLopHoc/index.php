<?php
//Bắt đầu chữ hoa C - A - P
//Theo sau 4 kí tự số
//Kết thúc là 1 trong: G - H - I - K - L - M
//Ko chứa các kí tự đặc biệt
$pattern = '/^[C.A.P][0-9]{4}[G-M]$/';
$subject = '';

$result = preg_match($pattern,$subject);
echo $result;