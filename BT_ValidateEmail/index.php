<?php

$pattern = '/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/';
$subject1 = 'a@gmail.com';
$subject2 = 'ab@gmail.com';
$subject3 = 'abc@gmail.com';

$subject4 = '@gmail.com';
$subject5 = 'ab@gmail.';
$subject6 = '@#abc@gmail.com';

$result = preg_match($pattern,$subject1);
echo $result;
echo "<br>";
$result = preg_match($pattern,$subject2);
echo $result;
echo "<br>";
$result = preg_match($pattern,$subject3);
echo $result;
echo "<br>";
$result = preg_match($pattern,$subject4);
echo $result;
echo "<br>";
$result = preg_match($pattern,$subject5);
echo $result;
echo "<br>";
$result = preg_match($pattern,$subject6);
echo $result;