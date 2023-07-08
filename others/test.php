<?php
const ESC = "\x1b";

echo ESC."@";
echo " \n";
echo " <br>";
// echo 'My username is ' . $_ENV["USER"];
$ip = getenv('REMOTE_ADDR');
echo $ip;
echo "<br>";
echo $_SERVER['REMOTE_ADDR'];
echo "<br>";
// echo $_ENV['REMOTE_ADDR'];
$ipx = getenv('REMOTE_ADDR', true) ?: getenv('REMOTE_ADDR');
echo $ipx;
exit(0);
?>