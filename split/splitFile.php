<?php
/**
 * 有一个文本文件，只有二列，tab分隔，第一列是订单id(bigint unsigned)，可能有重复的, 第二列是一个json字符串。要把它拆分成10个文件
 * 订单id % 10 == 0 的放到第一个文件里面, ==1的放第二个文件里面... 以此类推, 不能改变每一行的内容
 *
*/


/**
 * splitFile
 *
 * @params string
 * @desc 拆分文件生成 
 * @return bool
*/

function splitFile($file) {
    $pwd = dirname(__FILE__);
    $filename = $pwd . '/' . $file;
    if(!file_exists($filename)) {
        echo "该文件 $filename 不存在!" . PHP_EOL;
        return false;
    }
    // 创建 split 目录, 用于存放文件
    $splitPwd = $pwd . "/split";
    if(!file_exists($splitPwd)) {
        mkdir($splitPwd);
    }
    // 在 split 目录下 先生成 9 个 json_0 ~ 9 的空文件
    $splitFileName = $splitPwd . '/json_';
    $default = 10;
    for($i = 0; $i < $default; $i++) {
        $lastFile = $splitFileName . $i;
        file_put_contents($lastFile, '');
    }
    // 逐行读取 原文件 json 内容, 将每行内容按 \t 进行分割, 只取前订单id 的值, 将 id 进行取余, 然后根据取余的数再将该行内容写入对应的文件中
    $handle = fopen($filename, 'r');
    while(!feof($handle)) {
        $line = fgets($handle);
        $arrLine = explode("\t", $line);
        if(!empty($arrLine[0])) {
            $id = intval($arrLine[0]);
            $fileId = $id % $default;
            $endFile = $splitFileName . $fileId;
            file_put_contents($endFile, $line, FILE_APPEND);
        }
    }
    fclose($handle);
    return true;
}
$file = "json";
echo splitFile($file);
