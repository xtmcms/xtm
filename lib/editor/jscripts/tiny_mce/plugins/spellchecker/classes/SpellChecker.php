<?php
class SpellChecker
{
    function SpellChecker(&$config)
    {
        $this->_config = $config;
    }

    function &loopback()
    {
        return func_get_args();
    }

    function &checkWords($lang, $words)
    {
        return $words;
    }

    function &getSuggestions($lang, $word)
    {
        return array();
    }

    function throwError($str)
    {
        die('{"result":null,"id":null,"error":{"errstr":"' . addslashes($str) . '","errfile":"","errline":null,"errcontext":"","level":"FATAL"}}');
    }
}

?>
