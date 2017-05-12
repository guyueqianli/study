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
    
    //获取链表 val值
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
$lists->addLink(new Node(5));
$lists->addLink(new Node(1));
$lists->addLink(new Node(6));
$lists->addLink(new Node(2));
$lists->addLink(new Node(3));
$lists->getLinkListVal();
