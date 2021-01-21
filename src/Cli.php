<?php
namespace Neko\Cli;
/**
 * Class Cli
 * Cli::info("this is a data");
 * Cli::fail("this is a data");
 * Cli::wins("this is a data");
 * Cli::note("this is a data");
 * Cli::warn("this is a data");
 * @package Neko\Cli
 */
class Cli{
    /**
     *
     *
     * @return Log
     */
    public static function log()
    {
        return new Log();
    }

    public static function info($text)
    {
        echo self::colorfulString($text).PHP_EOL;
    }
    public static function fail($text)
    {
        echo self::colorfulString($text,'FAILURE').PHP_EOL;
    }
    public static function wins($text)
    {
        echo self::colorfulString($text,'SUCCESS').PHP_EOL;
    }
    public static function note($text)
    {
        echo self::colorfulString($text,'NOTE').PHP_EOL;
    }
    public static function warn($text)
    {
        echo self::colorfulString($text,'WARNING').PHP_EOL;
    }

    private static function colorfulString($text, $type = NULL) {
        $colors = array(
            'WARNING'   => '1;33',
            'NOTE'      => '1;36',
            'SUCCESS'   => '1;32',
            'FAILURE'   => '1;35',
        );

        if (empty($type) || !isset($colors[$type])){
            return $text;
        }

        return "\033[" . $colors[$type] . "m" . $text . "\033[0m";
    }
}

