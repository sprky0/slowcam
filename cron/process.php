<?php

include("../lib/common.php");
include("../lib/config.php");

// find oldest file
$files = scandir($videos, SCANDIR_SORT_ASCENDING);

foreach($files as $file) {
	if (substr($file,-3) == $extension) {
		write_log("I think I found {$file}");
		break;
	}
}

if (!is_file("{$videos}/{$file}")) {
	write_log("No file!");
	exit();
}

write_log("Moving {$videos}/{$file} to {$processing}/{$file}");

rename("{$videos}/{$file}","{$processing}/{$file}");

// at this point we should find frame numbers actually, so just have a contiguous set, not random crap names
$name = str_replace(".{$extension}","",$file."");

$command = "{$ffmpeg} -i {$processing}/{$file} -s {$width}x{$height} -f image2 -vf fps=fps=30 {$processing}/{$name}_%10d.jpg";

write_log("Going to run ffmpeg to hack up thumbnails now!");

`$command`;

write_log("$file has been processed!");
