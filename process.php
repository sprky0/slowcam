<?php

function write_log($s) {
	file_put_contents("/tmp/video_process.log", "{$s}\n");
}

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$extension = "avi";
$width = 640;
$height = 480;

// find oldest file
$files = scandir("videos", SCANDIR_SORT_ASCENDING);

foreach($files as $file) {
	if (substr($file,-3) == $extension) {
		write_log("I think I found {$file}");
		break;
	}
}

if (!is_file("videos/{$file}")) {
	write_log("No file!");
	exit();
}

write_log("Moving videos/{$file} to processing/{$file}");

rename("videos/{$file}","processing/{$file}");

// at this point we should find frame numbers actually
$name = str_replace(".{$extension}","",$file."");

echo $file . "\n";
echo $name . "\n";

$command = "./ffmpeg -i processing/{$file} -s {$width}x{$height} -f image2 -vf fps=fps=30 processing/{$name}_%10d.jpg";

write_log("Going to run ffmpeg to hack up thumbnails now!");

`$command`;

write_log("$file has been processed!");
