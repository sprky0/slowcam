<?php

include("common.php");

$file = time();

$time = microtime_float();
$command = "{$wacaw} --video --width {$width} --height {$height} --duration {$duration} \"recording/{$file}\"";

write_log("Going to capture {$duration} seconds of video to file recording/{$file}");

`$command`;

write_log("saved {$file}\n");

rename("recording/{$file}.{$extension}", "videos/{$file}.{$extension}");

write_log("moved to videos\n");
write_log((microtime_float() - $time) . " seconds to execute\n");
