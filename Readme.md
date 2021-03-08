## Use
```
 * Cli::info("this is a data");
 * Cli::fail("this is a data");
 * Cli::wins("this is a data");
 * Cli::note("this is a data");
 * Cli::warn("this is a data");

 * Log::info("this is a data");
 * Log::fail("this is a data");
 * Log::wins("this is a data");
 * Log::note("this is a data");
 * Log::warn("this is a data");

 * Log::fail(new A());
 [fail][无上级方法] ⤵️
 A::__set_state(array(
    'b' => 1,
    'c' => 2,
    'd' => 3,
 ))
 * Log::wins(['a,','b','d']);
 array (
   0 => 'a,',
   1 => 'b',
   2 => 'd',
 )
```

```
$a = '123';
function aa($a,$n){
    \Neko\Cli\Log::info("this is a data");
}
class A{
    public $b = 1;
    protected $c = 2;
    private  $d = 3;

    /**
     * @return int
     */
    public function getB(): int
    {
        return $this->b;
    }

    /**
     * @param int $b
     */
    public function setB(int $b): void
    {
        $this->b = $b;
    }
}
\Neko\Cli\Log::fail(new A() );
\Neko\Cli\Log::wins(['a,','b','d']);
aa(1,2);

输出:
[fail][无上级方法][line:28] ⤵️
A::__set_state(array(
   'b' => 1,
   'c' => 2,
   'd' => 3,
))
[wins][无上级方法][line:29] ⤵️
array (
  0 => 'a,',
  1 => 'b',
  2 => 'd',
)
[info][func:aa(1,2)][line:5] this is a data

```
