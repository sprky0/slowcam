<?php

function write_log($s) {
	file_put_contents("/tmp/video_capture.log", "{$s}\n");
}

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$file = time();
$extension = "avi";
$duration = 2;
$width = 640;
$width = 480;

$time = microtime_float();
$command = "./wacaw --video --width {$width} --height {$height} --duration {$duration} \"recording/{$file}\"";

write_log("Going to capture {$duration} seconds of video to file recording/{$file}");

`$command`;

write_log("saved {$file}\n");

rename("recording/{$file}.{$extension}", "videos/{$file}.{$extension}");

write_log("moved to videos\n");
write_log((microtime_float() - $time) . " seconds to execute\n");
