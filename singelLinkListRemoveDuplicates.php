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
    //根据node删除节点
    public function delLinkNode($node) {
        $current = $this->header;
        $str = "链表为空!";
        if($current->next == null) {
            return $str;
        }
        while($current->next != null) {
            if($node === $current->next) {
                $current_del = $current->next->next;
                break;
            }
            $current = $current->next;
        }
        $current->next = $current_del;
    }
    // 不知道头节点删除节点
    public function delLinkNode2($node) {
        $node->val = $node->next->val;
        $node->next = $node->next->next;
    }
    //删除排过序的重复元素
    public function RemoveDuplicatesLinkNode() {
        $current = $this->header;
        $str = "链表为空!";
        if($current->next == null) {
            return $str;
        }
        while($current->next != null) {
            if($current->next->val == $current->next->next->val) {
                $current->next->next = $current->next->next->next;
            }
            $current = $current->next;
        }

    }
}
$a = new Node(1);
$b = new Node(1);
$c = new Node(2);
$d = new Node(3);
$e = new Node(3);
$lists = new SingelLinkList();
$lists->addLink($a);
$lists->addLink($b);
$lists->addLink($c);
$lists->addLink($d);
$lists->addLink($e);
//$lists->delLinkNode($c);
//$lists->delLinkNode2($b);
echo $lists->RemoveDuplicatesLinkNode();
echo $lists->getLinkListVal();
