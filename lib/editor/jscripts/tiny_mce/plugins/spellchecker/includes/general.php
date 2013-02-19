<?php
@error_reporting(E_ALL ^ E_NOTICE);
$config = array();
require_once(dirname(__FILE__) . "/../classes/utils/Logger.php");
require_once(dirname(__FILE__) . "/../classes/utils/JSON.php");
require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/../classes/SpellChecker.php");
if (isset($config['general.lib'])) require_once(dirname(__FILE__) . "/../classes/" . $config["general.lib"] . ".php");
function getRequestParam($name, $default_value = false, $sanitize = false)
{
    if (!isset($_REQUEST[$name])) return $default_value;
    if (is_array($_REQUEST[$name])) {
        $newarray = array();
        foreach ($_REQUEST[$name] as $name => $value) $newarray[formatParam($name, $sanitize)] = formatParam($value, $sanitize);
        return $newarray;
    }
    return formatParam($_REQUEST[$name], $sanitize);
}

function &getLogger()
{
    global $mcLogger, $man;
    if (isset($man)) $mcLogger = $man->getLogger();
    if (!$mcLogger) {
        $mcLogger = new Moxiecode_Logger();
        $mcLogger->setPath(dirname(__FILE__) . "/../logs");
        $mcLogger->setMaxSize("100kb");
        $mcLogger->setMaxFiles("10");
        $mcLogger->setFormat("{time} - {message}");
    }
    return $mcLogger;
}

function debug($msg)
{
    $args = func_get_args();
    $log = getLogger();
    $log->debug(implode(', ', $args));
}

function info($msg)
{
    $args = func_get_args();
    $log = getLogger();
    $log->info(implode(', ', $args));
}

function error($msg)
{
    $args = func_get_args();
    $log = getLogger();
    $log->error(implode(', ', $args));
}

function warn($msg)
{
    $args = func_get_args();
    $log = getLogger();
    $log->warn(implode(', ', $args));
}

function fatal($msg)
{
    $args = func_get_args();
    $log = getLogger();
    $log->fatal(implode(', ', $args));
}

?>