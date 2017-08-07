<?php
$redis = new Redis();
$redis->connect(getenv('REDIS_HOST'), 6379);

$hostname = gethostname();
$redis->incr($hostname);

$all_keys = $redis->keys('*');
foreach ($all_keys as $val) {
    echo $val.' : '.$redis->get($val).PHP_EOL;
}
