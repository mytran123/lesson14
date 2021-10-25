<?php
//Bắt đầu chữ hoa C - A - P
//Theo sau 4 kí tự số
//Kết thúc là 1 trong: G - H - I - K - L - M
//Ko chứa các kí tự đặc biệt
$pattern = '/^[C|A|P][0-9]{4}[G|H|I|K|L|M]$/';
$subject1 = 'C0318G';

$subject2 = 'M0318G';
$subject3 = 'P0323A';

$result = preg_match($pattern,$subject1);
echo $result;
echo "<br>";
$result = preg_match($pattern,$subject2);
echo $result;
echo "<br>";
$result = preg_match($pattern,$subject3);
echo $result;
echo "<br>";