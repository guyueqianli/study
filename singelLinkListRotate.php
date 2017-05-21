<?php
/**
* Rotate List (旋转列表)
* Given a list, rotate the list to the right by k places, where k is non-negative. (给定一个列表，将列表旋转到右边k个地方，其中k为非负。)
* 
* For example:
* Given 1->2->3->4->5->NULL and k = 2,
* return 4->5->1->2->3->NULL.
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
//单链表
class SingleLinkList {
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
    public function rotateLinkList($k) {
        $current = $this->getLink();
        $count = $this->getLinkLength();
        $k = $k % $count;
        $temp = $current->next;
        for ($i = 0; $i < $count - $k; $i++) {
            $q = $temp->val;
            $this->moveVal($temp,$q);
            //$temp->val = $temp->next->val;
            //$temp->next->val = $temp->next->next->val;
            //$temp->next->next->val = $temp->next->next->next->val;
            //$temp->next->next->next->val = $temp->next->next->next->next->val;
            //$temp->next->next->next->next->val = $q;
        }
    }
    /**
    * moveVal 移动链表值val
    * @access public
    * @param object $temp 链表
    * @param int $q 记录链表的第一个val
    */
    // public function moveVal($temp,$q) {
    //     if($temp->next != null) {
    //         $temp->val = $temp->next->val;
    //         return $this->moveVal($temp->next,$q);
    //     }
    //     $temp->val = $q;
    // }
    public function moveVal($temp,$q) {
         while($temp->next != null) {
             $temp->val = $temp->next->val;
             $temp = $temp->next;
         }
         $temp->val = $q;
     }


}
echo "\n++++++++++++++++++++++++++++++++++++++++++\n";
echo "\n--- 链表获取的值  ---\n";
echo "\n++++++++++++++++++++++++++++++++++++++++++\n";
$a1 = new Node(1);
$a2 = new Node(2);
$a3 = new Node(3);
$a4 = new Node(4);
$a5 = new Node(5);
$a6 = new Node(6);
$lists = new SingleLinkList();
$lists->addLink($a1);
$lists->addLink($a2);
$lists->addLink($a3);
$lists->addLink($a4);
$lists->addLink($a5);
//$lists->addLink($a6);
echo $lists->getLinkListVal();
echo "\n++++++++++++++++++++++++++++++++++++++++++\n";
echo "\n--- 旋转后新列表获取的值  ---\n";
echo "\n++++++++++++++++++++++++++++++++++++++++++\n";
$lists->rotateLinkList(2);
echo $lists->getLinkListVal();
