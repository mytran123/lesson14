<?php
//(xx)-(0xxxxxxxxx)
$pattern = '/^\([0-9]{2}\)-\(0[0-9]{9}\)$/';
$subject1 = '(84)-(0978489648)';
$subject2 = '(a8)-(22222222)';

$result = preg_match($pattern,$subject1);
echo $result;
echo "<br>";
$result = preg_match($pattern,$subject2);
echo $result;
echo "<br>";