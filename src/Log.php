<?php

namespace Neko\Cli;

/**
 * Log样式
 * @method static info($text)
 * @method static warn($text)
 * @method static note($text)
 * @method static wins($text)
 * @method static fail($text)
 */
class Log
{
    static $func = true;

    public function __call($name, $arguments)
    {
        self::_call($name, $arguments);
    }

    private static function _call($name, $arguments)
    {
        $func = '';
        if (self::$func) {
            $info = debug_backtrace();
            $func = '[无上级方法]';

            if (isset($info[2])) {
                ['file' => $file_path, 'line' => $line, 'function' => $function, 'args' => $args] = $info[2];
                $argss = [];
                foreach ($args as $arg) {
                    if (is_object($arg)) {
                        $argss[] = 'object';
                    } else if (is_string($arg)) {
                        $argss[] = "\"{$arg}\"";
                    } else if (is_numeric($arg)) {
                        $argss[] = "{$arg}";
                    } else if (is_null($arg)) {
                        $argss[] = "null";
                    } else if (is_bool($arg)){
                        $argss[] = $arg?"true":"false";
                    } else{
                        try {
                            $argss[] = (string)$arg;
                        } catch (\Exception $exception) {
                            $argss[] = 'Undefined';
                        }
                    }
                }
                $argss = implode(',', $argss);
                $func  = "[func:{$function}($argss)]";
            }
            $func .= "[line:{$info[1]['line']}]";
        }
        $data = $arguments[0];
        if (!is_string($arguments[0]) && !is_numeric($arguments[0])) {
            $data = "⤵️" . PHP_EOL . var_export($arguments[0], true);
        }

        Cli::$name("[{$name}]{$func} " . $data);
    }

    public static function __callStatic($name, $arguments)
    {
        self::_call($name, $arguments);
    }

}