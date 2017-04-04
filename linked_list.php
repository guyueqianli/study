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
        //echo "--add : --\n";var_dump($current);
    }

    //获取链表
    public function getLinkList() {
        $current = $this->header;
        //echo "--getLinkList : --\n";var_dump($current);
        $str = "链表为空!";
        if($current->next == null) {
            return $str;
        }
        $arr = array();
        while($current->next != null ) {
            $val = $current->next->val;
            // $current = $current->next->next;
            // echo "--current->next : -- \n";var_dump($current);
            $arr[] = array('val' => $val);
                if ($current->next->next == null) {
                    break;
                }
                $current = $current->next;
        }
        $str = "\n";
        foreach ($arr as $k => $v) {
            $str .= "val : ".$v['val']."\n";
        }
        return $str;
    }
}

$lists = new SingelLinkList();
$lists->addLink(new Node(5));
$lists->addLink(new Node(1));
$lists->addLink(new Node(6));
$lists->addLink(new Node(2));
$lists->addLink(new Node(3));
echo $lists->getLinkList();
