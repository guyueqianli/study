<?php
/**
* Towers of Hanoi
* 汉诺塔
* There are three pegs which can hold stacks of disks of different diameters.
* 有三个桩可以容纳不同直径的磁盘堆叠。
* A larger disk may never be stacked on top of a smaller.
* 较大的磁盘可能永远不会堆叠在一个较小的顶部。
* Starting with n disks on one peg,they must be moved to another peg one at a time.
* 从一个桩上的n个磁盘开始，它们必须一次移动到另一个。
* What is the smallest number of steps to move the disks.
* 移动磁盘的最小步骤数是多少？
* 
* 翻译：
* 有三根相邻的柱子，标号为A,B,C，A柱子上从下到上按金字塔状叠放着n个不同大小的圆盘，要把所有盘子一个一个移动到柱子B上
* 并且每次移动同一根柱子上都不能出现大盘子在小盘子上方，请问至少需要多少次移动
* 
* 测试数据(不可做为基准情形) 
* n = 1 时，移动路径：从 A ----> B
* n = 2 时，移动路径：从 A ----> C、 A ----> B、 C ----> B
* 答案： 2的n次方再-1
*/

$count = 0;
//记录移动
function move($n, $a, $b) {
    global $count;
    $count++;
    echo "移动路径：\n 从" . $a . '---->' . $b . "\n";
    $str = '至少移动' . $count . "次\n";
    return $str;
}

function disk($n, $x, $y, $z) {
    if ($n == 1) {
        return move($n, $x, $y);
    }
    $n = $n - 1;
    disk($n, $x, $z, $y);
    move($n, $x, $y);
    return disk($n, $z, $y, $x);
}

echo disk(4, 'A', 'B', 'C');
