<?php

/**
 * 冒泡排序
 */
$arr = array(21,17,3,15,11,19,13);

echo "\n--- 原数组为: ----\n";
foreach($arr as $val) {
    echo $val." ";
}

$p = 0;
for($i = 0; $i < count($arr)-1; $i++) {   //外循环 (n - 1)
    $p++;
    echo "\n--- 第 $p 趟排序：---\n";
    $q = 1;
    for($j = 0; $j < count($arr) - $i - 1; $j++) {
        echo "\n第 $q 次比较：";
        $q++;
        if($arr[$j] > $arr[$j+1]) {
            $temp = $arr[$j+1];
            $arr[$j+1] = $arr[$j];
            $arr[$j] = $temp;
        }
        foreach($arr as $val) {
            echo $val." ";
        }
    }
}
echo "\n--- 冒泡后的数组为: ----\n";
foreach($arr as $val) {
    echo $val." ";
}
