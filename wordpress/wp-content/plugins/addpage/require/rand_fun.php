<?php
//Definition of Random Function => This function generates random password or captcha.
function random()
{
$length = rand(9, 12);
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/@#$^&*()~_+-=\|*";

$strlen = strlen($chars);

for($g=0, $result="" ; $g < $length ; $g++)
{
 $index = rand(0, $strlen-1);
 $result .= substr($chars, $index, 1);
}
  return $result;
}

?>
