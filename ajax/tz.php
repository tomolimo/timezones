<?php
// to get the session variables
session_start( ) ;

// to get the timezone with the DST + UTC shift
$tz=(isset($_SESSION['glpitimezone'])?$_SESSION['glpitimezone']:date_default_timezone_get());
$now = new DateTime("now", new DateTimeZone( $tz ) );
$localization = array( 'tz' => $now->format("e (T P)") ) ; 

echo json_encode( $localization, JSON_HEX_APOS | JSON_HEX_QUOT ) ;
