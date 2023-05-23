<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('dfs.php');
final class MyClassTest extends TestCase
{
    public $dfsTest;
    public function setup(): void{
        $this->dfsTest = new DfsClass();
    }
    public function testFirst()
    {
        
        $x=4;
        $z=$this->dfsTest->CrossDfs($x, '/text2.txt');
        echo($z);
        $this->assertSame(1, $z);
    }
    
    public function testSecond()
    {
        
        $x=4;
        $z=$this->dfsTest->CrossDfs($x, '/text.txt');
        echo($z);
        $this->assertSame(1, $z);
    }
    public function testThird()
    {
        
        $x=6;
        $z=$this->dfsTest->CrossDfs($x, '/text3.txt');
        echo($z);
        $this->assertSame(1, $z);
    }
    public function testForth()
    {
        
        $x=0;
        $z=$this->dfsTest->CrossDfs($x, '/text4.txt');
        echo($z);
        $this->assertSame(0, $z);
    }
}