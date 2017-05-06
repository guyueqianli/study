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
    //获取链表
    public function getLinkListVal2($new_list) {
        $current = $new_list;
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
    // 根据值删除节点
    public function delLinkNodeByVal($val) {
        $current = $this->header;
        $str = "链表为空!";
        if($current->next == null) {
            return $str;
        }
        while($current->next != null) {
            if($val == $current->next->val) {
                $current_val = $current->next->next;
                $current->next = $current_val;
            } else {
                $current = $current->next;
            }
        }
    }
    //获取链表
    public function getLink() {
        return $this->header;
    }
    // 反转单链表
    public function reverseLinkList() {
        $current = $this->header;
        $str = "链表为空!";
        if($current->next == null) {
            return $str;
        }
        $p = $current->next;
        $current->next = null;
        while($p != null) {
            $q = $p->next;
            $p->next = $current->next;
            $current->next = $p;
            $p = $q;
        }
    }
    //判断是回文
    public function palindromeLinkList() {
        $current = $this->getLink();
        $new_current = new self();
        $length = $this->getLinkLength();
        if($length == 0) {
            $str = "链表为空!";
            return $str;
        }
        $str = "该单链表不是回文";
        $middle = intval($length / 2);
        if(1 == ($length % 2)) {
            for($i = 0 ; $i < $middle ; $i++) {
                $current = $current->next;
                $new_node = new Node($current->val);
                $new_current->addLink($new_node);
            }
            $before = $new_current->getLink();
            $new_current->reverseLinkList();
            if ($before->next == $current->next->next) {
                $str = "该单链表是回文";
            }
        }
        if(0 == ($length % 2)) {
            for($i = 0 ; $i < $middle ; $i++) {
                $current = $current->next;
                $new_node = new Node($current->val);
                $new_current->addLink($new_node);
            }
            $before = $new_current->getLink();
            $new_current->reverseLinkList();
            if ($before->next == $current->next) {
                $str = "该单链表是回文";
            }
        }
        return $str;
    }
}
$a = new Node(1);
$b = new Node(2);
$c = new Node(3);
//$d = new Node(3);
$e = new Node(2);
$f = new Node(1);
$lists = new SingelLinkList();
$lists->addLink($a);
$lists->addLink($b);
$lists->addLink($c);
//$lists->addLink($d);
$lists->addLink($e);
$lists->addLink($f);
echo "\n++++++++++++++++++++++++++++++++++++\n";
echo "\n--------- 原来的链表val ------------\n";
echo "\n++++++++++++++++++++++++++++++++++++\n";
echo $lists->getLinkListVal();
//$lists->delLinkNode($g);
//$lists->delLinkNodeByVal(6);
//$lists->reverseLinkList();
echo "\n++++++++++++++++++++++++++++++++++++\n";
echo "\n------ 判断是否为回文 ------\n";
echo "\n++++++++++++++++++++++++++++++++++++\n";
echo $lists->palindromeLinkList();
