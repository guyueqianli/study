<?php
/**
* 归并排序 110
* 合并两个排序列表
*/
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
//2个单链表
class TwoLinkList {
    private $header; //链表头节点
    public function __construct($val = null) {
        $this->header = new Node ($val, null);
    }
    //链表添加节点数据
    public function addLink($node) {
        $current = $this->header;
        while($current->next != null) {
            $current = $current->next;
        }
        $current->next = $node;
    }
    //链表获取链表
    public function getLinkListVal() {
        $current = $this->header;
        $str = "链表为空!";
        if($current->next == null) {
            return $str;
        }
        $current = $current->next;
        return $this->getLinkList($current);
    }
    //链表获取链表 val值
    public function getLinkList($current) {
        echo "\nval = ".$current->val;
        if ($current->next != null) {
            return $this->getLinkList($current->next);
        }
    }
    //获取链表
    public function getLink() {
        return $this->header;
    }
    //合并两个排序列表并返回一个新列表
    public function mergeLinkList($firstLink, $secondLink) {
        $current = $this->getLink();
        //firstLink 为null，返回secondLink
        if($firstLink->next == null) {
            while($secondLink->next != null) {
                $new_node = new Node($secondLink->next->val);
                $this->addLink($new_node);
                $secondLink = $secondLink->next;
            }
            return $current;
        }
        //secondLink 为null时，返回firstLink
        if($secondLink->next == null) {
            while($firstLink->next != null) {
                $new_node = new Node($firstLink->next->val);
                $this->addLink($new_node);
                $firstLink = $firstLink->next;
            }
            return $current;
        }
        while($firstLink->next != null || $secondLink->next != null) {
            if($firstLink->next->val <= $secondLink->next->val) {
                $new_node = new Node($firstLink->next->val);
                $this->addLink($new_node);
                return $this->mergeLinkList($firstLink->next, $secondLink);
            } else {
                $new_node = new Node($secondLink->next->val);
                $this->addLink($new_node);
                return $this->mergeLinkList($firstLink, $secondLink->next);
            }
        }
    }
}
echo "\n--- 第一个链表获取的值  ---\n";
$a1 = new Node(1);
$a2 = new Node(3);
$a3 = new Node(4);
$a4 = new Node(7);
$lists_one = new TwoLinkList();
$lists_one->addLink($a1);
$lists_one->addLink($a2);
$lists_one->addLink($a3);
$lists_one->addLink($a4);
echo $lists_one->getLinkListVal();
$firstLink = $lists_one->getLink();
echo "\n++++++++++++++++++++++++++++++++++++++++++\n";
echo "\n--- 第二个链表获取的值  ---\n";
echo "\n++++++++++++++++++++++++++++++++++++++++++\n";
$b1 = new Node(2);
$b2 = new Node(5);
$b3 = new Node(6);
$b4 = new Node(9);
$lists_two = new TwoLinkList();
$lists_two->addLink($b1);
$lists_two->addLink($b2);
$lists_two->addLink($b3);
$lists_two->addLink($b4);
echo $lists_two->getLinkListVal();
$secondLink = $lists_two->getLink();
echo "\n++++++++++++++++++++++++++++++++++++++++++\n";
echo "\n--- 合并两个排序列表并返回一个新列表  ---\n";
echo "\n++++++++++++++++++++++++++++++++++++++++++\n";
$lists = new TwoLinkList();
$lists->mergeLinkList($firstLink, $secondLink);
echo $lists->getLinkListVal();
