<?php

// Ensure current directory as run command prompt
chdir(dirname($_SERVER["SCRIPT_FILENAME"]));

define('DO_NOT_CHECK_HTTP_REFERER', 1);
include ( "../../../inc/includes.php");

$plug = new Plugin;
if ($plug->isInstalled('timezones')) {
   include_once( '../hook.php' );
   convertDB(true);

} else {
   echo "Plugin 'Timezones' is not installed!\nPlease install it before applying script!\n";
}
