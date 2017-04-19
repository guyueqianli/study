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
    //找俩链表的相交节点
    public function findLinkListIntersection($firstLink, $secondLink) {
        $str = "有空链表，没有相交节点！";
        if($firstLink->next == null || $secondLink->next == null) {
            return $str;
        }
        $newSecondLink = $secondLink;
        while($firstLink->next != null) {
            $firstLink = $firstLink->next;
            while($secondLink->next != null) {
                $secondLink = $secondLink->next;
                if($firstLink == $secondLink) {
                    echo "找到相交点:";
                    return $firstLink;
                }
            }
            $secondLink = $newSecondLink->next;
        }
    }
}
echo "\n++++++++++++++++++++++++++++\n";
echo "\n--- 第一个链表获取的值  ---\n";
echo "\n++++++++++++++++++++++++++++\n";
$a1 = new Node(2);
$a2 = new Node(1);
$a3 = new Node(1);
$c1 = new Node(5);
$c2 = new Node(2);
$c3 = new Node(3);
$lists_one = new TwoLinkList();
$lists_one->addLink($a1);
$lists_one->addLink($a2);
$lists_one->addLink($c1);
$lists_one->addLink($c2);
$lists_one->addLink($c3);
echo $lists_one->getLinkListVal();
$firstLink = $lists_one->getLink();
echo "\n++++++++++++++++++++++++++++\n";
echo "\n--- 第二个链表获取的值  ---\n";
echo "\n++++++++++++++++++++++++++++\n";
$b1 = new Node(8);
$b2 = new Node(6);
$b3 = new Node(7);
$cc1 = new Node(5);
$cc2 = new Node(2);
$cc3 = new Node(3);
$lists_two = new TwoLinkList();
$lists_two->addLink($b1);
$lists_two->addLink($b2);
$lists_two->addLink($b3);
$lists_two->addLink($cc1);
$lists_two->addLink($cc2);
$lists_two->addLink($cc3);
echo $lists_two->getLinkListVal();
$secondLink = $lists_two->getLink();
echo "\n++++++++++++++++++++++++++++\n";
echo "\n--- 找俩链表的相交节点  ---\n";
echo "\n++++++++++++++++++++++++++++\n";
$lists = new TwoLinkList();
var_dump($lists->findLinkListIntersection($firstLink, $secondLink));
