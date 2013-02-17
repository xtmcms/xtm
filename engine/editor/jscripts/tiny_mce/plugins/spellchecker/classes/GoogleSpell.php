<?php
class GoogleSpell extends SpellChecker
{
    function &checkWords($lang, $words)
    {
        $wordstr = implode(' ', $words);
        $matches = $this->_getMatches($lang, $wordstr);
        $words = array();
        for ($i = 0; $i < count($matches); $i++) $words[] = $this->_unhtmlentities(iconv_substr($wordstr, $matches[$i][1], $matches[$i][2], "UTF-8"));
        return $words;
    }

    function &getSuggestions($lang, $word)
    {
        $sug = array();
        $osug = array();
        $matches = $this->_getMatches($lang, $word);
        if (count($matches) > 0) $sug = explode("\t", $this->_unhtmlentities($matches[0][4]));
        foreach ($sug as $item) {
            if ($item) $osug[] = $item;
        }
        return $osug;
    }

    function &_getMatches($lang, $str)
    {
        $server = "www.google.com";
        $port = 443;
        $path = "/tbproxy/spell?lang=" . $lang . "&hl=en";
        $host = "www.google.com";
        $url = "https://" . $server;
        $xml = '<?xml version="1.0" encoding="utf-8" ?><spellrequest textalreadyclipped="0" ignoredups="0" ignoredigits="1" ignoreallcaps="1"><text>' . $str . '</text></spellrequest>';
        $header = "POST " . $path . " HTTP/1.0 \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-type: application/PTI26 \r\n";
        $header .= "Content-length: " . strlen($xml) . " \r\n";
        $header .= "Content-transfer-encoding: text \r\n";
        $header .= "Request-number: 1 \r\n";
        $header .= "Document-type: Request \r\n";
        $header .= "Interface-Version: Test 1.4 \r\n";
        $header .= "Connection: close \r\n\r\n";
        $header .= $xml;
        if (function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $header);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $xml = curl_exec($ch);
            curl_close($ch);
        } else {
            $fp = fsockopen("ssl://" . $server, $port, $errno, $errstr, 30);
            if ($fp) {
                fwrite($fp, $header);
                $xml = "";
                while (!feof($fp)) $xml .= fgets($fp, 128);
                fclose($fp);
            } else echo "Could not open SSL connection to google.";
        }
        $matches = array();
        preg_match_all('/<c o="([^"]*)" l="([^"]*)" s="([^"]*)">([^<]*)<\/c>/', $xml, $matches, PREG_SET_ORDER);
        return $matches;
    }

    function _unhtmlentities($string)
    {
        return html_entity_decode($string, ENT_QUOTES, "UTF-8");
    }
}

?>