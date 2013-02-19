<?php
class JSMin
{
    const ORD_LF = 10;
    const ORD_SPACE = 32;
    const ACTION_KEEP_A = 1;
    const ACTION_DELETE_A = 2;
    const ACTION_DELETE_A_B = 3;
    protected $a = "\n";
    protected $b = '';
    protected $input = '';
    protected $inputIndex = 0;
    protected $inputLength = 0;
    protected $lookAhead = null;
    protected $output = '';
    protected $lastByteOut = '';

    public static function minify($js)
    {
        $jsmin = new JSMin($js);
        return $jsmin->min();
    }

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function min()
    {
        if ($this->output !== '') {
            return $this->output;
        }
        $mbIntEnc = null;
        if (function_exists('mb_strlen') && ((int)ini_get('mbstring.func_overload') & 2)) {
            $mbIntEnc = mb_internal_encoding();
            mb_internal_encoding('8bit');
        }
        $this->input = str_replace("\r\n", "\n", $this->input);
        $this->inputLength = strlen($this->input);
        $this->action(self :: ACTION_DELETE_A_B);
        while ($this->a !== null) {
            $command = self :: ACTION_KEEP_A;
            if ($this->a === ' ') {
                if (($this->lastByteOut === '+' || $this->lastByteOut === '-') && ($this->b === $this->lastByteOut)) {
                } elseif (!$this->isAlphaNum($this->b)) {
                    $command = self :: ACTION_DELETE_A;
                }
            } elseif ($this->a === "\n") {
                if ($this->b === ' ') {
                    $command = self :: ACTION_DELETE_A_B;
                } elseif ($this->b === null || (false === strpos('{[(+-', $this->b) && !$this->isAlphaNum($this->b))) {
                    $command = self :: ACTION_DELETE_A;
                }
            } elseif (!$this->isAlphaNum($this->a)) {
                if ($this->b === ' ' || ($this->b === "\n" && (false === strpos('}])+-"\'', $this->a)))) {
                    $command = self :: ACTION_DELETE_A_B;
                }
            }
            $this->action($command);
        }
        $this->output = trim($this->output);
        if ($mbIntEnc !== null) {
            mb_internal_encoding($mbIntEnc);
        }
        return $this->output;
    }

    protected function action($command)
    {
        if ($command === self :: ACTION_DELETE_A_B && $this->b === ' ' && ($this->a === '+' || $this->a === '-')) {
            if ($this->input[$this->inputIndex] === $this->a) {
                $command = self :: ACTION_KEEP_A;
            }
        }
        switch ($command) {
            case self :: ACTION_KEEP_A:
                $this->output .= $this->a;
                $this->lastByteOut = $this->a;
            case self :: ACTION_DELETE_A:
                $this->a = $this->b;
                if ($this->a === "'" || $this->a === '"') {
                    $str = $this->a;
                    while (true) {
                        $this->output .= $this->a;
                        $this->lastByteOut = $this->a;
                        $this->a = $this->get();
                        if ($this->a === $this->b) {
                            break;
                        }
                        if (ord($this->a) <= self :: ORD_LF) {
                            throw new JSMin_UnterminatedStringException("JSMin: Unterminated String at byte " . $this->inputIndex . ": {$str}");
                        }
                        $str .= $this->a;
                        if ($this->a === '\\') {
                            $this->output .= $this->a;
                            $this->lastByteOut = $this->a;
                            $this->a = $this->get();
                            $str .= $this->a;
                        }
                    }
                }
            case self :: ACTION_DELETE_A_B:
                $this->b = $this->next();
                if ($this->b === '/' && $this->isRegexpLiteral()) {
                    $this->output .= $this->a . $this->b;
                    $pattern = '/';
                    while (true) {
                        $this->a = $this->get();
                        $pattern .= $this->a;
                        if ($this->a === '/') {
                            break;
                        } elseif ($this->a === '\\') {
                            $this->output .= $this->a;
                            $this->a = $this->get();
                            $pattern .= $this->a;
                        } elseif (ord($this->a) <= self :: ORD_LF) {
                            throw new JSMin_UnterminatedRegExpException("JSMin: Unterminated RegExp at byte " . $this->inputIndex . ": {$pattern}");
                        }
                        $this->output .= $this->a;
                        $this->lastByteOut = $this->a;
                    }
                    $this->b = $this->next();
                }
        }
    }

    protected function isRegexpLiteral()
    {
        if (false !== strpos("\n{;(,=:[!&|?", $this->a)) {
            return true;
        }
        if (' ' === $this->a) {
            $length = strlen($this->output);
            if ($length < 2) {
                return true;
            }
            if (preg_match('/(?:case|else|in|return|typeof)$/', $this->output, $m)) {
                if ($this->output === $m[0]) {
                    return true;
                }
                $charBeforeKeyword = substr($this->output, $length - strlen($m[0]) - 1, 1);
                if (!$this->isAlphaNum($charBeforeKeyword)) {
                    return true;
                }
            }
        }
        return false;
    }

    protected function get()
    {
        $c = $this->lookAhead;
        $this->lookAhead = null;
        if ($c === null) {
            if ($this->inputIndex < $this->inputLength) {
                $c = $this->input[$this->inputIndex];
                $this->inputIndex += 1;
            } else {
                return null;
            }
        }
        if ($c === "\r" || $c === "\n") {
            return "\n";
        }
        if (ord($c) < self :: ORD_SPACE) {
            return ' ';
        }
        return $c;
    }

    protected function peek()
    {
        $this->lookAhead = $this->get();
        return $this->lookAhead;
    }

    protected function isAlphaNum($c)
    {
        return (preg_match('/^[0-9a-zA-Z_\\$\\\\]$/', $c) || ord($c) > 126);
    }

    protected function singleLineComment()
    {
        $comment = '';
        while (true) {
            $get = $this->get();
            $comment .= $get;
            if (ord($get) <= self :: ORD_LF) {
                if (preg_match('/^\\/@(?:cc_on|if|elif|else|end)\\b/', $comment)) {
                    return "/{$comment}";
                }
                return $get;
            }
        }
    }

    protected function multipleLineComment()
    {
        $this->get();
        $comment = '';
        while (true) {
            $get = $this->get();
            if ($get === '*') {
                if ($this->peek() === '/') {
                    $this->get();
                    if (0 === strpos($comment, '!')) {
                        return "\n/*!" . substr($comment, 1) . "*/\n";
                    }
                    if (preg_match('/^@(?:cc_on|if|elif|else|end)\\b/', $comment)) {
                        return "/*{$comment}*/";
                    }
                    return ' ';
                }
            } elseif ($get === null) {
                throw new JSMin_UnterminatedCommentException("JSMin: Unterminated comment at byte " . $this->inputIndex . ": /*{$comment}");
            }
            $comment .= $get;
        }
    }

    protected function next()
    {
        $get = $this->get();
        if ($get !== '/') {
            return $get;
        }
        switch ($this->peek()) {
            case '/':
                return $this->singleLineComment();
            case '*':
                return $this->multipleLineComment();
            default:
                return $get;
        }
    }
}

class JSMin_UnterminatedStringException extends Exception
{
}

class JSMin_UnterminatedCommentException extends Exception
{
}

class JSMin_UnterminatedRegExpException extends Exception
{
} 
