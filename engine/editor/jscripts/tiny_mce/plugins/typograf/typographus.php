<?php
setlocale(LC_ALL, 'ru_RU.CP1251');
class typographus
{
    var $_options = array('CONVERT_E' => false, 'HTML_ENTITIES' => false);
    var $_encoding;
    var $safe_blocks = array();
    var $_sym = array('nbsp' => '&nbsp;', 'lnowrap' => '<span style="white-space:nowrap">', 'rnowrap' => '</span>', 'lquote' => '«', 'rquote' => '»', 'lquote2' => '„', 'rquote2' => '“', 'mdash' => '—', 'ndash' => '–', 'minus' => '–', 'hellip' => '…', 'copy' => '©', 'trade' => '<sup>™</sup>', 'apos' => '&#39;', 'reg' => '<sup><small>®</small></sup>', 'multiply' => '&times;', '1/2' => '&frac12;', '1/4' => '&frac14;', '3/4' => '&frac34;', 'plusmn' => '&plusmn;', 'rarr' => '&rarr;', 'larr' => '&larr;', 'rsquo' => '&rsquo;');
    var $_safeBlocks = array('<pre[^>]*>' => '<\/pre>', '<style[^>]*>' => '<\/style>', '<script[^>]*>' => '<\/script>', '<!--' => '-->', '<code[^>]*>' => '<\/code>', '\[code[^\]]*]' => '\[\/code\]',);

    function typographus($encoding = null)
    {
        $this->_encoding = $encoding;
    }

    function addSafeBlock($openTag, $closeTag)
    {
        $this->_safeBlocks[$openTag] = $closeTag;
    }

    function removeAllSafeBlocks()
    {
        $this->_safeBlocks = array();
    }

    function setSym($sym, $entity)
    {
        $this->_sym[$sym] = $entity;
    }

    function setOpt($key, $value)
    {
        $this->_options[$key] = $value;
    }

    function process($str)
    {
        $str = str_replace("<br>", "_BRLINE_", $str);
        $str = str_replace("<br />", "_BRLINE_", $str);
        $str = str_replace("<BR>", "_BRLINE_", $str);
        $str = str_replace("<BR />", "_BRLINE_", $str);
        if ($this->_encoding != null) {
            $str = iconv($this->_encoding, 'WINDOWS-1251', $str);
        }
        $pattern = '(';
        foreach ($this->_safeBlocks as $start => $end) {
            $pattern .= "$start.*$end|";
        }
        $pattern .= '<[^>]*[\s][^>]*>)';
        $str = preg_replace_callback("~$pattern~isU", array(&$this, '_stack'), $str);
        $str = html_entity_decode($str);
        $str = str_replace(']"', '_LINE_] "', $str);
        $str = str_replace('"[', '" _LINE_[', $str);
        $str = $this->typo_text($str);
        $str = str_replace("_LINE_] ", "]", $str);
        $str = str_replace(" _LINE_[", "[", $str);
        $str = strtr($str, $this->_stack());
        if ($this->_encoding != null) {
            $str = iconv('WINDOWS-1251', $this->_encoding, $str);
        }
        $str = str_replace("_BRLINE_", "<br />", $str);
        return $str;
    }

    function _stack($matches = false)
    {
        if ($matches !== false) {
            $key = '<' . count($this->safe_blocks) . '>';
            $this->safe_blocks[$key] = $matches[0];
            return $key;
        } else {
            $tmp = $this->safe_blocks;
            $this->safe_blocks = array();
            return $tmp;
        }
    }

    function apply_rules($rules, $str)
    {
        return preg_replace(array_keys($rules), array_values($rules), $str);
    }

    function typo_text($str)
    {
        $sym = $this->_sym;
        if (trim($str) == '') return '';
        $html_tag = '(?:(?U)<.*>)';
        $hellip = '\.{3,5}';
        $word = '[a-zA-Zа-яА-Я_]';
        $phrase_begin = "(?:$hellip|$word|\n)";
        $phrase_end = '(?:[)!?.:;#*\\\]|$|' . $word . '|' . $sym['rquote'] . '|' . $sym['rquote2'] . '|&quot;|"|' . $sym['hellip'] . '|' . $sym['copy'] . '|' . $sym['trade'] . '|' . $sym['apos'] . '|' . $sym['reg'] . '|\')';
        $punctuation = '[?!:,;]';
        $abbr = 'ООО|ОАО|ЗАО|ЧП|ИП|НПФ|НИИ';
        $prepos = 'а|в|во|вне|и|или|к|о|с|у|о|со|об|обо|от|ото|то|на|не|ни|но|из|изо|за|уж|на|по|под|подо|пред|предо|про|над|надо|как|без|безо|что|да|для|до|там|ещё|их|или|ко|меж|между|перед|передо|около|через|сквозь|для|при|я';
        $metrics = 'мм|см|м|км|г|кг|б|кб|мб|гб|dpi|px';
        $shortages = 'г|гр|тов|пос|c|ул|д|пер|м';
        $money = 'руб\.|долл\.|евро|у\.е\.';
        $counts = 'млн\.|тыс\.';
        $any_quote = "(?:$sym[lquote]|$sym[rquote]|$sym[lquote2]|$sym[rquote2]|&quot;|\")";
        $rules_strict = array('~( |\t)+~' => ' ', '~([^,])\s(а|но)\s~' => '$1, $2 ',);
        $rules_symbols = array('~([^!])!!([^!])~' => '$1!$2', '~([^?])\?\?([^?])~' => '$1?$2', '~(\w);;(\s)~' => '$1;$2', '~(\w)\.\.(\s)~' => '$1.$2', '~(\w),,(\s)~' => '$1,$2', '~(\w)::(\s)~' => '$1:$2', '~(!!!)!+~' => '$1', '~(\?\?\?)\?+~' => '$1', '~(;;;);+~' => '$1', '~(\.\.\.)\.+~' => '$1', '~(,,,),+~' => '$1', '~(:::):+\s~' => '$1', '~!\?~' => '?!', '~\((c|с)\)~i' => $sym['copy'], '~\(r\)~i' => $sym['reg'], '~\(tm\)~i' => $sym['trade'], "~$hellip~" => $sym['hellip'], '~\b1/2\b~' => $sym['1/2'], '~\b1/4\b~' => $sym['1/4'], '~\b3/4\b~' => $sym['3/4'], "~([a-zA-Z])'([а-яА-Я])~i" => '$1' . $sym['rsquo'] . '$2', "~'~" => $sym['apos'], '~(\d+)\s{0,}?[x|X|х|Х|*]\s{0,}(\d+)~' => '$1' . $sym['multiply'] . '$2', '~([^\+]|^)\+-~' => '$1' . $sym['plusmn'], '~([^-]|^)->~' => '$1' . $sym['rarr'], '~<-([^-]|$)~' => $sym['larr'] . '$1',);
        $rules_quotes = array('~([^"]\w+)"(\w+)"~' => '$1 "$2"', '~"(\w+)"(\w+)~' => '"$1" $2', "~(?<=\\s|^|[>(])($html_tag*)($any_quote)($html_tag*$phrase_begin$html_tag*)~" => '$1' . $sym['lquote'] . '$3', "~($html_tag*(?:$phrase_end|[0-9]+)$html_tag*)($any_quote)($html_tag*$phrase_end$html_tag*|\\s|[,<-])~" => '$1' . $sym['rquote'] . '$3',);
        $rules_braces = array('~(\w)\(~' => '$1 (', '~\( ~s' => '(', '~ \)~s' => ')',);
        $rules_main = array('~(' . $phrase_end . ') +(' . $punctuation . '|' . $sym['hellip'] . ')~' => '$1$2', '~(' . $punctuation . ')(' . $phrase_begin . ')~' => '$1 $2', '~(\w)\s(?:\.)(\s|$)~' => '$1.$2', '~(' . $abbr . ')\s+(«.*»)~' => $sym['lnowrap'] . '$1 $2' . $sym['rnowrap'], '~(^|[^a-zA-Zа-яА-Я])(' . $shortages . ')\.\s?([А-Я0-9]+)~s' => '$1$2.' . $sym['nbsp'] . '$3', '~(стр|с|табл|рис|илл)\.\s*(\d+)~si' => '$1.' . $sym['nbsp'] . '$2', '~([0-9]+)\s*([гГ])\.\s~s' => '$1' . $sym['nbsp'] . '$2. ', '~([0-9]+)\s*(' . $metrics . ')~s' => '$1' . $sym['nbsp'] . '$2', '~(\s' . $metrics . ')(\d+)~' => '$1<sup>$2</sup>', '~ +(?:--?|—|&mdash;)(?=\s)~' => $sym['nbsp'] . $sym['mdash'], '~^(?:--?|—|&mdash;)(?=\s)~' => $sym['mdash'], '~(?:^|\s+)(?:--?|—|&mdash;)(?=\s)~' => "\n" . $sym['nbsp'] . $sym['mdash'], '~(?<=\s|^|\W)(' . $prepos . ')(\s+)~i' => '$1' . $sym['nbsp'], "~(?<=\\S)(\\s+)(ж|бы|б|же|ли|ль|либо|или)(?=$html_tag*[\\s)!?.])~i" => $sym['nbsp'] . '$2', '~([А-ЯA-Z]\.)\s?([А-ЯA-Z]\.)\s?([А-Яа-яA-Za-z]+)~s' => '$1$2' . $sym['nbsp'] . '$3', '~(\d+)\s?(' . $counts . ')~s' => '$1' . $sym['nbsp'] . '$2', '~(\d+|' . $counts . ')\s?уе~s' => '$1' . $sym['nbsp'] . 'у.е.', '~(\d+|' . $counts . ')\s?(' . $money . ')~s' => '$1' . $sym['nbsp'] . '$2', '~(\w) ([vв]\.)~i' => '$1' . $sym['nbsp'] . '$2', '~([0-9]+)\s+%~' => '$1%', '~(1\d{0,2}|2(\d|[0-5]\d)?)\.(0|1\d{0,2}|2(\d|[0-5]\d)?)\.(0|1\d{0,2}|2(\d|[0-5]\d)?)\.(0|1\d{0,2}|2(\d|[0-5]\d)?)~' => $sym['lnowrap'] . '$0' . $sym['rnowrap'],);
        $r = preg_split('((>)|(<))', $str, -1, PREG_SPLIT_DELIM_CAPTURE);
        for ($i = 0; $i < count($r); $i++) {
            if ($r[$i] == "<") {
                $i++;
                continue;
            }
            $r[$i] = $this->apply_rules($rules_quotes, $r[$i]);
        }
        $str = join("", $r);
        $i = 0;
        $lev = 5;
        while (($i < $lev) && preg_match('~«(?:[^»]*?)«~', $str)) {
            $i++;
            $str = preg_replace('~«([^»]*?)«(.*?)»~s', '«$1' . $sym['lquote2'] . '$2' . $sym['rquote2'], $str);
        }
        $i = 0;
        while (($i++ < $lev) && preg_match('~»(?:[^«]*?)»~', $str)) {
            $i++;
            $str = preg_replace('~»([^«]*?)»~', $sym['rquote2'] . '$1»', $str);
        }
        $str = $this->apply_rules($rules_strict, $str);
        $str = $this->apply_rules($rules_main, $str);
        $str = $this->apply_rules($rules_symbols, $str);
        $str = $this->apply_rules($rules_braces, $str);
        if ($this->_options['CONVERT_E']) {
            $str = str_replace(array('Ё', 'ё'), array('Е', 'е'), $str);
        }
        if ($this->_options['HTML_ENTITIES']) {
            $str = htmlentities($str);
        }
        return $str;
    }
} 
