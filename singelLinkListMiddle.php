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
        while($current->next != null) {
            $current = $current->next;
        }
        $current->next = $node;
    }
    //获取链表长度
    public function getLinkLength() {
        $current = $this->header;
        $i = 0;
        while ($current->next != null ) {
            $i ++;
            $current = $current->next;
        }
        return $i;
    }
    //获取中间节点（方法1：根据链表长度获取）
    public function getMiddleNode() {
        $current = $this->header;
        $length = $this->getLinkLength();
        if($length == 0) {
            $str = "链表为空!";
            return $str;
        }
        $middle = intval($length / 2);
        if(1 == ($length % 2)) {
            for($i = 0;$i <= $middle;$i++) {
                $current = $current->next;
            }
            $str = "中间节点为：".$current->val;
        }
        if(0 == ($length % 2)) {
            for($i = 0;$i < $middle;$i++) {
                $current = $current->next;
            }
            $str = "中间节点为：".$current->val."和".$current->next->val;
        }
        return $str;
    }
    //取中间节点（方法2：根据快慢指针）
    public function getMiddleNodeBySlowFast() {
        $slow = $this->header;
        $fast = $this->header;
        $i = 0;
        while($fast != null && $fast->next != null) {
            $i++;
            $slow = $slow->next;
            //echo "\n --------- slow $i ---------------  \n";var_dump($slow);
            $fast = $fast->next->next;
            //echo "\n --------- fast $i ---------------  \n";var_dump($fast);
        }
        if(0 == $i) {
            $str = "链表为空!";
            return $str;
        }
        if($fast == null) {
            $str = "中间节点为：".$slow->val;
        }
        if($fast->next == null && $fast != null) {
            $str = "中间节点为：".$slow->val."和".$slow->next->val;
        }
        return $str;
    }
}

echo "\n=========================== 1 ====================================\n";
$lists = new SingelLinkList();
$lists->addLink(new Node(5));
//$lists->addLink(new Node(3));
//$lists->addLink(new Node(1));
//$lists->addLink(new Node(4));
//$lists->addLink(new Node(7));
//$lists->addLink(new Node(8));
echo "\n方法一：\n";
echo $lists->getMiddleNode();
echo "\n方法二：\n";
echo $lists->getMiddleNodeBySlowFast();

echo "\n=========================== 2 ====================================\n";

$lists2 = new SingelLinkList();
$lists2->addLink(new Node(5));
$lists2->addLink(new Node(3));
echo "\n方法一：\n";
echo $lists2->getMiddleNode();
echo "\n方法二：\n";
echo $lists2->getMiddleNodeBySlowFast();


echo "\n=========================== 3  ====================================\n";

$lists3 = new SingelLinkList();
$lists3->addLink(new Node(5));
$lists3->addLink(new Node(3));
$lists3->addLink(new Node(1));
echo "\n方法一：\n";
echo $lists3->getMiddleNode();
echo "\n方法二：\n";
echo $lists3->getMiddleNodeBySlowFast();


echo "\n==========================  4 =====================================\n";

$lists4 = new SingelLinkList();
$lists4->addLink(new Node(5));
$lists4->addLink(new Node(3));
$lists4->addLink(new Node(1));
$lists4->addLink(new Node(4));
echo "\n方法一：\n";
echo $lists4->getMiddleNode();
echo "\n方法二：\n";
echo $lists4->getMiddleNodeBySlowFast();

echo "\n=========================== 5 ====================================\n";

$lists5 = new SingelLinkList();
$lists5->addLink(new Node(5));
$lists5->addLink(new Node(3));
$lists5->addLink(new Node(1));
$lists5->addLink(new Node(4));
$lists5->addLink(new Node(7));
echo "\n方法一：\n";
echo $lists5->getMiddleNode();
echo "\n方法二：\n";
echo $lists5->getMiddleNodeBySlowFast();


echo "\n=========================== 6 ====================================\n";

$lists6 = new SingelLinkList();
$lists6->addLink(new Node(5));
$lists6->addLink(new Node(3));
$lists6->addLink(new Node(1));
$lists6->addLink(new Node(4));
$lists6->addLink(new Node(7));
$lists6->addLink(new Node(8));
echo "\n方法一：\n";
echo $lists6->getMiddleNode();
echo "\n方法二：\n";
echo $lists6->getMiddleNodeBySlowFast();

