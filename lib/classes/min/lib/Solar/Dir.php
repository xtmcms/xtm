<?php
class Solar_Dir
{
    protected static $_tmp;

    public static function exists($dir)
    {
        $dir = trim($dir);
        if (!$dir) {
            return false;
        }
        $abs = ($dir[0] == '/' || $dir[0] == '\\' || $dir[1] == ':');
        if ($abs && is_dir($dir)) {
            return $dir;
        }
        $path = explode(PATH_SEPARATOR, ini_get('include_path'));
        foreach ($path as $base) {
            $target = rtrim($base, '\\/') . DIRECTORY_SEPARATOR . $dir;
            if (is_dir($target)) {
                return $target;
            }
        }
        return false;
    }

    public static function fix($dir)
    {
        $dir = str_replace('/', DIRECTORY_SEPARATOR, $dir);
        return rtrim($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    public static function name($file, $up = 0)
    {
        $dir = dirname($file);
        while ($up--) {
            $dir = dirname($dir);
        }
        return $dir;
    }

    public static function tmp($sub = '')
    {
        if (!Solar_Dir :: $_tmp) {
            if (function_exists('sys_get_temp_dir')) {
                $tmp = sys_get_temp_dir();
            } else {
                $tmp = Solar_Dir :: _tmp();
            }
            Solar_Dir :: $_tmp = rtrim($tmp, DIRECTORY_SEPARATOR);
        }
        $sub = trim($sub);
        if ($sub) {
            $sub = trim($sub, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        }
        return Solar_Dir :: $_tmp . DIRECTORY_SEPARATOR . $sub;
    }

    protected static function _tmp()
    {
        if (strtolower(substr(PHP_OS, 0, 3)) != 'win') {
            $tmp = empty($_ENV['TMPDIR']) ? getenv('TMPDIR') : $_ENV['TMPDIR'];
            if ($tmp) {
                return $tmp;
            } else {
                return '/tmp';
            }
        }
        $tmp = empty($_ENV['TEMP']) ? getenv('TEMP') : $_ENV['TEMP'];
        if ($tmp) {
            return $tmp;
        }
        $tmp = empty($_ENV['TMP']) ? getenv('TMP') : $_ENV['TMP'];
        if ($tmp) {
            return $tmp;
        }
        $tmp = empty($_ENV['windir']) ? getenv('windir') : $_ENV['windir'];
        if ($tmp) {
            return $tmp;
        }
        return getenv('SystemRoot') . '\\temp';
    }
} 
