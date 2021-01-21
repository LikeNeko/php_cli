<?php
namespace Neko\CLi;

/**
 * @method static info($text)
 * @method static warn($text)
 * @method static note($text)
 * @method static wins($text)
 * @method static fail($text)
 */
class Log{
    public function __call($name, $arguments)
    {
        self::_call($name,$arguments);
    }

    private function _call($name,$arguments)
    {
        Cli::$name("[{$name}]".$arguments[0]);
    }

    public static function __callStatic($name, $arguments)
    {
        self::_call($name,$arguments);
    }
}