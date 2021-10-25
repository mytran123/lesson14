<?php
//(xx)-(0xxxxxxxxx)
$pattern = '/^\d{2}\-\[0-9]{10}+$/';
$subject = '';

$result = preg_match($pattern,$subject);
echo $result;