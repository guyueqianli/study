<?php
/**
 * binary_search
 *
 * 折半查找
 *
 * @access public
 * @param arr $arr 被查找的数组
 * @param int $low 起始位置
 * @param int $high 终止位置
 * @param int $searchValue 要查找的数
 * @return string 输出查找后的信息
 */
function binary_search($arr, $low, $high, $searchValue) {
    $mid = intval(($low + $high) / 2);
    if($low >= $high && $searchValue != $arr[$mid]) {
        $str = "在数组中没有找到值为".$searchValue."的数据\n";
        return $str;
    }
    if($searchValue > $arr[$mid]) {
        $low = $mid + 1;
        return binary_search($arr, $low, $high, $searchValue);
    }
    if($searchValue < $arr[$mid]) {
        $high = $mid - 1;
        return binary_search($arr, $low, $high, $searchValue);
    }
    if($searchValue == $arr[$mid]) {
        $str = "在数组中找到值为".$arr[$mid]."的数据，该值在数组中的第".$mid."个位置\n";
    }
    return $str;

}
$arr = array(1,3,3,4,5,6,6,7,9);
$low = 0;
$high = count($arr)-1;
$searchValue = 1;
echo binary_search($arr,$low,$high,$searchValue);