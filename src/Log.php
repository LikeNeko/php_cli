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
class Log{
    static $func = true;

    public function __call($name, $arguments)
    {
        self::_call($name,$arguments);
    }

    private static function _call($name,$arguments)
    {
        $func = '';
        if (self::$func){
            $info = debug_backtrace();
            $func = '[无上级方法]';
            if (isset($info[2])){
                ['file'=>$file_path,'line'=>$line,'function'=>$function,'args'=>$args] = $info[2];
                $func = "[func:{$function}]";
            }
        }
        $data = $arguments[0];
        if (!is_string($arguments[0])&&!is_numeric($arguments[0])){
            $data = "⤵️".PHP_EOL.var_export($arguments[0],true);
        }

        Cli::$name("[{$name}]{$func} ".$data);
    }

    public static function __callStatic($name, $arguments)
    {
        self::_call($name,$arguments);
    }

}