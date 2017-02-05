<?php

$limit = 5;
$sieve = array_fill(0, $limit, false);
$sieve[0] = $sieve[1] = false;
$sieve[2] = $sieve[3] = true;
$limitSqrt = (int) sqrt($limit);

for($x = 1; $x <= $limitSqrt; $x++) {
    for($y = 1; $y <= $limitSqrt; $y++) {
        $n = (4 * $x * $x) + ($y * $y);
        if($n<=$limit && ($n % 12 == 1 || $n % 12 == 5)) {
            $sieve[$n] = ! $sieve[$n];
        }
        $n = (3 * $x * $x) + ($y * $y);
        if($n<=$limit && ($n % 12 == 7) ) {
            $sieve[$n] = ! $sieve[$n];
        }
        $n = (3 * $x * $x) - ($y * $y);
        if($x > $y && $n<=$limit && ($n % 12 == 11) ) {
            $sieve[$n] = ! $sieve[$n];
        }
    }
}
for($i=5; $i <= $limitSqrt; $i++) {
    if($sieve[$i]) {
        $x = $i * $i;
        for($j=$x; $j<=$limit; $j+=$x) {
            $sieve[$j] = false;
        }
    }
}

$sol = [];
$i=0;
$flag = true;


for($i=0;$i<=$limit;$i++) {
    if($sieve[$i]) {
        $sol[$i] = $i;
    }
}
echo sizeof($sol);
