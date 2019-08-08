<?php 

include "functions.php";
require_once ("connection.php");

$po = new Po;

$month_31days = [1,3,5,7,8,10,12];
$month_30days = [4,6,9,11];

function isKabisat($y) {
    if ($y % 4 == 0 || ($y % 400 == 0 && $y % 100 != 0)) {
        return true;
    } else {
        return false;
    }
}

function checkday($m, $y) {
    if (in_array($m, $month_30days)) {
        return 30;
    } elseif (in_array($m, $month_31days)) {
        return 31;
    } else {
        if (isKabisat($y)) {
            return 29;
        } else {
            return 28;
        }
    }
}

date_default_timezone_set('Asia/Jakarta');

$timestamp = date('d/m/Y h:i:s a', time());
$timestamp = explode(" ", $timestamp);
$date = $timestamp[0];
$date = explode("/", $date);

$d = $date[0]+0;
$mo = $date[1]+0;
$y = $date[2]+0;

$time = explode(':', $timestamp[1]);
$h = $time[0]+0;
$m = $time[1]+0;
$s = $time[2]+0;

if ($timestamp[2] == "am") {
    $time_to_next_day = 24*3600 - ($h*3600 + $m*60 + $s);
} else {
    $time_to_next_day = 24*3600 - ($h*3600 + $m*60 + $s + 12*3600);
}

$po = new Po;
$days = NULL;
$poStatus = $po->getPoStatus();

$po_closed = $poStatus['po_closed'];
$po_closed = explode("/", $po_closed);
$po_closed = [$po_closed[2]+0, $po_closed[1]+0, $po_closed[0]+0];

if ($y == $po_closed[2]) {

    if ($mo == $po_closed[1]) {
        $days += ($po_closed[0] - $d);
    } else {

        $days = checkday($mo, $y) - $d;

        for ($i = ($mo+1); $i < $po_closed[1]; $i++) {
            $days += checkday($i, $y);
        }
    
        if ($mo != $po_closed[1]) {
            $days += $po_closed[0];
        }
    }

} else {

    $days = checkday($mo, $y) - $d;

    for ($i = $mo+1; $i <= 12 ; $i++) {
        $days += checkday($i, $y);
    }

    for ($i = 1; $i < $po_closed[1]; $i++) {
        $days += checkday($i, $po_closed[2]);
    }

    $days += $po_closed[0];
}


$s = $time_to_next_day + $days*24*3600;
$m = $s/60;
$h = $m/60;
$d = $h/24;

if ($s > 0) {
    if ($d >= 1) {
        echo "Tersisa ".floor($d)." hari ".floor($h-floor($d)*24)." jam";
    } else {
        if ($h >= 1) {
            echo "Tersisa ".floor($h)." jam ".floor($m-floor($h)*60)." menit";
        } else {
            echo "Tersisa ".floor($m)." menit ".floor($s-floor($m)*60)." detik";
        }
    }
} else {
    $po->closePo();
}

?>