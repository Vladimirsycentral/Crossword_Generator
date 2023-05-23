<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('component.php');
final class MySecondClassTest extends TestCase
{
    public $CompTest;
    public function setup(): void{
        $this->CompTest = new ComponentClass();
    }
    public function testFirst()
    { 
        $z=$this->CompTest->FindBiggestComponent(7, '/text.txt');
        echo($z[0]);
        $this->assertSame(4, Count($z) );
    }
    
    public function testSecond()
    {
        
        $z=$this->CompTest->FindBiggestComponent(4, '/text2.txt');
        $this->assertSame(4, Count($z));
    }
    public function testThird()
    {
        
        $z=$this->CompTest->FindBiggestComponent(6, '/text3.txt');
        $this->assertSame(6, Count($z));
    }
    
}