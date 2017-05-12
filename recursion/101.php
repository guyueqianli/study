<?php
/**
*计算5的阶乘
*/
function factorial($n) {
    if ($n === 0) {
        return 1;
    }
    if ($n > 0) {
        return $n * factorial($n - 1);
    }
}
echo factorial(5);

