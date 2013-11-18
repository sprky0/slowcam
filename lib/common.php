<?php

function write_log($s) {
	$date = date("Ymd");
	file_put_contents("/tmp/slowcam_{$date}.log", "{$s}\n", FILE_APPEND);
}

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
