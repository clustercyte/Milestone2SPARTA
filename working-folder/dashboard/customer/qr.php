<?php
namespace chillerlan\examp;
use chillerlan\QRCode\QRCode;

include __POS__."assets/qq/vendor/autoload.php";

echo '<img src="'.(new QRCode)->render($id."|".$uid).'" />';
?>