<?php

//include ('stuff.php');

$ip = getenv("REMOTE_ADDR");
$date=date("D M d, Y g:i a");
$item1='FLIGHT TO LAGOS 9AM SEPTEMBER 26TH 2014';
$item2='ARIK AIR';
$item3='TOTAL N19,850';

$message = '';
$message .= "TRAVELNOW LOGISTICS RECEIPT";
$message .= "-------------------------------\n";
$message .= "   PAYMENT RECEIPT  \n";
$message .= "ITEM Name    : ".$item1."\n";
$message .= "ITEM Name    : ".$item2."\n";
$message .= "ITEM Name    : ".$item3."\n";
$message .= "IP Address   : ".$ip."\n";
$message .= "-------------------------------\n";
$message .= "RECEIPT GENERATED: ".$date."\n";
$message .= "Thank you for shopping with us.\n";
$message .= "Please call again!\n";
$message .= "Powered by WEBPLAY NIGERIA LTD\n";

$texttoprint = $message;
$unline = "I am underlined\n";
$bold = "I am bold\n";
//$texttoprint = stripslashes($texttoprint);

$fp = fsockopen("192.168.1.100", "9100", $errno, $errstr, 10);
if (!$fp) {
echo "$errstr ($errno)<br />\n";
} else {
fwrite($fp, "\033\100");
$out = $texttoprint;
fwrite($fp, $out);
fwrite($fp, "\033\055\001");
fwrite($fp, $unline);
fwrite($fp, "\033\055\000");
fwrite($fp, "\033\105\001");
fwrite($fp, $bold);
fwrite($fp, "\033\105\000");
fwrite($fp, "\012\012\012\012\012\012\012\012\012\033\151\010\004\001");
fclose($fp);
}

?>