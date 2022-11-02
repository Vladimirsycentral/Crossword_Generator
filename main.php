<?php
require_once('dfs.php');
class MyClass {
    public function Check($x)
    {
    $used = array(true);
    $d = CrossDfs($x, '/text2.txt');
    echo ($d);
    }
}
