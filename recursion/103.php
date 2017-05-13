<?php
/**
* 走楼梯
* 有一种楼梯共M级，刚开始时你在第一级，若每次只能跨上一级或二级，要走上第M级，共有多少种走法？
* 输入：共M级
* 输出：多少种走法
* 测试数据(不可做为基准情形) 
* F(2) = 1
* F(3) = 2
*/
function stairs($m) {
	if ($m <= 1) {
		return 0;
	}
    if ($m == 2) {
        return 1;
    }
    if ($m == 3) {
    	return 2;
    }
    if ($m > 3) {
        return stairs($m - 1) + stairs($m - 2);
    }
}

echo stairs(7);