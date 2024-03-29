<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
final class TanggalMerahTest extends TestCase
{
    private $pt;
    protected function setUp(): void
    {
        $this->pt = new \Grei\TanggalMerah();
    }
    protected function tearDown(): void
    {
        $this->pt = null;
    }
    public function test_check()
    {
        $this->assertFalse($this->pt->check());
    }
    public function test_check2()
    {
        $this->pt->set_date("20231225");
        $this->assertTrue($this->pt->check());
    }
}       