<?php
//Cho phép dấu gạch dưới
//Ko chứa kí tự viết hoa
//Ít nhất 6 kí tự
$pattern = '/^[_a-z0-9]{6,}$/';
$subject1 = '123abc_';
$subject2 = '_abc123';
$subject3 = '123456';
$subject4 = '______';
$subject5 = 'abcdefg';

$subject6 = '.@';
$subject7 = '12345';
$subject8 = '1234_';
$subject9 = 'abcde';

$result = preg_match($pattern,$subject1);
echo $result;
echo "<br>";
$result = preg_match($pattern,$subject6);
echo $result;
echo "<br>";