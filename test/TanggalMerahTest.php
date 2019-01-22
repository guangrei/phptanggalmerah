<?php
use PHPUnit\Framework\TestCase;
final class TanggalMerahTest extends TestCase
{
    private $pt;
    protected function setUp()
    {
        $this->pt = new \Grei\TanggalMerah();
    }
    protected function tearDown()
    {
        $this->pt = null;
    }
    public function test_check()
    {
        $this->assertFalse($this->pt->check());
    }
    public function test_check2()
    {
        $this->pt->set_date("20190205");
        $this->assertTrue($this->pt->check());
    }
}       