<?php

/**
 * PluginTimezonesToolbox short summary.
 *
 * extends Toolbox logInFile to save timezone in the log files
 *
 * @version 1.0
 * @author morono
 */
class PluginTimezonesToolbox extends Toolbox {
   /**
    * Log a message in log file
    *
    * @param $name   string   name of the log file
    * @param $text   string   text to log
    * @param $force  boolean  force log in file not seeing use_log_in_files config (false by default)
    **/
   static function logInFile($name, $text, $force = false) {
      global $CFG_GLPI;

      $user = '';
      if (method_exists('Session', 'getLoginUserID')) {
         $user = " [".Session::getLoginUserID().'@'.php_uname('n')."]";
      }

      $ok = true;
      if ((isset($CFG_GLPI["use_log_in_files"]) && $CFG_GLPI["use_log_in_files"])
          || $force) {
         $ok = error_log(date("Y-m-d H:i:s e")."$user\n".$text, 3, GLPI_LOG_DIR."/".$name.".log");
      }

      if (isset($_SESSION['glpi_use_mode'])
          && ($_SESSION['glpi_use_mode'] == Session::DEBUG_MODE)
          && isCommandLine()) {
         fwrite(STDERR, $text);
      }
      return $ok;
   }

}

