<?php

date_default_timezone_set("UTC");

$base = dirname(__FILE__);

$config = array(
	'extension' => "avi",
	'duration' => 60,
	'device' => 0,
	'width' => 640,
	'height' => 480,
	'tmp' => "{$base}/../tmp/",
	'ffmpeg' => "{$base}/../bin/ffmpeg",
	'wacaw' => "{$base}/../bin/wacaw",
	'videos' => "{$base}/../tmp/videos",
	'recording' => "{$base}/../tmp/recording",
	'processing' => "{$base}/../tmp/processing"
);

foreach($config as $k => $v) {
	// constants and global scope
	define(strtoupper($k),$v);
	${$k} = $v;
	switch($k) {
		case "videos":
		case "recording":
		case "processing":
			if (!is_dir($v)) {
				write_log("Missing $v, creating");
				mkdir($v);
			}
		break;
	}
}
