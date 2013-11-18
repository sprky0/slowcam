slowcam
====================

installation
---------------------

First, clone repository to your OS-X machine, with attached webcam.
Assign a cron entry to run every 2 minutes, which will execute the following:

 {install_directory}/cron/php capture.php
 
Assign a cron entry to run every 5 minutes, which will execute the following script, to process the captured avi files into a jpg sequence:

 {install_directory}/cron/php process.php

The default frame size is 640x480, and the default capture rate is intended for a 2 minute interval, but these can be changed in /lib/config.php

