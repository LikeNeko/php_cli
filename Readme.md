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