<?php

// @todo make this less messy, globallish and silly

function write_log($s) {
	
	echo __FILE__;
	exit();
	
	file_put_contents("/tmp/video_{$file}.log", "{$s}\n");
}

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

// some global "config" stuff

$extension = "avi";
$duration = 2;
$width = 640;
$width = 480;

$ffmpeg = "./lib/ffmpeg";
$wacaw = "./lib/wacaw";