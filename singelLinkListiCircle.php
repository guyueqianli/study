<?php
//链表节点
class Node {
    //val
    public $val;
    //下一节点
    public $next;
    public function __construct($val) {
        $this->val = $val;
        $this->next = null;
    }
}
//单链表
class SingelLinkList {
    private $header; //链表头节点
    public function __construct($val = null) {
        $this->header = new node ($val, null);
    }
    //添加节点数据
    public function addLink($node) {
        $current = $this->header;
        while ($current->next != null ) {
            if($current->next->val > $node->val) {
                break;
            }
            $current = $current->next;
        }
        $node->next = $current->next;
        $current->next = $node;
    }
    //获取链表长度
    /*
    public function getLinkLength($current) {
        $i = 1;
        while ($current->next != null ) {
            $i ++;
            $current = $current->next;
        }
        return $i;
    }
    */
    //设置环
    public function setCircle($node) {
        $current = $this->header;
        $current->next->next->next->next->next = $node;
        $node->next = $current->next->next;
    }
    //判断是否存在环
    public function isCircle() {
        $current = $this->header;
        $str = "链表为空! 没有环";
        if($current->next == null) {
            return $str;
        }
        $slow = $current;
        $fast = $current;
        $i = 0;
        while($fast && $fast->next) {
            $i++;
            $slow = $slow->next;
            $fast = $fast->next->next;
            //echo "\n---slow : $i ------\n";var_dump($slow);
            //echo "\n---fast : $i ------\n";var_dump($fast);
            if($fast == $slow) {
                $str = "第 ".$i." 次有环";
                return $str;
            }
        }
        $str = "该链表无环";
        return $str;
    }

    //获取链表 递归
    public function getLinkList($current) {
        echo "\nval = ".$current->val;
        if ($current->next != null) {
            return $this->getLinkList($current->next);  
        }
    }
    //获取链表
    public function getLinkListVal() {
        $current = $this->header;
        $str = "链表为空!";
        if($current->next == null) {
            return $str;
        }
        $current = $current->next;
        return $this->getLinkList($current);
    }
}

$lists = new SingelLinkList();
$lists->addLink(new Node(1));
$lists->addLink(new Node(2));
$lists->addLink(new Node(3));
$lists->addLink(new Node(4));
//$lists->addLink(new Node(5));
//$lists->getLinkListVal();
$lists->setCircle(new Node(5));
var_dump($lists->isCircle());
//$lists->getLinkListVal();
